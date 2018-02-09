<?php

namespace Cps\informaticaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * solicitud
 *
 * @ORM\Table(name="infor_solicitud")
 * @ORM\Entity(repositoryClass="Cps\informaticaBundle\Repository\solicitudRepository")
 */
class solicitud
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
     * @var int
     *
     * @ORM\Column(name="ruta", type="integer")
     */
    private $ruta;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha", type="date")
     */
    private $fecha;

    /**
     * @var string
     *
     * @ORM\Column(name="referencia", type="text")
     */
    private $referencia;
    /**
     * @var string
     *
     * @ORM\Column(name="cite", type="string", length=30)
     */
    private $cite;

    /**
     * @var int
     *
     * @ORM\Column(name="estado", type="integer")
     */
    private $estado;

    /*--------------------------------------------------------- auxiliares --------------------------------------*/
    public function __toString(){
     	return $this->id."-".$this->ruta;
    }
    /*--------------------------------------------------------FORANEAS----------------------------------------------------------*/
    /**
     *
     *@ORM\ManyToOne(targetEntity="Cps\chequeBundle\Entity\User", inversedBy="solicitud")
     *@ORM\JoinColumn(nullable=false)
     */
      protected $Usuario;
    /**
     *@ORM\ManyToOne(targetEntity="Cps\informaticaBundle\Entity\remitente", inversedBy="solicitud")
     *@ORM\JoinColumn(nullable=false)
     */
      protected $remitente;
    /**
     *@ORM\OneToMany(targetEntity="Cps\informaticaBundle\Entity\detallesol", mappedBy="solicitud")
     *@ORM\JoinColumn(nullable=false)
     */
     protected $detallesol;

     /**
      *@ORM\OneToMany(targetEntity="Cps\informaticaBundle\Entity\asignar", mappedBy="solicitud")
      *@ORM\JoinColumn(nullable=false)
      */
      protected $asignar;

    /******************************************************************************************************************************/
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
     * Set ruta
     *
     * @param integer $ruta
     *
     * @return solicitud
     */
    public function setRuta($ruta)
    {
        $this->ruta = $ruta;

        return $this;
    }

    /**
     * Get ruta
     *
     * @return int
     */
    public function getRuta()
    {
        return $this->ruta;
    }

    /**
     * Set fecha
     *
     * @param \DateTime $fecha
     *
     * @return solicitud
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
     * Set referencia
     *
     * @param string $referencia
     *
     * @return solicitud
     */
    public function setReferencia($referencia)
    {
        $this->referencia = $referencia;

        return $this;
    }

    /**
     * Get referencia
     *
     * @return string
     */
    public function getReferencia()
    {
        return $this->referencia;
    }

    /**
     * Set estado
     *
     * @param integer $estado
     *
     * @return solicitud
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;

        return $this;
    }

    /**
     * Get estado
     *
     * @return int
     */
    public function getEstado()
    {
        return $this->estado;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->detallesol = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set usuario
     *
     * @param \Cps\chequeBundle\Entity\User $usuario
     *
     * @return solicitud
     */
    public function setUsuario(\Cps\chequeBundle\Entity\User $usuario)
    {
        $this->Usuario = $usuario;

        return $this;
    }

    /**
     * Get usuario
     *
     * @return \Cps\chequeBundle\Entity\User
     */
    public function getUsuario()
    {
        return $this->Usuario;
    }

    /**
     * Set remitente
     *
     * @param \Cps\informaticaBundle\Entity\remitente $remitente
     *
     * @return solicitud
     */
    public function setRemitente(\Cps\informaticaBundle\Entity\remitente $remitente)
    {
        $this->remitente = $remitente;

        return $this;
    }

    /**
     * Get remitente
     *
     * @return \Cps\informaticaBundle\Entity\remitente
     */
    public function getRemitente()
    {
        return $this->remitente;
    }
    /**
     * Add detallesol
     *
     * @param \Cps\informaticaBundle\Entity\detallesol $detallesol
     *
     * @return solicitud
     */
    public function addDetallesol(\Cps\informaticaBundle\Entity\detallesol $detallesol)
    {
        $this->detallesol[] = $detallesol;

        return $this;
    }

    /**
     * Remove detallesol
     *
     * @param \Cps\informaticaBundle\Entity\detallesol $detallesol
     */
    public function removeDetallesol(\Cps\informaticaBundle\Entity\detallesol $detallesol)
    {
        $this->detallesol->removeElement($detallesol);
    }

    /**
     * Get detallesol
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getDetallesol()
    {
        return $this->detallesol;
    }

    /**
     * Set cite
     *
     * @param string $cite
     *
     * @return solicitud
     */
    public function setCite($cite)
    {
        $this->cite = $cite;

        return $this;
    }

    /**
     * Get cite
     *
     * @return string
     */
    public function getCite()
    {
        return $this->cite;
    }

    /**
     * Add asignar
     *
     * @param \Cps\informaticaBundle\Entity\asignar $asignar
     *
     * @return solicitud
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
