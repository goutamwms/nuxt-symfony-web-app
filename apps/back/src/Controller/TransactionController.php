<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\Transaction;
use App\Repository\TransactionRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\KernelInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class TransactionController extends AbstractController
{
    #[Route('/transactions/user/{userId}', name: 'user_transactions', methods: ['GET'])]
    #[IsGranted('IS_AUTHENTICATED_FULLY')]
    public function listUserTransactions(
        string $userId,
        Request $request,
        TransactionRepository $transactionRepository,
    ): JsonResponse {
        // Get query parameters for search, pagination, and sorting
        $searchQuery = $request->query->get('searchQuery');
        $sortField = $request->query->get('sortField', 'id');
        $sortOrder = $request->query->get('sortOrder', 'ASC');
        $page = max(1, (int) $request->query->get('page', 1));
        $limit = max(1, (int) $request->query->get('limit', 10));

        // Fetch transactions
        $transactions = $transactionRepository->findByUser(
            $userId,
            $searchQuery,
            $sortField,
            $sortOrder,
            $page,
            $limit,
        );

        return $this->json([
            'data' => $transactions['data'],
            'total' => $transactions['total'],
            'page' => $transactions['page'],
            'limit' => $transactions['limit'],
            'total_pages' => $transactions['totalPages'],
        ], Response::HTTP_OK, [], ['groups' => ['transaction:read']]);
    }

    #[Route('/transactions/{id}', name: 'transaction_edit', methods: ['PUT'])]
    #[IsGranted('IS_AUTHENTICATED_FULLY')]
    public function editTransaction(
        int $id,
        Request $request,
        EntityManagerInterface $em,
        SerializerInterface $serializer,
        ValidatorInterface $validator,
        KernelInterface $kernel,
    ): JsonResponse {
        // Find the transaction by ID
        $transaction = $em->getRepository(Transaction::class)->find($id);

        if (!$transaction) {
            return new JsonResponse(['error' => 'Transaction not found'], Response::HTTP_NOT_FOUND);
        }

        // Check authorization
        $this->denyAccessUnlessGranted('TRANSACTION_EDIT', $transaction);

        // Decode JSON body
        $data = json_decode($request->getContent(), true);
        if (!$data) {
            return new JsonResponse(['error' => 'Invalid JSON'], Response::HTTP_BAD_REQUEST);
        }

        if (isset($data['location_name'])) {
            $transaction->setLocationName($data['location_name']);
        }

        // Validate the transaction
        $errors = $validator->validate($transaction);
        if (\count($errors) > 0) {
            return new JsonResponse([
                'error' => 'Validation failed',
                'details' => (string) $errors,
            ], Response::HTTP_BAD_REQUEST);
        }

        // Persist the changes
        $em->persist($transaction);
        $em->flush();

        // update user stat
        $this->updateUserStatistics($transaction->getUser()->getId(), $kernel);

        // Return the updated transaction
        return new JsonResponse(
            $serializer->serialize($transaction, 'json', ['groups' => ['transaction:read']]),
            Response::HTTP_OK,
            [],
            true,
        );
    }

    private function updateUserStatistics(string $userId, KernelInterface $kernel): void
    {
        // background job -------
            $phpBinary = PHP_BINARY; // Dynamically gets the current PHP binary
            $consolePath = $kernel->getProjectDir() . '/bin/console';

            // Command to run in the background
            $command = sprintf(
                '%s %s app:update-user-statistics %s > /dev/null 2>&1 &',
                $phpBinary,
                escapeshellarg($consolePath),
                $userId,
            );

            // Execute the command asynchronously
            exec($command);
        // background job -------
    }
}
