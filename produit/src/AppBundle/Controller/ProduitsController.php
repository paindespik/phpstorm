<?php

namespace  AppBundle\Controller;

use AppBundle\Produits\Produit;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class ProduitsController extends Controller
{
    private function getProduits() {
        $produits = array();
        $produits[] = new Produit(1, "Table", 2, 100);
        $produits[] = new Produit(2, "Chaise", 14, 40);
        $produits[] = new Produit(3, "Table basse", 6, 85);
        return $produits;
    }

    /**
     * @Route("/produit", name="produit_index")
     */
    public function indexAction()
    {
        $produits = $this->getProduits();
        return $this->render(
            'produit/index.html.twig',
            array('listeProduits' => $produits,
                'date' => new \DateTime())
);
    }
      /**
      * @Route("produit/edit/{id}", name="produit_edit")
      */
    public function edit($id){
        $produits = $this->getProduits();
        foreach ($produits as $produit){
            if($id == $produit->getId()){
                return $this->render(
                    'produit/edit.html.twig',
                    array('produit' => $produit));
            }
        }
        return $this->render(
            'produit/edit.html.twig',
            array('produit' => 0)
        );
    }
}
