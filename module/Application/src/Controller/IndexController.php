<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use \DBAL\Entity\Localidad as Localidad;
use \DBAL\Entity\Persona as Persona;
use \DBAL\Entity\Proyecto as Proyecto;


class IndexController extends AbstractActionController
{
    protected $em;

    public function __construct($entityManager)
    {
        $this->em = $entityManager;
    }
 
    public function getEntityManager()
    {
        return $this->em;
    }
    
    public function indexAction()
    {
        return new ViewModel();
    }
    
//    public function loadAction()
//    {
//        $localidad = $this->getEntityManager()
//                ->getRepository(Localidad::class)->findByNombre('Necochea');
//        $localidad = $localidad[0];
//        
//        $persona = $this->getEntityManager()
//                ->getRepository(Persona::class)->findByNombre('Lucas');
//        $persona = $persona[0];
//        
//        $localidad->addPersona($persona);
//        
//        $this->getEntityManager()
//                        ->flush();
//        
//        return new ViewModel();
//    } 
/*    
    public function loadAction()
    {
    
        $persona = new Persona();
        $persona->setNombre('Fulanito');
        $this->getEntityManager()->persist($persona);
        
        $this->getEntityManager()
                        ->flush();
        
        return new ViewModel();
    } 
*/
    public function loadAction()
    {
    
        $persona = $this->getEntityManager()
                ->getRepository(Persona::class)->findByNombre('Mateo');

        $localidad = $this->getEntityManager()
                ->getRepository(Localidad::class)->findByNombre('Olavarria');
	
	$persona[0]->setLocalidad($localidad[0]);

        $this->getEntityManager()->persist($persona[0]);
        
        $this->getEntityManager()
                        ->flush();
        
        return new ViewModel();
    } 
    
    public function vincularAction()
    {
        if ($this->getRequest()->isPost()) {
            
            // Fill in the form with POST data
            $data = $this->params()->fromPost(); 
            $this->registrarPersonaProyecto($data);
        } 
        
        $proyectos = $this->getEntityManager()
                ->getRepository(Proyecto::class)->findAll();
        
        $personas = $this->getEntityManager()
                ->getRepository(Persona::class)->findAll();  
        
        return new ViewModel(['proyectos' => $proyectos, 
                              'personas'=>$personas]);
    }
    
    private function registrarPersonaProyecto($datos)
    {
        $personaId = $datos['persona'];
        $proyectoId = $datos['proyecto'];
        
        $persona = $this->getEntityManager()
                ->find(Persona::class, $personaId);
               
        $proyecto = $this->getEntityManager()
                ->find(Proyecto::class, $proyectoId);
       
        $persona->suscribe($proyecto);
        $proyecto->inscribe($persona);
        
  
        $this->getEntityManager()
                        ->flush();
    }    
    
}
