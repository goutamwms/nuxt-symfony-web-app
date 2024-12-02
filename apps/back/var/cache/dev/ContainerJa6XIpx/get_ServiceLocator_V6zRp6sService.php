<?php

namespace ContainerJa6XIpx;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ServiceLocator_V6zRp6sService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.V6zRp6s' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.V6zRp6s'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService ??= $container->getService(...), [
            'user' => ['privates', '.errored..service_locator.V6zRp6s.App\\Entity\\User', NULL, 'Cannot autowire service ".service_locator.V6zRp6s": it needs an instance of "App\\Entity\\User" but this type has been excluded in "config/services.yaml".'],
            'userDto' => ['privates', 'App\\Dto\\Request\\User\\UpdateUserDto', 'getUpdateUserDtoService', true],
        ], [
            'user' => 'App\\Entity\\User',
            'userDto' => 'App\\Dto\\Request\\User\\UpdateUserDto',
        ]);
    }
}
