<?php

declare(strict_types=1);

namespace App\Repository;

use App\Entity\Transaction;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Tools\Pagination\Paginator;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<User>
 * @method Transaction|null find($id, $lockMode = null, $lockVersion = null)
 * @method Transaction|null findOneBy(array $criteria, array $orderBy = null)
 * @method array<Transaction> findAll()
 * @method array<Transaction> findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TransactionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Transaction::class);
    }

    public function findByUser(
        string $userId,
        string|null $searchQuery = null,
        string|null $sortField = 'id',
        string|null $sortOrder = 'ASC',
        int $page = 1,
        int $limit = 20,
    ) {
        $queryBuilder = $this->createQueryBuilder('t')
            ->andWhere('t.user = :userId')
            ->setParameter('userId', $userId);

        if ($searchQuery) {
            $queryBuilder->andWhere('t.description LIKE :reference')
                ->setParameter('reference', "%$searchQuery%");
        }

        $queryBuilder->orderBy("t.$sortField", $sortOrder)
            ->setFirstResult(($page - 1) * $limit)
            ->setMaxResults($limit);

        $paginator = new Paginator($queryBuilder->getQuery());
        $totalItems = \count($paginator);
        $totalPages = (int) ceil($totalItems / $limit);

        return [
            'data' => iterator_to_array($paginator->getIterator()),
            'total' => $totalItems,
            'page' => $page,
            'limit' => $limit,
            'totalPages' => $totalPages,
        ];
    }
}
