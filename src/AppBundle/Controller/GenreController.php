<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Genre;
use AppBundle\Form\GenreType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class GenreController extends Controller
{
    public function indexAction()
    {
        $genres = $this->getDoctrine()->getRepository(Genre::class)->findAll();

        return $this->render(
            'genre/all.html.twig',
            array('genres' => $genres)
        );
    }

    /**
     * @Route("/genres/edit/{id}", name="edit_genre")
     * @param int $id
     *
     */
    public function editAction(Request $request, int $id)
    {
        $genre = $this->getDoctrine()->getRepository(Genre::class)->find($id);
        $form = $this->createForm(GenreType::class, $genre);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->flush();

            return $this->redirectToRoute('editor_index');
        }

        return $this->render('genre/edit.html.twig', ['form' => $form->createView()]);
    }

    /**
     * @Route("/genres/delete/{id}", name="delete_genre")
     * @param int $id
     * @return Response
     */
    public function deleteAction(Request $request, int $id)
    {
        $genre = $this->getDoctrine()->getRepository(Genre::class)->find($id);
        $em = $this->getDoctrine()->getManager();
        $em->remove($genre);
        $em->flush();

        return $this->redirectToRoute('editor_index');
    }

    /**
     * @Route("/genres/add", name="add_genre")
     * @return Response
     */
    public function addAction(Request $request)
    {
        $genre = new Genre();
        $form = $this->createForm(GenreType::class, $genre);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($genre);
            $em->flush();

            return $this->redirectToRoute('editor_index');
        }

        return $this->render('genre/add.html.twig', ['form' => $form->createView()]);
    }
}
