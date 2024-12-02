<?php

declare(strict_types=1);

namespace App\Dto\Request\User;

use Symfony\Component\Validator\Constraints as Assert;

class UpdateUserDto extends UserDtoAbstract
{
    #[Assert\AtLeastOneOf([
        new Assert\IsNull(),
        new Assert\Blank(),
        new Assert\PasswordStrength(['minScore' => Assert\PasswordStrength::STRENGTH_WEAK]),
    ], message: 'The password strength is too low', includeInternalMessages: false)]
    public string|null $password;

    #[Assert\NotBlank]
    public string $first_name;
    #[Assert\NotBlank]
    public string $last_name;

    public function getPassword(): string|null
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
