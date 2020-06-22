<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Site;
use Symfony\Component\HttpFoundation\Request;
use App\Form\AddSiteType;
use App\Form\ModifySiteType;

class SiteController extends AbstractController
{
    /**
     * @Route("/add_site", name="add_site")
     */
    public function addSite(Request $request)
    {
        $site = new Site();

        $form = $this->createForm(AddSiteType::class, $site);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $em->persist($site);
            $em->flush();

            return $this->redirectToRoute('home');
        }

        return $this->render("Site/add_site.html.twig", ['form' => $form->createView()]);
    }

    /**
     * @Route("/modify_site/{id}", name="modify_site")
     */
    public function modifySite(Request $request, $id)
    {
        $site = $this->getDoctrine()->getRepository(Site::class)->find($id);

        $form = $this->createForm(ModifySiteType::class, $site);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($site);
            $em->flush();

            return $this->redirectToRoute('home');
        }

        return $this->render("Site/modify_site.html.twig", ['form' => $form->createView()]);;
    }

    /**
     * @Route("/remove_site/{id}", name="remove_site")
     */
    public function removeSite($id)
    {
        $site = $this->getDoctrine()->getRepository(Site::class)->find($id);
        $entityManager = $this->getDoctrine()->getManager();

        $entityManager->remove($site);
        $entityManager->flush();

        return $this->redirectToRoute('home');

    }

}
