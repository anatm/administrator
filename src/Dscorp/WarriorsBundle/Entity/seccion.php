<?php

namespace Dscorp\WarriorsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * seccion
 */
class seccion
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $nombreSeccion;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nombreSeccion
     *
     * @param string $nombreSeccion
     * @return seccion
     */
    public function setNombreSeccion($nombreSeccion)
    {
        $this->nombreSeccion = $nombreSeccion;

        return $this;
    }

    /**
     * Get nombreSeccion
     *
     * @return string 
     */
    public function getNombreSeccion()
    {
        return $this->nombreSeccion;
    }
    function __toString(){
        
    return $this->nombreSeccion;
    }
}
