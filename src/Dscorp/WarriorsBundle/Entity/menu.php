<?php

namespace Dscorp\WarriorsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * menu
 */
class menu
{
protected $menu;
   
private $seccion;
   /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $nombreMenu;

    /**
     * @var string
     */
    private $accionMenu;


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
     * Set nombreMenu
     *
     * @param string $nombreMenu
     * @return menu
     */
    public function setNombreMenu($nombreMenu)
    {
        $this->nombreMenu = $nombreMenu;
    
        return $this;
    }

    /**
     * Get nombreMenu
     *
     * @return string 
     */
    public function getNombreMenu()
    {
        return $this->nombreMenu;
    }

    /**
     * Set accionMenu
     *
     * @param string $accionMenu
     * @return menu
     */
    public function setAccionMenu($accionMenu)
    {
        $this->accionMenu = $accionMenu;
    
        return $this;
    }

    /**
     * Get accionMenu
     *
     * @return string 
     */
    public function getAccionMenu()
    {
        return $this->accionMenu;
    }

    /**
     * Set seccion
     *
     * @param \Dscorp\WarriorsBundle\Entity\seccion $seccion
     * @return menu
     */
    public function setSeccion(\Dscorp\WarriorsBundle\Entity\seccion $seccion = null)
    {
        $this->seccion = $seccion;
    
        return $this;
    }

    /**
     * Get seccion
     *
     * @return \Dscorp\WarriorsBundle\Entity\seccion 
     */
    public function getSeccion()
    {
        return $this->seccion;
    }
    function __toString(){
        
    return $this->nombreMenu;
    }
}
