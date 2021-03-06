<?php

namespace Cps\informaticaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * personal
 *
 * @ORM\Table(name="infor_personal")
 * @ORM\Entity(repositoryClass="Cps\informaticaBundle\Repository\personalRepository")
 */
class personal
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
     * @ORM\Column(name="nom", type="string", length=20)
     */
    private $nom;
    /**
     * @var string
     *
     * @ORM\Column(name="app", type="string", length=20)
     */
    private $app;
    /**
     * @var string
     *
     * @ORM\Column(name="apm", type="string", length=20)
     */
    private $apm;

    /**
     * @var string
     *
     * @ORM\Column(name="pref", type="string", length=5)
     */
    private $pref;

    /**
     * @var string
     *
     * @ORM\Column(name="cargo", type="string", length=30)
     */
    private $Cargo;

    /**
     * @var int
     *
     * @ORM\Column(name="servicio", type="integer")
     */
    private $servicio;

    /*--------------------------------------------------------- auxiliares --------------------------------------*/
    public function __toString(){
     	return $this->id."-".$this->nom." ".$this->app." ".$this->apm;
    }
    /***************************************FORANEAS*********************************************/
    /**
     *@ORM\OneToMany(targetEntity="Cps\informaticaBundle\Entity\asignar", mappedBy="personal")
     *@ORM\JoinColumn(nullable=false)
     */
     protected $asignar;

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
     * Set nombre
     *
     * @param string $nombre
     *
     * @return personal
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
     * Set nom
     *
     * @param string $nom
     *
     * @return personal
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set app
     *
     * @param string $app
     *
     * @return personal
     */
    public function setApp($app)
    {
        $this->app = $app;

        return $this;
    }

    /**
     * Get app
     *
     * @return string
     */
    public function getApp()
    {
        return $this->app;
    }

    /**
     * Set apm
     *
     * @param string $apm
     *
     * @return personal
     */
    public function setApm($apm)
    {
        $this->apm = $apm;

        return $this;
    }

    /**
     * Get apm
     *
     * @return string
     */
    public function getApm()
    {
        return $this->apm;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->solicitud = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add solicitud
     *
     * @param \Cps\informaticaBundle\Entity\solicitud $solicitud
     *
     * @return personal
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

    /**
     * Set servicio
     *
     * @param integer $servicio
     *
     * @return personal
     */
    public function setServicio($servicio)
    {
        $this->servicio = $servicio;

        return $this;
    }

    /**
     * Get servicio
     *
     * @return integer
     */
    public function getServicio()
    {
        return $this->servicio;
    }

    /**
     * Add asignar
     *
     * @param \Cps\informaticaBundle\Entity\asignar $asignar
     *
     * @return personal
     */
    public function addAsignar(\Cps\informaticaBundle\Entity\asignar $asignar)
    {
        $this->asignar[] = $asignar;

        return $this;
    }

    /**
     * Remove asignar
     *
     * @param \Cps\informaticaBundle\Entity\asignar $asignar
     */
    public function removeAsignar(\Cps\informaticaBundle\Entity\asignar $asignar)
    {
        $this->asignar->removeElement($asignar);
    }

    /**
     * Get asignar
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAsignar()
    {
        return $this->asignar;
    }
}
