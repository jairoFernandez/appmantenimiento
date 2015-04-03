<?php

namespace Tucompu\MantenimientoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Mantenimiento
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Tucompu\MantenimientoBundle\Entity\MantenimientoRepository")
 */
class Mantenimiento
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
     * @ORM\ManyToOne(targetEntity="Tucompu\MantenimientoBundle\Entity\Equipo")
     */
    private $equipo;

    /**
     * @var string
     *
     * @ORM\ManyToOne(targetEntity="Tucompu\MantenimientoBundle\Entity\Tecnico")
     */
    private $tecnico;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fechaProgramada", type="datetime")
     */
    private $fechaProgramada;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fechaVisita", type="datetime")
     */
    private $fechaVisita;

    /**
     * @var string
     *
     * @ORM\Column(name="duracionServicio", type="decimal")
     */
    private $duracionServicio;

    /**
     * @var string
     *
     * @ORM\Column(name="comentario", type="text")
     */
    private $comentario;


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
     * Set fechaProgramada
     *
     * @param \DateTime $fechaProgramada
     * @return Mantenimiento
     */
    public function setFechaProgramada($fechaProgramada)
    {
        $this->fechaProgramada = $fechaProgramada;

        return $this;
    }

    /**
     * Get fechaProgramada
     *
     * @return \DateTime 
     */
    public function getFechaProgramada()
    {
        return $this->fechaProgramada;
    }

    /**
     * Set fechaVisita
     *
     * @param \DateTime $fechaVisita
     * @return Mantenimiento
     */
    public function setFechaVisita($fechaVisita)
    {
        $this->fechaVisita = $fechaVisita;

        return $this;
    }

    /**
     * Get fechaVisita
     *
     * @return \DateTime 
     */
    public function getFechaVisita()
    {
        return $this->fechaVisita;
    }

    /**
     * Set duracionServicio
     *
     * @param string $duracionServicio
     * @return Mantenimiento
     */
    public function setDuracionServicio($duracionServicio)
    {
        $this->duracionServicio = $duracionServicio;

        return $this;
    }

    /**
     * Get duracionServicio
     *
     * @return string 
     */
    public function getDuracionServicio()
    {
        return $this->duracionServicio;
    }

    /**
     * Set comentario
     *
     * @param string $comentario
     * @return Mantenimiento
     */
    public function setComentario($comentario)
    {
        $this->comentario = $comentario;

        return $this;
    }

    /**
     * Get comentario
     *
     * @return string 
     */
    public function getComentario()
    {
        return $this->comentario;
    }

    /**
     * Set equipo
     *
     * @param \Tucompu\MantenimientoBundle\Entity\Equipo $equipo
     * @return Mantenimiento
     */
    public function setEquipo(\Tucompu\MantenimientoBundle\Entity\Equipo $equipo = null)
    {
        $this->equipo = $equipo;

        return $this;
    }

    /**
     * Get equipo
     *
     * @return \Tucompu\MantenimientoBundle\Entity\Equipo 
     */
    public function getEquipo()
    {
        return $this->equipo;
    }

    /**
     * Set tecnico
     *
     * @param \Tucompu\MantenimientoBundle\Entity\Tecnico $tecnico
     * @return Mantenimiento
     */
    public function setTecnico(\Tucompu\MantenimientoBundle\Entity\Tecnico $tecnico = null)
    {
        $this->tecnico = $tecnico;

        return $this;
    }

    /**
     * Get tecnico
     *
     * @return \Tucompu\MantenimientoBundle\Entity\Tecnico 
     */
    public function getTecnico()
    {
        return $this->tecnico;
    }
}
