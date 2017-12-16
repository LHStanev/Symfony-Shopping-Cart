<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Admin;
use AppBundle\Entity\Editor;
use AppBundle\Entity\Role;
use AppBundle\Entity\User;
use AppBundle\Form\UserType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class UserController extends Controller
{
    /**
     * @Route("/", name="homepage")
     * @param $name
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction()
    {
        return $this->render('base.html.twig');
    }

    /**
     * @Route("/register", name="register")
     */
    public function registerAction(Request $request)
    {
        $user = new User();
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        if($form->isSubmitted()) {

            // Encode the user password.

            $password = $this->get('security.password_encoder')->encodePassword($user, $user->getPlainPassword());
            $user->setPassword($password);

            //Check if this is the first registration(Admin) and assign a role.

            $users = $this->getDoctrine()->getRepository(User::class)->findAll();

            if(null != $users) {
                $role = $this->getDoctrine()->getRepository(Role::class)->findOneBy(['name' => 'ROLE_USER']);
            } else {
                $role = $this->getDoctrine()->getRepository(Role::class)->findOneBy(['name' => 'ROLE_ADMIN']);
            }
            $user->setRoles([$role]);

            //Add user to DB.

            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            return $this->redirectToRoute('login');
        }
        return $this->render('user/register.html.twig', ['form' => $form->createView()]);
    }
}
