<?php

namespace AppBundle\Controller;


use AppBundle\Entity\Book;
use AppBundle\Form\BookType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class BookController extends Controller
{
    /**
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/books/all", name="books_all")
     */
    public function viewAllAction()
    {
        $books = $this->getDoctrine()->getRepository(Book::class)->findAll();
        return $this->render('book/view_all.html.twig', array('books' => $books));
    }

    /**
     * @Route("/books/edit/{id}", name="edit_book")
     */

    public function editBookAction(Request $request ,int $id)
    {
        $book = $this->getDoctrine()->getRepository(Book::class)->find($id);
        $form = $this->createForm(BookType::class, $book);

        $form->handleRequest($request);

        if($form->isSubmitted()) {
            $em = $this->getDoctrine()->getManager();

            $em->flush();

            return $this->redirectToRoute('admin_index');
        }
        return $this->render('book/edit_book.html.twig', ['form' => $form->createView()]);
    }
}
