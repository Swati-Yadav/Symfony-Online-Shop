<?php

namespace ContainerPJCoa4h;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getCheckoutControllerService extends App_KernelDevDebugContainer
{
    /**
     * Gets the public 'App\Controller\CheckoutController' shared autowired service.
     *
     * @return \App\Controller\CheckoutController
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/symfony/framework-bundle/Controller/AbstractController.php';
        include_once \dirname(__DIR__, 4).'/src/Controller/CheckoutController.php';

        $container->services['App\\Controller\\CheckoutController'] = $instance = new \App\Controller\CheckoutController(($container->privates['App\\Service\\CartService'] ?? $container->load('getCartServiceService')));

        $instance->setContainer(($container->privates['.service_locator.jIxfAsi'] ?? $container->load('get_ServiceLocator_JIxfAsiService'))->withContext('App\\Controller\\CheckoutController', $container));

        return $instance;
    }
}
