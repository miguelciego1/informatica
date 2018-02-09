<?php

namespace Cps\informaticaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * remitente
 *
 * @ORM\Table(name="infor_remitente")
 * @ORM\Entity(repositoryClass="Cps\informaticaBundle\Repository\remitenteRepository")
 */
class remitente
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
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=60)
     */
    private $nombre;
    
    /**
     * @var string
     *
     * @ORM\Column(name="cargo", type="string", length=30)
     */
    private $cargo;
    
    /**
     * @var string
     *
     * @ORM\Column(name="servicio", type="string", length=30)
     */
    private $servicio;

    /***************************************FORANEAS*********************************************/
     /**
     *@ORM\OneToMany(targetEntity="Cps\informaticaBundle\Entity\solicitud", mappedBy="remitente")
     *@ORM\JoinColumn(nullable=false)
     */
     protected $solicitud;
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->solicitud = new \Doctrine\Common\Collections\ArrayCollection();
    }

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
     * Set nombre
     *
     * @param string $nombre
     *
     * @return remitente
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set cargo
     *
     * @param string $cargo
     *
     * @return remitente
     */
    public function setCargo($cargo)
    {
        $this->cargo = $cargo;

        return $this;
    }

    /**
     * Get cargo
     *
     * @return string
     */
    public function getCargo()
    {
        return $this->cargo;
    }

    /**
     * Set servicio
     *
     * @param string $servicio
     *
     * @return remitente
     */
    public function setServicio($servicio)
    {
        $this->servicio = $servicio;

        return $this;
    }

    /**
     * Get servicio
     *
     * @return string
     */
    public function getServicio()
    {
        return $this->servicio;
    }

    /**
     * Add solicitud
     *
     * @param \Cps\informaticaBundle\Entity\solicitud $solicitud
     *
     * @return remitente
     */
    public function addSolicitud(\Cps\informaticaBundle\Entity\solicitud $solicitud)
    {
        $this->solicitud[] = $solicitud;

        return $this;
    }

    /**
     * Remove solicitud
     *
     * @param \Cps\informaticaBundle\Entity\solicitud $solicitud
     */
    public function removeSolicitud(\Cps\informaticaBundle\Entity\solicitud $solicitud)
    {
        $this->solicitud->removeElement($solicitud);
    }

    /**
     * Get solicitud
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSolicitud()
    {
        return $this->solicitud;
    }
}
