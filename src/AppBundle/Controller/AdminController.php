<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Role;
use AppBundle\Entity\User;
use AppBundle\Form\EditUserType;
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
        $form = $this->createForm(EditUserType::class, $user);

        $form->handleRequest($request);

        if($form->isSubmitted()) {
            $em = $this->getDoctrine()->getManager();

            $em->flush();

            return $this->redirectToRoute('admin_index');
        }
        return $this->render('admin/edit_user.html.twig', ['form' => $form->createView()]);
    }

    /**
     * @Route("/admin/users", name="admin_users")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function viewUsersAction()
    {
        $users = $this->getDoctrine()->getRepository(User::class)->showAllAction();

        return $this->render('admin/users.html.twig', ['users' => $users]);
    }

    /**
     * @Route("/admin/users/ban/{id}", name="admin_user_ban")
     * @param int $id
     */
    public function banUserAction(Request $request ,int $id) {

        $user= $this->getDoctrine()->getRepository(User::class)->find($id);

        if (true == $user->isEnabled()){
            $user->setEnabled(false);
        }else{
            $user->setEnabled(true);
        }
        $em = $this->getDoctrine()->getManager();
        $em->flush();

        return $this->redirect($request->server->get('HTTP_REFERER'));;
    }
}
