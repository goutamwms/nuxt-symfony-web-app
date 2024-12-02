<?php

declare(strict_types=1);

namespace App\DataFixtures;

use App\Entity\Location;
use App\Entity\Transaction;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Ramsey\Uuid\Uuid;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{
    public function __construct(
        private readonly UserPasswordHasherInterface $passwordHasher,
    ) {
    }

    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create();

        $localeArr = ['en-US', 'fr-FR'];
        $currencyArr = [
            'en-US' => 'USD',
            'fr-FR' => 'EUR',
        ];

        // Create dummy users
        $users = [];
        for ($i = 0; $i < 5; $i++) {
            $locale = $faker->randomElement($localeArr);
            $currency = $currencyArr[$locale];

            $user = new User((string) Uuid::uuid4(), $faker->unique()->safeEmail());
            $user->setPassword($this->passwordHasher->hashPassword($user, 'password'));
            $user->setRoles(['ROLE_USER']);
            $user->setFirstName($faker->firstName);

            $user->setLocale($locale);
            $user->setCurrency($currency);

            $user->setLastName($faker->lastName);
            $manager->persist($user);
            $users[] = $user;
        }

        // Create dummy locations
        $locations = [];
        foreach (range(1, 50) as $i) {
            $location = new Location();
            $location
                ->setName($faker->city)
                ->setLatitude($faker->latitude)
                     ->setLongitude($faker->longitude);
            $manager->persist($location);
            $locations[$i] = $location; // Use index to identify each location
        }

        // Create dummy transactions
        $usedLocationIds = [];
        foreach ($users as $user) {
            for ($i = 0; $i < 200; $i++) {
                $locationKey = array_rand($locations);

                $transaction = new Transaction();
                $transaction->setAmount($faker->randomNumber(5, false))
                            ->setDescription($faker->regexify('[A-Z]{5}[0-4]{3}[A-Z]{5}[0-4]{3}') . ($i + 1))
                            ->setLocation($locations[$locationKey])
                            ->setUser($user);

                // Assign a location randomly or leave it null, ensuring it's not reused
                if (rand(0, 1)) {
                    $transaction->setLocationName($faker->address);
                    $transaction->setLocationUpdatedAt(new \DateTime());
                }

                $manager->persist($transaction);
            }
        }

        $manager->flush();
    }
}
