<?php
namespace DBAL\Entity;
  
use DBAL\Entity\Persona as Persona;
use Doctrine\ORM\Mapping as ORM;

/**
 * Description of Proyecto
 *
 * This class represents a registered user.
 * @ORM\Entity()
 * @ORM\Table(name="proyecto")
 */
class Proyecto {
    //put your code here
    
    /**
     * @ORM\Id
     * @ORM\Column(name="idProyecto", type="integer")
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    protected $Id;   
    
    /**
     * @ORM\Column(name="nombre", nullable=true, type="string", length=100)
     */
    protected $nombre;
    
   /**
     *
     * @ORM\ManyToMany(targetEntity="Persona", inversedBy="proyectos")
     * @ORM\JoinTable(name="personaproyecto",
     *      joinColumns={@ORM\JoinColumn(name="idProyecto", referencedColumnName="idProyecto")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="idPersona", referencedColumnName="idPersona")}
     *      )
     */    
    private $personas;

    public function getId()
    {
        return $this->Id;
    } 
    
    public function getNombre()
    {
        return $this->nombre;
    }     

    public function setId($Id)
    {
        $this->Id = $Id;
    } 
    
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }
    
    public function __construct()
    {
        $this->personas = new ArrayCollection();
    }
    
    public function inscribe(Persona $persona)
    {
        $this->personas[] = $persona;
    }
}
