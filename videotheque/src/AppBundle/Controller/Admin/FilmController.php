<?php
namespace AppBundle\Controller\Admin;
use AppBundle\Manager\FilmManager;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class FilmController extends Controller
{
    private function getManager()
    {
        return new FilmManager($this->getDoctrine()->getManager());
    }

    /**
     * @Route("/admin/film/index/{page}", defaults={"page" = 1},
    name="film_index")
     * @param $page
     * @return \Symfony\Component\HttpFoundation\Response
     * @param $page
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction($page)
    {
        if ($page < 1) {
            $page = 1;
        }
        // On utilise un paramètre pour le nombre de page
        $nbPerPage = $this->getParameter('nb_per_page');
        // On récupère notre objet Paginator
        $films = $this->getManager()->loadAllFilms($page, $nbPerPage);
        // On calcule le nombre total de pages grâce au count($films) qui retourne le nombre total de films
         $nbPages = ceil(count($films)/$nbPerPage);
         // Si la page n'existe pas, on la fixe au nombre de pages maximum
         if ($page > $nbPages) {
             $page = $nbPages;
         }
        // On donne toutes les informations nécessaires à la vue
        return $this->render('admin/film/index.html.twig',
         array('arrayFilms' => $films,
             'nbPages' => $nbPages,
             'page' => $page
         ));
    }
}