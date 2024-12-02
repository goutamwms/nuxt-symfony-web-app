<?php

declare(strict_types=1);

namespace App\Security\Voter;

use App\Entity\Transaction;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;
use Symfony\Component\Security\Core\User\UserInterface;

/** @phpstan-extends Voter<string, Transaction|null> */
class TransactionVoter extends Voter
{
    public const VIEW = 'TRANSACTION_VIEW';
    public const EDIT = 'TRANSACTION_EDIT';

    protected function supports(string $attribute, $subject): bool
    {
        return $attribute === self::EDIT && $subject instanceof Transaction;
    }

    protected function voteOnAttribute(string $attribute, $subject, TokenInterface $token): bool
    {
        $user = $token->getUser();

        if (!$user instanceof UserInterface) {
            return false; // User is not logged in
        }

        $transaction = $subject;
        \assert($transaction instanceof Transaction);

        // Grant access if the transaction belongs to the user
        return $transaction->getUser()->getId() === $user->getId();
    }
}
