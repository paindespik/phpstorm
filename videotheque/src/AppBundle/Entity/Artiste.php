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


    /**
     * Get idartiste
     *
     * @return integer
     */
    public function getIdartiste()
    {
        return $this->idartiste;
    }

    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return Artiste
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
     * Set prenom
     *
     * @param string $prenom
     *
     * @return Artiste
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set anneenaiss
     *
     * @param integer $anneenaiss
     *
     * @return Artiste
     */
    public function setAnneenaiss($anneenaiss)
    {
        $this->anneenaiss = $anneenaiss;

        return $this;
    }

    /**
     * Get anneenaiss
     *
     * @return integer
     */
    public function getAnneenaiss()
    {
        return $this->anneenaiss;
    }

    /**
     * Add idfilm
     *
     * @param \AppBundle\Entity\Film $idfilm
     *
     * @return Artiste
     */
    public function addIdfilm(\AppBundle\Entity\Film $idfilm)
    {
        $this->idfilm[] = $idfilm;

        return $this;
    }

    /**
     * Remove idfilm
     *
     * @param \AppBundle\Entity\Film $idfilm
     */
    public function removeIdfilm(\AppBundle\Entity\Film $idfilm)
    {
        $this->idfilm->removeElement($idfilm);
    }

    /**
     * Get idfilm
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getIdfilm()
    {
        return $this->idfilm;
    }
}
