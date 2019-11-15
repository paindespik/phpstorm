<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Artiste
 *
 * @ORM\Table(name="artiste", uniqueConstraints={@ORM\UniqueConstraint(name="UniqueNomArtiste", columns={"nom", "prenom"})})
 * @ORM\Entity
 */
class Artiste
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idArtiste", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idartiste;

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
     * @var integer
     *
     * @ORM\Column(name="anneeNaiss", type="integer", nullable=true)
     */
    private $anneenaiss = 'NULL';

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Film", mappedBy="idacteur")
     */
    private $idfilm;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idfilm = new \Doctrine\Common\Collections\ArrayCollection();
    }

}

