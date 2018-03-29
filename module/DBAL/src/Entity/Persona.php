<?php
namespace DBAL\Entity;
 
use DBAL\Entity\Localidad as Localidad;
use DBAL\Entity\Proyecto as Proyecto;
use Doctrine\ORM\Mapping as ORM;
/**
 * Description of Persona
 *
 * This class represents a registered user.
 * @ORM\Entity()
 * @ORM\Table(name="persona")
 */
class Persona {
    //put your code here
    
    /**
     * @ORM\Id
     * @ORM\Column(name="idPersona", type="integer")
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    protected $Id;   
    
    /**
     * @ORM\Column(name="nombre", nullable=true, type="string", length=100)
     */
    protected $nombre;

    
   /**
     * Many Features have One Product.
    * @ORM\Column(name="IdLocalidad", type="integer")
     * @ORM\ManyToOne(targetEntity="Localidad", inversedBy="personas")
     * @ORM\JoinColumn(name="idLocalidad", referencedColumnName="idLocalidad")
     */    
    private $IdLocalidad;
 
    
   /**
     * @ORM\ManyToMany(targetEntity="Proyecto", inversedBy="personas")
     * @ORM\JoinTable(name="personaproyecto",
     *      joinColumns={@ORM\JoinColumn(name="idPersona", referencedColumnName="idPersona")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="idProyecto", referencedColumnName="idProyecto")}
    *       )
    */    
    private $proyectos;
    
    public function getId()
    {
        return $this->Id;
    } 
    
    public function getNombre()
    {
        return $this->nombre;
    }     

    public function getIdLocalidad()
    {
        return $this->IdLocalidad;
    }
    
    public function setIdLocalidad($IdLocalidad)
    {
        $this->IdLocalidad = $IdLocalidad;
    }
    
    public function setId($Id)
    {
        $this->Id = $Id;
    } 
    
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }  
    
    
    public function suscribe(Proyecto $proyecto)
    {
        $this->proyectos[] = $proyecto;
    }
    
    public function getProyectos() 
    {
        return $this->proyectos;
    }
    
}
