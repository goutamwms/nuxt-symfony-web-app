<?php

declare(strict_types=1);

namespace App\Repository;

//use App\Dto\Request\User\CreateUserDto;
use App\Entity\Location;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<User>
 * @method Location|null find($id, $lockMode = null, $lockVersion = null)
 * @method Location|null findOneBy(array $criteria, array $orderBy = null)
 * @method array<Location> findAll()
 * @method array<Location> findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LocationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Location::class);
    }

    /*
    public function createUser(CreateUserDto $userDto): User
    {
        return new User((string) Uuid::uuid4(), $userDto->getEmail(), ['ROLE_USER']);
    }

    public function createAdmin(CreateUserDto $userDto): User
    {
        return new User((string) Uuid::uuid4(), $userDto->getEmail(), ['ROLE_ADMIN']);
    }
    */
}
