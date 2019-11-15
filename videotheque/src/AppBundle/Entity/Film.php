<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Film
 *
 * @ORM\Table(name="film", indexes={@ORM\Index(name="idRealisateur",
columns={"idRealisateur"}), @ORM\Index(name="codePays",
columns={"codePays"}), @ORM\Index(name="genre", columns={"genre"})})
 * @ORM\Entity(repositoryClass="AppBundle\Entity\FilmRepository")
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


    /**
     * Get idfilm
     *
     * @return integer
     */
    public function getIdfilm()
    {
        return $this->idfilm;
    }

    /**
     * Set titre
     *
     * @param string $titre
     *
     * @return Film
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get titre
     *
     * @return string
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set annee
     *
     * @param integer $annee
     *
     * @return Film
     */
    public function setAnnee($annee)
    {
        $this->annee = $annee;

        return $this;
    }

    /**
     * Get annee
     *
     * @return integer
     */
    public function getAnnee()
    {
        return $this->annee;
    }

    /**
     * Set resume
     *
     * @param string $resume
     *
     * @return Film
     */
    public function setResume($resume)
    {
        $this->resume = $resume;

        return $this;
    }

    /**
     * Get resume
     *
     * @return string
     */
    public function getResume()
    {
        return $this->resume;
    }

    /**
     * Set codepays
     *
     * @param string $codepays
     *
     * @return Film
     */
    public function setCodepays($codepays)
    {
        $this->codepays = $codepays;

        return $this;
    }

    /**
     * Get codepays
     *
     * @return string
     */
    public function getCodepays()
    {
        return $this->codepays;
    }

    /**
     * Set idrealisateur
     *
     * @param \AppBundle\Entity\Artiste $idrealisateur
     *
     * @return Film
     */
    public function setIdrealisateur(\AppBundle\Entity\Artiste $idrealisateur = null)
    {
        $this->idrealisateur = $idrealisateur;

        return $this;
    }

    /**
     * Get idrealisateur
     *
     * @return \AppBundle\Entity\Artiste
     */
    public function getIdrealisateur()
    {
        return $this->idrealisateur;
    }

    /**
     * Set genre
     *
     * @param \AppBundle\Entity\Genre $genre
     *
     * @return Film
     */
    public function setGenre(\AppBundle\Entity\Genre $genre = null)
    {
        $this->genre = $genre;

        return $this;
    }

    /**
     * Get genre
     *
     * @return \AppBundle\Entity\Genre
     */
    public function getGenre()
    {
        return $this->genre;
    }

    /**
     * Add idacteur
     *
     * @param \AppBundle\Entity\Artiste $idacteur
     *
     * @return Film
     */
    public function addIdacteur(\AppBundle\Entity\Artiste $idacteur)
    {
        $this->idacteur[] = $idacteur;

        return $this;
    }

    /**
     * Remove idacteur
     *
     * @param \AppBundle\Entity\Artiste $idacteur
     */
    public function removeIdacteur(\AppBundle\Entity\Artiste $idacteur)
    {
        $this->idacteur->removeElement($idacteur);
    }

    /**
     * Get idacteur
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getIdacteur()
    {
        return $this->idacteur;
    }
}
