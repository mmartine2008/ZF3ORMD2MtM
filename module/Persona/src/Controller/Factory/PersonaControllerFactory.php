<?php
namespace Persona\Controller\Factory;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;
use Persona\Controller\PersonaController;

/**
 * Description of PersonaControllerFactory
 *
 * @author mariano
 */
class PersonaControllerFactory implements FactoryInterface {
    

    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $entityManager = $container->get('doctrine.entitymanager.orm_default');
        
       
        // Instantiate the service and inject dependencies
        return new PersonaController($entityManager);
    }    
}
