<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\LocationRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LocationRepository::class)]
class Location implements \JsonSerializable
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $name;

    #[ORM\Column(type: 'float')]
    private $latitude;

    #[ORM\Column(type: 'float')]
    private $longitude;

    // Getters and setters...

    public function getId(): int|null
    {
        return $this->id;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getLatitude(): float|null
    {
        return $this->latitude;
    }

    public function setLatitude(float|null $latitude): static
    {
        $this->latitude = $latitude;

        return $this;
    }

    public function getLongitude(): float|null
    {
        return $this->longitude;
    }

    public function setLongitude(float|null $longitude): static
    {
        $this->longitude = $longitude;

        return $this;
    }

    public function jsonSerialize(): mixed
    {
        return [
            'id' => $this->getId(),
            'name' => $this->getName(),
            'latitude' => $this->getLatitude(),
            'longitude' => $this->getLongitude(),
        ];
    }
}
