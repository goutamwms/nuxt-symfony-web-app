<?php

declare(strict_types=1);

namespace App\Dto\Request\User;

use Symfony\Component\Validator\Constraints as Assert;

class CreateUserDto extends UserDtoAbstract
{
    #[Assert\NotBlank]
    #[Assert\PasswordStrength(['minScore' => Assert\PasswordStrength::STRENGTH_WEAK])]
    public string $password;

    #[Assert\NotBlank]
    public string $first_name;
    #[Assert\NotBlank]
    public string $last_name;

    public function getPassword(): string
    {
        return $this->password;
    }

    public function getFirstName(): string|null
    {
        return $this->first_name;
    }

    public function getLastName(): string|null
    {
        return $this->last_name;
    }
}
