<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Promotion;
use AppBundle\Form\PromotionType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class PromotionController extends Controller
{
    /**
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/promotions/all", name="promotions_all")
     */
    public function viewAllAction()
    {
        $promotions = $this->getDoctrine()->getRepository(Promotion::class)->findAll();
        return $this->render('promotion/view_all.html.twig', array('promotions' => $promotions));
    }

    /**
     * @Route("/promotions/edit/{id}", name="edit_promotion")
     * @param int $id
     *
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function editAction(Request $request, int $id)
    {
        $genre = $this->getDoctrine()->getRepository(Promotion::class)->find($id);
        $form = $this->createForm(PromotionType::class, $genre);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->flush();

            return $this->redirectToRoute('admin_index');
        }

        return $this->render('promotion/edit.html.twig', ['form' => $form->createView()]);
    }

    /**
     * @param Request $request
     * @Route("/promotions/add", name="add_promotion")
     * @return Response
     */
    public function addBookAction(Request $request)
    {
        $promotion = new Promotion();
        $form = $this->createForm(PromotionType::class, $promotion);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($promotion);
            $em->flush();

            return $this->redirectToRoute('promotions_all');
        }

        return $this->render('promotion/add_promotion.html.twig', ['form'=>$form->createView()]);
    }
}
