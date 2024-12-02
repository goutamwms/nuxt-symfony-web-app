<?php

declare(strict_types=1);

namespace App\Command;

use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\QueryBuilder;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(name: 'app:update-user-statistics')]
class UpdateUserStatisticsCommand extends Command
{
    public function __construct(private EntityManagerInterface $entityManager)
    {
        parent::__construct();

        $this->entityManager = $entityManager;
    }

    protected function configure(): void
    {
        $this
            ->setDescription('Update user statistics based on identified and un-identified transactions')
            ->addArgument('userId', InputArgument::OPTIONAL, 'The ID of the user to update scores for');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $userId = $input->getArgument('userId');
        $batchSize = 500; // smaller chunk
        $transactionRepo = $this->entityManager->getRepository('App\Entity\Transaction');
        $userRepo = $this->entityManager->getRepository('App\Entity\User');

        // Query transactions where locationName is available 
        $queryBuilder = $transactionRepo->createQueryBuilder('t')
            ->andWhere('t.locationName IS NOT NULL');

        if ($userId) {
            $queryBuilder->andWhere('t.user = :userId')->setParameter('userId', $userId);
        }

        // Process transactions where location is identified
        $this->processTransactions($queryBuilder, $output, $userRepo, $batchSize, 'score');

        // Query transactions where locationName is still not available (not identified)
        $queryBuilder = $transactionRepo->createQueryBuilder('t')
            ->andWhere('t.locationName IS NULL');

        if ($userId) {
            $queryBuilder->andWhere('t.user = :userId')->setParameter('userId', $userId);
        }

        // Process transactions where location is not identified
        $this->processTransactions($queryBuilder, $output, $userRepo, $batchSize, 'pending_transaction');

        $output->writeln('User statistics updated successfully.');

        return Command::SUCCESS;
    }

    private function processTransactions(QueryBuilder $queryBuilder, OutputInterface $output, UserRepository $userRepo, int $batchSize, string $updateField): void
    {
        $query = $queryBuilder->getQuery();
        $iterableResult = $query->toIterable();

        $usersToUpdate = [];
        $processedPaymentLabels = [];

        foreach ($iterableResult as $key => $transaction) {
            $user = $transaction->getUser();
            $location = $transaction->getLocation();
            $paymentLabel = $transaction->getDescription();

            // Initialize
            if (!isset($usersToUpdate[$user->getId()])) {
                $usersToUpdate[$user->getId()] = [
                    'score' => 0,
                    'identifications' => 0,
                    'pending_transaction' => 0, // For pending transactions
                ];
            }

            $userData = &$usersToUpdate[$user->getId()];

            if ($updateField === 'score') {
                // Scoring logic for transactions with locationName (not null)
                $userData['identifications']++;
                if ($userData['identifications'] <= 10) {
                    $userData['score'] += 5;
                } elseif ($userData['identifications'] <= 30) {
                    $userData['score'] += 3;
                } else {
                    $userData['score'] += 1;
                }

                // Scoring logic for unique payment labels
                if (!isset($processedPaymentLabels[$paymentLabel])) {
                    $userData['score'] += 20;
                    $processedPaymentLabels[$paymentLabel] = true;
                }
            } else {
                // Logic for transactions without locationName (null), updating pending_transaction field
                $userData['pending_transaction']++;
            }

            if (($key + 1) % $batchSize !== 0) {
                continue;
            }

            $this->flushUserData($usersToUpdate, $userRepo, $updateField);
            $usersToUpdate = [];
            $processedPaymentLabels = [];
            $this->entityManager->clear();
        }

        if (empty($usersToUpdate)) {
            return;
        }

        $this->flushUserData($usersToUpdate, $userRepo, $updateField);
    }

    private function flushUserData(array $usersToUpdate, UserRepository $userRepo, string $updateField): void
    {
        foreach ($usersToUpdate as $userId => $data) {
            $user = $userRepo->find($userId);
            if (!$user) {
                continue;
            }

            // Update either score or pending_transaction
            if ($updateField === 'score') {
                $user->setScore($data['score']);
            } elseif ($updateField === 'pending_transaction') {
                $user->setPendingTransaction($data['pending_transaction']);
            }
            $this->entityManager->persist($user);
        }
        $this->entityManager->flush();
    }
}
