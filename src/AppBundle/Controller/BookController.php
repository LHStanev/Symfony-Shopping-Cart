<?php

namespace AppBundle\Controller;


use AppBundle\Entity\Book;
use AppBundle\Form\BookType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

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
     * @param Request $request
     * @param int $id
     * @Route("/books/edit/{id}", name="edit_book")
     * @return Response
     */

    public function editBookAction(Request $request ,int $id)
    {
        $book = $this->getDoctrine()->getRepository(Book::class)->find($id);
        $form = $this->createForm(BookType::class, $book);

        $form->handleRequest($request);

        if($form->isSubmitted()) {
            $em = $this->getDoctrine()->getManager();

            $em->flush();

        $userRoles = $this->getUser()->getRoles();

        foreach ($userRoles as $role) {
            if($role == 'ROLE_ADMIN') {
                return $this->redirectToRoute('admin_index');
            }
        }
            return $this->redirectToRoute('editor_index');
        }

        return $this->render('book/edit_book.html.twig', ['form' => $form->createView()]);
    }

    /**
     * @param Request $request
     * @Route("/books/add", name="add_book")
     * @return Response
     */
    public function addBookAction(Request $request)
    {
        $book = new Book();
        $form = $this->createForm(BookType::class, $book);

        $form->handleRequest($request);

        if($form->isSubmitted()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($book);
            $em->flush();

            return $this->redirectToRoute('books_all');
        }

        return $this->render('book/add_book.html.twig', ['form'=>$form->createView()]);
    }

    /**
     * @Route("genre/{name}", name="books_by_genre")
     * @param string $name
     */
    public function viewByGenre(string $name)
    {
        $books = $this->getDoctrine()->getRepository(Book::class)->viewByGenre($name);

        return $this->render('book/view_by_genre.html.twig', ['books'=>$books]);
    }
}
