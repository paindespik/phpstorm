<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Internaute
 *
 * @ORM\Table(name="internaute")
 * @ORM\Entity
 */
class Internaute
{
    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=40, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=30, nullable=false)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=30, nullable=false)
     */
    private $prenom;

    /**
     * @var string
     *
     * @ORM\Column(name="region", type="string", length=30, nullable=true)
     */
    private $region = 'NULL';

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=80, nullable=true)
     */
    private $password = 'NULL';

    /**
     * @var string
     *
     * @ORM\Column(name="salt", type="string", length=50, nullable=true)
     */
    private $salt = 'NULL';

    /**
     * @var string
     *
     * @ORM\Column(name="roles", type="string", length=60, nullable=true)
     */
    private $roles = 'NULL';


}

