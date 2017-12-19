<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Book;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class EditorController extends Controller
{
    /**
     * @Route("editor/index", name="editor_index")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction()
    {
        $books = $this->getDoctrine()->getRepository(Book::class)->showLastFive();

        return $this->render('editor/index.html.twig', ['books' =>$books]);
    }
}
