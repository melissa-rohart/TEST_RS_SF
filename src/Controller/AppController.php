<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use App\Entity\Site;

class AppController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function home(AuthorizationCheckerInterface $authChecker)
    {
        if (false === $authChecker->isGranted('ROLE_USER')) {
            return $this->render('App/home.html.twig');
        }

        $sites = $this->getDoctrine()->getRepository(Site::class)->findAll();

        return $this->render('Site/view_site.html.twig', ['sites' => $sites]);
    }
}
