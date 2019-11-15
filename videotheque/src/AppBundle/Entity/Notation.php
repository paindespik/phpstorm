<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Notation
 *
 * @ORM\Table(name="notation", indexes={@ORM\Index(name="IDX_268BC95F1B9E0BC", columns={"idFilm"})})
 * @ORM\Entity
 */
class Notation
{
    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=40, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $email;

    /**
     * @var integer
     *
     * @ORM\Column(name="note", type="integer", nullable=false)
     */
    private $note;

    /**
     * @var \Film
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Film")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idFilm", referencedColumnName="idFilm")
     * })
     */
    private $idfilm;


}

