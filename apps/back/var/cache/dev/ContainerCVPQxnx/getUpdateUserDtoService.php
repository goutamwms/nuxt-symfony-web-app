<?php

namespace ContainerCVPQxnx;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getUpdateUserDtoService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private 'App\Dto\Request\User\UpdateUserDto' shared autowired service.
     *
     * @return \App\Dto\Request\User\UpdateUserDto
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/src/Dto/Request/User/PasswordDtoInterface.php';
        include_once \dirname(__DIR__, 4).'/src/Dto/Request/User/UserDtoAbstract.php';
        include_once \dirname(__DIR__, 4).'/src/Dto/Request/User/UpdateUserDto.php';

        return $container->privates['App\\Dto\\Request\\User\\UpdateUserDto'] = new \App\Dto\Request\User\UpdateUserDto();
    }
}