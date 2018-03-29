<?php
namespace Localidad\Controller\Factory;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;
use Localidad\Controller\LocalidadController;

/**
 * Description of LocalidadControllerFactory
 *
 * @author mariano
 */
class LocalidadControllerFactory implements FactoryInterface {
    

    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $entityManager = $container->get('doctrine.entitymanager.orm_default');
        
       
        // Instantiate the service and inject dependencies
        return new LocalidadController($entityManager);
    }    
}
