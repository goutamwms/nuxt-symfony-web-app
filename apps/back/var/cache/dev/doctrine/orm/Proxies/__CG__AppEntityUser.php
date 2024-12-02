<?php

namespace Proxies\__CG__\App\Entity;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class User extends \App\Entity\User implements \Doctrine\ORM\Proxy\InternalProxy
{
    use \Symfony\Component\VarExporter\LazyGhostTrait {
        initializeLazyObject as __load;
        setLazyObjectAsInitialized as public __setInitialized;
        isLazyObjectInitialized as private;
        createLazyGhost as private;
        resetLazyObject as private;
    }

    private const LAZY_OBJECT_PROPERTY_SCOPES = [
        "\0".parent::class."\0".'currency' => [parent::class, 'currency', null],
        "\0".parent::class."\0".'email' => [parent::class, 'email', null],
        "\0".parent::class."\0".'first_name' => [parent::class, 'first_name', null],
        "\0".parent::class."\0".'id' => [parent::class, 'id', null],
        "\0".parent::class."\0".'last_name' => [parent::class, 'last_name', null],
        "\0".parent::class."\0".'locale' => [parent::class, 'locale', null],
        "\0".parent::class."\0".'password' => [parent::class, 'password', null],
        "\0".parent::class."\0".'pending_transaction' => [parent::class, 'pending_transaction', null],
        "\0".parent::class."\0".'roles' => [parent::class, 'roles', null],
        "\0".parent::class."\0".'score' => [parent::class, 'score', null],
        'currency' => [parent::class, 'currency', null],
        'email' => [parent::class, 'email', null],
        'first_name' => [parent::class, 'first_name', null],
        'id' => [parent::class, 'id', null],
        'last_name' => [parent::class, 'last_name', null],
        'locale' => [parent::class, 'locale', null],
        'password' => [parent::class, 'password', null],
        'pending_transaction' => [parent::class, 'pending_transaction', null],
        'roles' => [parent::class, 'roles', null],
        'score' => [parent::class, 'score', null],
    ];

    public function __isInitialized(): bool
    {
        return isset($this->lazyObjectState) && $this->isLazyObjectInitialized();
    }

    public function __serialize(): array
    {
        $properties = (array) $this;
        unset($properties["\0" . self::class . "\0lazyObjectState"]);

        return $properties;
    }
}