<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Book;
use AppBundle\Entity\Promotion;
use AppBundle\Entity\User;
use Doctrine\Common\Collections\ArrayCollection;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class CartController extends Controller
{

    /**
     * @Route("/cart", name="index_cart")
     * @param Request $request
     * @return Response
     */
    public function indexAction(Request $request)
    {

        /**@var $user User */
        $user = $this->getUser();
        $orders = $user->getOrders();
        foreach($orders as $order) {
            $id = $order->getId();
            $discount = $this->checkForPromotions($id);
            if(null != $discount) {
                $order->setDiscountPrice($order->getPrice()- ($order->getPrice() * ($discount / 100) ));
            }
        }
        $purchases = $user->getPurchases();
        $balance = $this->getUser()->getBalance();

        return $this->render('cart/index.html.twig', [
            'orders' => $orders,
            'balance' => $balance,
            'purchases' => $purchases
        ]);
    }

    /**
     * @Route("/cart/add/{id}", name="add_order")
     * @param int $id
     * @return Response
     */
    public function addOrderAction(int $id)
    {
        $orders = $this->getUser()->getOrders();

        $order = $this->getDoctrine()->getRepository(Book::class)->find($id);
        if($orders->contains($order)){
           return $this->render('errorPage.html.twig', ['error' => 'This product is already in your cart.']);
        } else {
            $user = $this->getUser();
            $user->addOrder($order);
            $em = $this->getDoctrine()->getManager();
            $em->flush();
            return $this->redirectToRoute('index_cart');
        }
    }

    /**
     * @Route("/cart/transaction", name="cart_transaction")
     * @return Response
     */
    public function cartTransactionAction()
    {
        /** @var Book|ArrayCollection $orders */

        $orders = $this->getUser()->getOrders();
        $em = $this->getDoctrine()->getManager();
        $user = $this->getUser();

        foreach ($orders as $order) {
            $balance = $this->getUser()->getBalance();

            if(intval($order->getPrice()) < $balance) {
                $order->reduceQuantity(1);
                $discount = $this->checkForPromotions($order->getId());
                if(null != $discount) {
                    $discountPrice = $order->getPrice()- ($order->getPrice() * ($discount / 100) );
                    $user->decreaseBalance($discountPrice);
                } else {
                    $user->decreaseBalance($order->getPrice());
                }

                $orders->removeElement($order);
                $user->addPurchase($order);
                $em->flush();
            }else {
                $this->addFlash('error', 'Insufficient funds!');
            }
        }
        $purchases = $user->getPurchases();
        return $this->redirectToRoute('index_cart', ['purchases' => $purchases]);
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
