<?php

namespace Cps\informaticaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * detallesol
 *
 * @ORM\Table(name="infor_detallesol")
 * @ORM\Entity(repositoryClass="Cps\informaticaBundle\Repository\detallesolRepository")
 */
class detallesol
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha", type="date")
     */
    private $fecha;

    /**
     * @var string
     *
     * @ORM\Column(name="observacion", type="text")
     */
    private $observacion;
    
    /***************************************FORANEAS*********************************************/
     /**
     *@ORM\ManyToOne(targetEntity="Cps\informaticaBundle\Entity\solicitud", inversedBy="Detallesols")
     *@ORM\JoinColumn(nullable=false)
     */
     protected $solicitud;
     

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set fecha
     *
     * @param \DateTime $fecha
     *
     * @return detallesol
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;

        return $this;
    }

    /**
     * Get fecha
     *
     * @return \DateTime
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * Set observacion
     *
     * @param string $observacion
     *
     * @return detallesol
     */
    public function setObservacion($observacion)
    {
        $this->observacion = $observacion;

        return $this;
    }

    /**
     * Get observacion
     *
     * @return string
     */
    public function getObservacion()
    {
        return $this->observacion;
    }

    /**
     * Set solicitud
     *
     * @param \Cps\informaticaBundle\Entity\solicitud $solicitud
     *
     * @return detallesol
     */
    public function setSolicitud(\Cps\informaticaBundle\Entity\solicitud $solicitud)
    {
        $this->solicitud = $solicitud;

        return $this;
    }

    /**
     * Get solicitud
     *
     * @return \Cps\informaticaBundle\Entity\solicitud
     */
    public function getSolicitud()
    {
        return $this->solicitud;
    }
}
