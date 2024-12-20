<?php

namespace ContainerJa6XIpx;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getAuthControllerService extends App_KernelDevDebugContainer
{
    /**
     * Gets the public 'App\Controller\AuthController' shared autowired service.
     *
     * @return \App\Controller\AuthController
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/symfony/framework-bundle/Controller/AbstractController.php';
        include_once \dirname(__DIR__, 4).'/src/Controller/AuthController.php';
        include_once \dirname(__DIR__, 4).'/vendor/onelogin/php-saml/src/Saml2/Auth.php';

        $container->services['App\\Controller\\AuthController'] = $instance = new \App\Controller\AuthController(new \OneLogin\Saml2\Auth($container->getParameter('app.sso.configuration')), $container->getEnv('APP_URL'));

        $instance->setContainer(($container->privates['.service_locator.2.N18_J'] ?? $container->load('get_ServiceLocator_2_N18JService'))->withContext('App\\Controller\\AuthController', $container));

        return $instance;
    }
}
