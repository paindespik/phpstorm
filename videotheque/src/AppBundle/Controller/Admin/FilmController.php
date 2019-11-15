<?php
namespace AppBundle\Controller\Admin;
use AppBundle\Form\FilmType;
use AppBundle\Manager\FilmManager;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

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

    /**
     * @Route("/admin/film/edit/{id}", name="film_edit")
     */
    public function editAction(Request $request, $id)
    {
        // Obtention du manager
        $manager = $this->getManager();
        // Recherche du film
        if (!$film = $manager->loadFilm($id)) {
            throw new NotFoundHttpException("Le film n'existe pas");
        }
        // Création du modèle du formulaire
        $model = $this->get('form.factory')->create(FilmType::class, $film);
        // Si l'utilisateur soumet le formulaire
        if ($request->getMethod() == 'POST') {
            // Attachement du modèle à l'objet "request"
            $model->handleRequest($request);
            // Validation du modèle
            if ($model->isValid()) {
                // Validation de l'entité
                $manager->saveFilm($film);
            }
        }
        return $this->render('admin/film/edit.html.twig', array('form' =>
            $model->createView(), 'film' => $film));
    }

    /**
     * @Route("/admin/film/add", name="film_add")
     */
    public function addAction(Request $request)
    {
        // Création d'un nouveau film
        $film = new Film();
        // Création du modèle du formulaire
        $model = $this->get('form.factory')->create(FilmType::class, $film);
        // Si l'utilisateur soumet le formulaire
        if ($request->getMethod() == 'POST')
        {
            // Attachement du modèle à l'objet "request"
            $model->handleRequest($request);
            // Validation du modèle
            if ($model->isValid())
            {
                // Obtention du manager
                $manager = $this->getManager();
                // Validation de l'entité
                $manager->saveFilm($film);
            }
        }
        return $this->render('admin/film/edit.html.twig', array('form' =>
            $model->createView(), 'film' => $film));
    }
}