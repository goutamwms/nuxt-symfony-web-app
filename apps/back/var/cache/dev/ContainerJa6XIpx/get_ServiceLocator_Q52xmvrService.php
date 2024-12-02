<?php

namespace ContainerJa6XIpx;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ServiceLocator_Q52xmvrService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.Q52xmvr' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.Q52xmvr'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService ??= $container->getService(...), [
            'App\\Controller\\AuthController::getLoggedUser' => ['privates', '.service_locator.Hz5btge', 'get_ServiceLocator_Hz5btgeService', true],
            'App\\Controller\\DemoValidationController::create' => ['privates', '.service_locator.n1TgpzT', 'get_ServiceLocator_N1TgpzTService', true],
            'App\\Controller\\TransactionController::editTransaction' => ['privates', '.service_locator.SB1kxUt', 'get_ServiceLocator_SB1kxUtService', true],
            'App\\Controller\\TransactionController::listUserTransactions' => ['privates', '.service_locator.ASNN4NI', 'get_ServiceLocator_ASNN4NIService', true],
            'App\\Controller\\UserController::createUser' => ['privates', '.service_locator.13Lux4I', 'get_ServiceLocator_13Lux4IService', true],
            'App\\Controller\\UserController::deleteUser' => ['privates', '.service_locator.Hz5btge', 'get_ServiceLocator_Hz5btgeService', true],
            'App\\Controller\\UserController::getUserEntity' => ['privates', '.service_locator.Hz5btge', 'get_ServiceLocator_Hz5btgeService', true],
            'App\\Controller\\UserController::listUsers' => ['privates', '.service_locator.ATt7aga', 'get_ServiceLocator_ATt7agaService', true],
            'App\\Controller\\UserController::updateUser' => ['privates', '.service_locator.V6zRp6s', 'get_ServiceLocator_V6zRp6sService', true],
            'App\\Kernel::loadRoutes' => ['privates', '.service_locator.y4_Zrx.', 'get_ServiceLocator_Y4Zrx_Service', true],
            'App\\Kernel::registerContainerConfiguration' => ['privates', '.service_locator.y4_Zrx.', 'get_ServiceLocator_Y4Zrx_Service', true],
            'kernel::loadRoutes' => ['privates', '.service_locator.y4_Zrx.', 'get_ServiceLocator_Y4Zrx_Service', true],
            'kernel::registerContainerConfiguration' => ['privates', '.service_locator.y4_Zrx.', 'get_ServiceLocator_Y4Zrx_Service', true],
            'App\\Controller\\AuthController:getLoggedUser' => ['privates', '.service_locator.Hz5btge', 'get_ServiceLocator_Hz5btgeService', true],
            'App\\Controller\\DemoValidationController:create' => ['privates', '.service_locator.n1TgpzT', 'get_ServiceLocator_N1TgpzTService', true],
            'App\\Controller\\TransactionController:editTransaction' => ['privates', '.service_locator.SB1kxUt', 'get_ServiceLocator_SB1kxUtService', true],
            'App\\Controller\\TransactionController:listUserTransactions' => ['privates', '.service_locator.ASNN4NI', 'get_ServiceLocator_ASNN4NIService', true],
            'App\\Controller\\UserController:createUser' => ['privates', '.service_locator.13Lux4I', 'get_ServiceLocator_13Lux4IService', true],
            'App\\Controller\\UserController:deleteUser' => ['privates', '.service_locator.Hz5btge', 'get_ServiceLocator_Hz5btgeService', true],
            'App\\Controller\\UserController:getUserEntity' => ['privates', '.service_locator.Hz5btge', 'get_ServiceLocator_Hz5btgeService', true],
            'App\\Controller\\UserController:listUsers' => ['privates', '.service_locator.ATt7aga', 'get_ServiceLocator_ATt7agaService', true],
            'App\\Controller\\UserController:updateUser' => ['privates', '.service_locator.V6zRp6s', 'get_ServiceLocator_V6zRp6sService', true],
            'kernel:loadRoutes' => ['privates', '.service_locator.y4_Zrx.', 'get_ServiceLocator_Y4Zrx_Service', true],
            'kernel:registerContainerConfiguration' => ['privates', '.service_locator.y4_Zrx.', 'get_ServiceLocator_Y4Zrx_Service', true],
        ], [
            'App\\Controller\\AuthController::getLoggedUser' => '?',
            'App\\Controller\\DemoValidationController::create' => '?',
            'App\\Controller\\TransactionController::editTransaction' => '?',
            'App\\Controller\\TransactionController::listUserTransactions' => '?',
            'App\\Controller\\UserController::createUser' => '?',
            'App\\Controller\\UserController::deleteUser' => '?',
            'App\\Controller\\UserController::getUserEntity' => '?',
            'App\\Controller\\UserController::listUsers' => '?',
            'App\\Controller\\UserController::updateUser' => '?',
            'App\\Kernel::loadRoutes' => '?',
            'App\\Kernel::registerContainerConfiguration' => '?',
            'kernel::loadRoutes' => '?',
            'kernel::registerContainerConfiguration' => '?',
            'App\\Controller\\AuthController:getLoggedUser' => '?',
            'App\\Controller\\DemoValidationController:create' => '?',
            'App\\Controller\\TransactionController:editTransaction' => '?',
            'App\\Controller\\TransactionController:listUserTransactions' => '?',
            'App\\Controller\\UserController:createUser' => '?',
            'App\\Controller\\UserController:deleteUser' => '?',
            'App\\Controller\\UserController:getUserEntity' => '?',
            'App\\Controller\\UserController:listUsers' => '?',
            'App\\Controller\\UserController:updateUser' => '?',
            'kernel:loadRoutes' => '?',
            'kernel:registerContainerConfiguration' => '?',
        ]);
    }
}