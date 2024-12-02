<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

#[ORM\Entity(repositoryClass: UserRepository::class)]
class User implements UserInterface, \JsonSerializable, PasswordAuthenticatedUserInterface
{
    #[ORM\Column(length: 180)]
    private string $password;

    #[ORM\Column(length: 255)]
    private string|null $first_name = null;
    #[ORM\Column(length: 255)]
    private string|null $last_name = null;

    /** @param array<string> $roles */
    public function __construct(
        #[ORM\Id]
        #[ORM\Column(length: 36)]
        private string $id,
        #[ORM\Column(length: 180, unique: true)]
        private string $email,
        #[ORM\Column]
        private array $roles = ['ROLE_USER'],
        #[ORM\Column(type: 'integer', options: ['unsigned' => true, 'default' => 0])]
        private int $score = 0,
        #[ORM\Column(type: 'integer', options: ['unsigned' => true, 'default' => 0])]
        private int $pending_transaction = 0,
        #[ORM\Column(length: 20, options: ['default' => 'en-US'])]
        private string $locale = 'en_US',
        #[ORM\Column(length: 20, options: ['default' => 'USD'])]
        private string $currency = 'USD',
    ) {
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return $this->email;
    }

    /** @deprecated since Symfony 5.3, use getUserIdentifier instead */
    public function getUsername(): string
    {
        return $this->email;
    }

    /**
     * This is "primary" role
     *
     * @see UserInterface
     *
     * @return array<string>
     */
    public function getRoles(): array
    {
        return $this->roles;
    }

    /** @param array<string> $roles */
    public function setRoles(array $roles): void
    {
        $this->roles = $roles;
    }

    /**
     * DO NOT USE this method, it is required for the interface UserInterface
     * This method can be removed in Symfony 6.0 - is not needed for apps that do not check user passwords.
     *
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    /**
     * DO NOT USE this method, it is required for the interface UserInterface
     * This method can be removed in Symfony 6.0 - is not needed for apps that do not check user passwords.
     *
     * @see UserInterface
     */
    public function getSalt(): string|null
    {
        return null;
    }

    /**
     * called after authentication
     *
     * @see UserInterface
     */
    public function eraseCredentials(): void
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function jsonSerialize(): mixed
    {
        return [
            'id' => $this->getId(),
            'email' => $this->getEmail(),
            'username' => $this->getUsername(),
            'first_name' => $this->getFirstName(),
            'last_name' => $this->getLastName(),
            'score' => $this->getScore(),
            'pending_transaction' => $this->getPendingTransaction(),
            'locale' => $this->getLocale(),
            'currency' => $this->getCurrency(),
            'isAdmin' => $this->getIsAdmin(),

        ];
    }

    public function hasRole(string $role): bool
    {
        return \in_array($role, $this->getRoles());
    }

    public function getIsAdmin(): bool
    {
        return \in_array('ROLE_ADMIN', $this->getRoles());
    }

    public function getFirstName(): string|null
    {
        return $this->first_name;
    }

    public function setFirstName(string $first_name): self
    {
        $this->first_name = $first_name;

        return $this;
    }

    public function getLastName(): string|null
    {
        return $this->last_name;
    }

    public function setLastName(string $last_name): self
    {
        $this->last_name = $last_name;

        return $this;
    }

    public function getScore(): int
    {
        return $this->score;
    }

    public function setScore(int $score): self
    {
        if ($score < 0) {
            throw new \InvalidArgumentException('Score cannot be negative.');
        }

        $this->score = $score;

        return $this;
    }

    public function getPendingTransaction(): int
    {
        return $this->pending_transaction;
    }

    public function setPendingTransaction(int $pendingTransaction): self
    {
        if ($pendingTransaction < 0) {
            throw new \InvalidArgumentException('Pending transactions cannot be negative.');
        }

        $this->pending_transaction = $pendingTransaction;

        return $this;
    }

    public function getLocale(): string|null
    {
        return $this->locale;
    }

    public function setLocale(string $locale): self
    {
        $this->locale = $locale;

        return $this;
    }

    public function getCurrency(): string|null
    {
        return $this->currency;
    }

    public function setCurrency(string $currency): self
    {
        $this->currency = $currency;

        return $this;
    }
}
