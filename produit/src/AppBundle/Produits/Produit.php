<?php


namespace AppBundle\Produits;
class Produit
{
    public $id;
    private $libelle;
    private $qte;
    private $prixht;
    private $prixttc;
    public function __construct($id, $libelle, $qte, $prixht) {
        $this->id = $id;
        $this->libelle = $libelle;
        $this->qte = $qte;
        $this->prixht = $prixht;
        $this->prixttc = $prixht*1.2;
    }
    public function getId()
    {
        return $this->id;
    }
    public function getLibelle()
    {
        return $this->libelle;
    }
    public function getQte()
    {
        return $this->qte;
    }
    public function setQte($qte)
    {
        $this->qte = $qte;
        return $this;
    }
    public function getPrixht()
    {
        return $this->prixht;
    }
    public function setPrixht($prixht)
    {
        $this->prixht = $prixht;
        return $this;
    }
    public function getprixttc(){
        return $this->prixttc;
    }
}