<?php
// src/AppBundle/Entity/User.php

namespace Cps\chequeBundle\Entity;

use FOS\UserBundle\Entity\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    /*--------------------------------------------------------FORANEAS----------------------------------------------------------*/
     /**
     *@ORM\OneToMany(targetEntity="Cps\informaticaBundle\Entity\solicitud", mappedBy="User")
     */
     protected $solicitud;
    /*--------------------------------------------------------/FORANEAS----------------------------------------------------------*/
    

    public function __construct()
    {
        parent::__construct();
        // your own logic
    }
}
