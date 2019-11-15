<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Film
 *
 * @ORM\Table(name="film", indexes={@ORM\Index(name="idRealisateur", columns={"idRealisateur"}), @ORM\Index(name="codePays", columns={"codePays"}), @ORM\Index(name="genre", columns={"genre"})})
 * @ORM\Entity
 */
class Film
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idFilm", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idfilm;

    /**
     * @var string
     *
     * @ORM\Column(name="titre", type="string", length=50, nullable=false)
     */
    private $titre;

    /**
     * @var integer
     *
     * @ORM\Column(name="annee", type="integer", nullable=false)
     */
    private $annee;

    /**
     * @var string
     *
     * @ORM\Column(name="resume", type="text", length=65535, nullable=true)
     */
    private $resume = 'NULL';

    /**
     * @var string
     *
     * @ORM\Column(name="codePays", type="string", length=4, nullable=true)
     */
    private $codepays = 'NULL';

    /**
     * @var \Artiste
     *
     * @ORM\ManyToOne(targetEntity="Artiste")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idRealisateur", referencedColumnName="idArtiste")
     * })
     */
    private $idrealisateur;

    /**
     * @var \Genre
     *
     * @ORM\ManyToOne(targetEntity="Genre")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="genre", referencedColumnName="code")
     * })
     */
    private $genre;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Artiste", inversedBy="idfilm")
     * @ORM\JoinTable(name="role",
     *   joinColumns={
     *     @ORM\JoinColumn(name="idFilm", referencedColumnName="idFilm")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="idActeur", referencedColumnName="idArtiste")
     *   }
     * )
     */
    private $idacteur;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idacteur = new \Doctrine\Common\Collections\ArrayCollection();
    }

}

