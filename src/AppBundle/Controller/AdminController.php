<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Role;
use AppBundle\Entity\User;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class AdminController
 * @package AppBundle\Controller
 *
 */
class AdminController extends Controller
{
    /**
     * @Route("admin/index", name="admin_index")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction()
    {
        $users = $this->getDoctrine()->getRepository(User::class)->showNewestAction();

        return $this->render('admin/index.html.twig', ['users' => $users]);
    }

    /**
     * @Route("admin/users/edit/{id}", name="edit_user")
     */
    public function editUserAction(Request $request ,int $id)
    {
        $user = $this->getDoctrine()->getRepository(User::class)->find($id);
        $form = $this->createFormBuilder($user)
            ->add('username', TextType::class)
            ->add('email', EmailType::class)
            ->add('initialCash', NumberType::class)
            ->add('spentMoney', NumberType::class)
            ->add('roles', EntityType::class,[
                'class' => Role::class,
                'choice_label' => 'name',
                'multiple' => true
            ])
            ->add('Save', SubmitType::class)
            ->getForm();

        $form->handleRequest($request);

        if($form->isSubmitted()) {
            $em = $this->getDoctrine()->getManager();

            $em->flush();

            return $this->redirectToRoute('admin_index');
        }
        return $this->render('admin/edit_user.html.twig', ['form' => $form->createView()]);
    }
}
