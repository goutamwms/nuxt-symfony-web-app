<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\TransactionRepository;
use Doctrine\ORM\Mapping as ORM;
// use ApiPlatform\Metadata\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: TransactionRepository::class)]
#[ORM\HasLifecycleCallbacks]
class Transaction
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    #[Groups(['transaction:read'])]
    private int|null $id = null;

    #[ORM\Column(type: 'float')]
    #[Groups(['transaction:read'])]
    private float|null $amount = null;

    #[ORM\Column(type: 'string', length: 255)]
    #[Groups(['transaction:read'])]
    private string|null $description = null;

    /*
    #[ORM\ManyToOne(targetEntity: User::class)]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $user = null;
    */


    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'transactions')]
    #[ORM\JoinColumn(nullable: false)]
    #[Groups(['transaction:read'])]
    private User|null $user = null;

    //#[ORM\OneToOne(targetEntity: Location::class, cascade: ['persist', 'remove'])]
    //#[ORM\OneToOne(targetEntity: Location::class, cascade: ['persist', 'remove'])]

    //#[ORM\OneToOne(targetEntity: Location::class)]
    //#[ORM\JoinColumn(nullable: false, unique: false)] // Ensure nullable is appropriately set


    #[ORM\ManyToOne(targetEntity: Location::class, inversedBy: 'transactions')]
    #[ORM\JoinColumn(nullable: false)] // Ensures the foreign key is non-nullable, remove if nullable
    #[Groups(['transaction:read'])]
    private Location|null $location = null;

    /*
    #[ORM\JoinColumn(nullable: false)]
    #[Groups(['transaction:read'])]
    private ?Location $location = null;
    */

    #[ORM\Column(type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    #[Groups(['transaction:read'])]
    private \DateTime $createdAt;

    #[ORM\Column(type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private \DateTime $updatedAt;

   // #[ORM\Column(type: 'datetime', options: ["default" => null])]
    //private \DateTime $locationUpdatedAt;

    #[ORM\Column(type: 'string', length: 255, nullable: true, options: ['default' => null])]
    #[Groups(['transaction:read'])]
    private string|null $locationName = null;

    #[ORM\Column(type: 'datetime', nullable: true)]
    private \DateTime|null $locationUpdatedAt = null;

    #[ORM\PrePersist]
    public function onPrePersist(): void
    {
        $this->createdAt = new \DateTime();
        $this->updatedAt = new \DateTime();
    }

    #[ORM\PreUpdate]
    public function onPreUpdate(): void
    {
        $this->updatedAt = new \DateTime();
    }

    // Getters and Setters

    public function getId(): int|null
    {
        return $this->id;
    }

    public function getAmount(): float|null
    {
        return $this->amount;
    }

    public function setAmount(float $amount): self
    {
        $this->amount = $amount;

        return $this;
    }

    public function getDescription(): string|null
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getUser(): User|null
    {
        return $this->user;
    }

    public function setUser(User|null $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getLocation(): Location|null
    {
        return $this->location;
    }

    public function setLocation(Location|null $location): self
    {
        $this->location = $location;

        return $this;
    }

    public function getCreatedAt(): string
    {
        //return $this->createdAt;

        /*
        $formatter = new IntlDateFormatter(
            'en_US',
            IntlDateFormatter::SHORT,
            IntlDateFormatter::NONE,
            'UTC',
            IntlDateFormatter::GREGORIAN
        );
        */

        // Define a custom format using `DateTime`'s methods
        return $this->createdAt->format('d/m/Y') . ' ' . $this->createdAt->format('G\h') . $this->createdAt->format('i') . 'm';
    }

    public function getUpdatedAt(): \DateTime
    {
        return $this->updatedAt;
    }

    public function getLocationName(): string|null
    {
        return $this->locationName;
    }

    public function setLocationName(string|null $location_name): self
    {
        $this->locationName = $location_name;

        return $this;
    }

    public function getLocationUpdatedAt(): \DateTime|null
    {
        return $this->locationUpdatedAt;
    }

    public function setLocationUpdatedAt(\DateTime|null $locationUpdatedAt): self
    {
        $this->locationUpdatedAt = $locationUpdatedAt;

        return $this;
    }

    /*

    // Add a method to handle the special condition
    public function updateLocation(\DateTime $newDate): void
    {
        if ($this->shouldUpdateLocation($newDate)) { // Implement your special condition here
            $this->locationUpdatedAt = $newDate;
        }
    }

    private function shouldUpdateLocation(\DateTime $newDate): bool
    {
        // Example condition: only update if new date is later than the current value
        return $this->locationUpdatedAt === null || $newDate > $this->locationUpdatedAt;
    }

    */
}
