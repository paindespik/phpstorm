<?php

namespace AppBundle\Controller\admin;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
class FilmController extends Controller
{
    /**
     * @Route("/admin/film", name="film_index")
     */
    public function indexAction()
    {
        $message = "Say Hello World";

        return $this->render(
            'admin/film/index.html.twig',
            array('message' => $message)
        );
    }
}