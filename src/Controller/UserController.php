<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use App\Entity\User;
use App\Form\RegisterType;

class UserController extends AbstractController
{
    /**
     * @Route("/login", name="login")
     */
    public function login()
    {
        return $this->render("User/login.html.twig");
    }

    /**
     * @Route("/logout", name="logout")
     */
    public function logout(): void
    {
        throw new \Exception('This should never be reached!');
    }


    /**
     * @Route("/register", name="register")
     */
    public function register(Request $request, UserPasswordEncoderInterface $encoder)
    {
        $user = new User();

        $form = $this->createForm(RegisterType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $password = $encoder->encodePassword($user, $user->getPassword());
            $user->setPassword($password);
            $user->setEmail($user->getUsername());

            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            return $this->redirectToRoute('home');
        }

        return $this->render("User/register.html.twig", ['form' => $form->createView()]);
    }
}