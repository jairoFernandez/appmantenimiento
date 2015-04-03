<?php

namespace Tucompu\MantenimientoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Equipo
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Tucompu\MantenimientoBundle\Entity\EquipoRepository")
 */
class Equipo
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nombreEquipo", type="string", length=255)
     */
    private $nombreEquipo;

    /**
     * @var string
     *
     * @ORM\Column(name="detalle", type="text")
     */
    private $detalle;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fechaCreacion", type="datetime")
     */
    private $fechaCreacion;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fechaEdicion", type="datetime")
     */
    private $fechaEdicion;

    /**
     * @var string
     *
     * @ORM\ManyToOne(targetEntity="Tucompu\MantenimientoBundle\Entity\Cliente")
     */
    private $propietario;

    /**
     * @var string
     *
     * @ORM\ManyToOne(targetEntity="Tucompu\MantenimientoBundle\Entity\TipoEquipo")
     */
    private $tipoEquipo;


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
     * Set nombreEquipo
     *
     * @param string $nombreEquipo
     * @return Equipo
     */
    public function setNombreEquipo($nombreEquipo)
    {
        $this->nombreEquipo = $nombreEquipo;

        return $this;
    }

    /**
     * Get nombreEquipo
     *
     * @return string 
     */
    public function getNombreEquipo()
    {
        return $this->nombreEquipo;
    }

    /**
     * Set detalle
     *
     * @param string $detalle
     * @return Equipo
     */
    public function setDetalle($detalle)
    {
        $this->detalle = $detalle;

        return $this;
    }

    /**
     * Get detalle
     *
     * @return string 
     */
    public function getDetalle()
    {
        return $this->detalle;
    }

    /**
     * Set fechaCreacion
     *
     * @param \DateTime $fechaCreacion
     * @return Equipo
     */
    public function setFechaCreacion($fechaCreacion)
    {
        $this->fechaCreacion = $fechaCreacion;

        return $this;
    }

    /**
     * Get fechaCreacion
     *
     * @return \DateTime 
     */
    public function getFechaCreacion()
    {
        return $this->fechaCreacion;
    }

    /**
     * Set fechaEdicion
     *
     * @param \DateTime $fechaEdicion
     * @return Equipo
     */
    public function setFechaEdicion($fechaEdicion)
    {
        $this->fechaEdicion = $fechaEdicion;

        return $this;
    }

    /**
     * Get fechaEdicion
     *
     * @return \DateTime 
     */
    public function getFechaEdicion()
    {
        return $this->fechaEdicion;
    }

   

    /**
     * Set propietario
     *
     * @param \Tucompu\MantenimientoBundle\Entity\Cliente $propietario
     * @return Equipo
     */
    public function setPropietario(\Tucompu\MantenimientoBundle\Entity\Cliente $propietario = null)
    {
        $this->propietario = $propietario;

        return $this;
    }

    /**
     * Get propietario
     *
     * @return \Tucompu\MantenimientoBundle\Entity\Cliente 
     */
    public function getPropietario()
    {
        return $this->propietario;
    }

    /**
     * Set tipoEquipo
     *
     * @param \Tucompu\MantenimientoBundle\Entity\TipoEquipo $tipoEquipo
     * @return Equipo
     */
    public function setTipoEquipo(\Tucompu\MantenimientoBundle\Entity\TipoEquipo $tipoEquipo = null)
    {
        $this->tipoEquipo = $tipoEquipo;

        return $this;
    }

    /**
     * Get tipoEquipo
     *
     * @return \Tucompu\MantenimientoBundle\Entity\TipoEquipo 
     */
    public function getTipoEquipo()
    {
        return $this->tipoEquipo;
    }

    public function __toString()
    {
        return $this->getNombreEquipo()." (".$this->getPropietario().")";
    }
}
