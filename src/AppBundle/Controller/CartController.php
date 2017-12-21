<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Book;
use AppBundle\Entity\Cart;
use AppBundle\Entity\User;
use AppBundle\Form\CartType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\BrowserKit\Response;
use Symfony\Component\HttpFoundation\Request;

class CartController extends Controller
{

    /**
     * @Route("/cart", name="index_cart")
     * @param Request $request
     */
    public function indexAction(Request $request)
    {

        /**@var $user User */
        $user = $this->getUser();
        $orders = $user->getOrders();
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
     */
    public function cartTransactionAction()
    {
        $orders = $this->getUser()->getOrders();
        $em = $this->getDoctrine()->getManager();
        $user = $this->getUser();

        foreach ($orders as $order) {
            $balance = $this->getUser()->getBalance();

            if(intval($order->getPrice()) < $balance) {
                $order->reduceQuantity(1);
                $user->decreaseBalance($order->getPrice());
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
}
