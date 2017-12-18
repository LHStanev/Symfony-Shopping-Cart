<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Genre;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class GenreController extends Controller
{
    public function indexAction()
    {
        $genres = $this->getDoctrine()->getRepository(Genre::class)->findAll();

        return $this->render(
            'genres.html.twig',
            array('genres' => $genres)
        );
    }
}
