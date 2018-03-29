<?php
namespace Proyecto\Controller\Factory;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;
use Proyecto\Controller\ProyectoController;

/**
 * Description of ProyectoControllerFactory
 *
 * @author mariano
 */
class ProyectoControllerFactory implements FactoryInterface {
    

    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $entityManager = $container->get('doctrine.entitymanager.orm_default');
        
       
        // Instantiate the service and inject dependencies
        return new ProyectoController($entityManager);
    }    
}
