<?php

namespace AppBundle\Controller;


use AppBundle\Entity\Book;
use AppBundle\Entity\Promotion;
use AppBundle\Entity\Review;
use AppBundle\Entity\User;
use AppBundle\Form\BookType;
use AppBundle\Form\ReviewType;
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

        if($form->isSubmitted() && $form->isValid()) {
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
     * @return Response
     */
    public function viewByGenreAction(string $name)
    {
        $books = $this->getDoctrine()->getRepository(Book::class)->viewByGenre($name);

        return $this->render('book/view_by_genre.html.twig', ['books'=>$books]);
    }

    /**
     * @Route("book/{id}", name="book_by_id")
     * @param int $id
     * @param Request $request
     * @return Response
     */
    public function viewOneByIdAction(Request $request, int $id)
    {
        $book = $this->getDoctrine()->getRepository(Book::class)->find($id);
        $discount = $this->checkForPromotions($id);
        if(null != $discount) {
            $discountPrice = $book->getPrice()- ($book->getPrice() * ($discount / 100) );
            $book->setDiscountPrice($discountPrice);
        }


        $reviews = $this->getDoctrine()->getRepository(Review::class)->findAllByBookId($id);

        $review = new Review();

        if($this->getUser()) {
            $user = $this->getUser();
        } else {
            $user = $this->getDoctrine()->getRepository(User::class)->findOneBy(['username' => 'anonymous']);
        }

        $review->setBook($book);
        $review->setUser($user);

        $form = $this->createForm(ReviewType::class, $review);
        $form->handleRequest($request);

        if($form->isSubmitted()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($review);
            $em->flush();

            return $this->redirect($request->server->get('HTTP_REFERER'));
        }

        return $this->render('book/one_by_id.html.twig', [
            'book'=>$book,
            'form'=>$form->createView(),
            'reviews'=>$reviews
        ]);
    }

    /**
     * @Route("/latest_books", name="latest_books")
     * @return Response
     */
    public function showLatestBooksAction()
    {
        $books = $this->getDoctrine()->getRepository(Book::class)->showLastTen();

        return $this->render('book/view_last_ten.html.twig', ['books'=>$books]);
    }

    public function checkForPromotions(int $id)
    {
        $book = $this->getDoctrine()->getRepository(Book::class)->find($id);
        $genre = $book->getGenre();
        $promotions = $this->getDoctrine()->getRepository(Promotion::class)->checkGenrePromotion($genre);
        if(!empty($promotions)) {
            foreach($promotions as $promotion) {
                $discount = $promotion->getDiscount();
            }
            return $discount;
        }
        return null;
    }
}
