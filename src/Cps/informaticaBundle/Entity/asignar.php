<?php

namespace Cps\informaticaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * asignar
 *
 * @ORM\Table(name="infor_asignar")
 * @ORM\Entity(repositoryClass="Cps\informaticaBundle\Repository\asignarRepository")
 */
class asignar
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    ////////////////////////////////////////////FORANEAS ///////////////////////////////////////////////////////////////
    /**
     *@ORM\ManyToOne(targetEntity="Cps\informaticaBundle\Entity\solicitud", inversedBy="asignar")
     *@ORM\JoinColumn(nullable=false)
     */
      protected $solicitud;
    /**
     *@ORM\ManyToOne(targetEntity="Cps\informaticaBundle\Entity\personal", inversedBy="asignars")
     *@ORM\JoinColumn(nullable=false)
     */
      protected $personal;
    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
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
     * Set solicitud
     *
     * @param \Cps\informaticaBundle\Entity\solicitud $solicitud
     *
     * @return asignar
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

    /**
     * Set personal
     *
     * @param \Cps\informaticaBundle\Entity\personal $personal
     *
     * @return asignar
     */
    public function setPersonal(\Cps\informaticaBundle\Entity\personal $personal)
    {
        $this->personal = $personal;

        return $this;
    }

    /**
     * Get personal
     *
     * @return \Cps\informaticaBundle\Entity\personal
     */
    public function getPersonal()
    {
        return $this->personal;
    }
}
