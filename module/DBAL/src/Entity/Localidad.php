<?php
namespace DBAL\Entity;
  
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Description of Localidad
 *
 * This class represents a registered user.
 * @ORM\Entity()
 * @ORM\Table(name="localidad")
 */
class Localidad {
    //put your code here
    
    /**
     * @ORM\Id
     * @ORM\Column(name="idLocalidad", type="integer")
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    protected $Id;   
    
    /**
     * @ORM\Column(name="nombre", nullable=true, type="string", length=100)
     */
    protected $nombre;

    /**
     * 
     * @ORM\OneToMany(targetEntity="\DBAL\Entity\Persona", mappedBy="idLocalidad")
     */
    private $personas;

    public function __construct() {
        $this->personas = new ArrayCollection();
    }
    
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
    
    public function addPersona(Persona $persona)
    {
        $this->personas[] = $persona;
        $persona->setIdLocalidad($this->getId());
        $persona->setLocalidad($this);
    }
}
