<?php

namespace App\Controller;

use App\Entity\Spectacles;
use App\Form\SpectaclesType;
use App\Repository\SpectaclesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/spectacles")
 */
class SpectaclesController extends AbstractController
{
    /**
     * @Route("/", name="spectacles_list", methods={"GET"})
     */
    public function index(SpectaclesRepository $spectaclesRepository): Response
    {
        return $this->render('spectacles/index.html.twig', [
            'spectacles' => $spectaclesRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="spectacles_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $spectacle = new Spectacles();
        $form = $this->createForm(SpectaclesType::class, $spectacle);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($spectacle);
            $entityManager->flush();

            return $this->redirectToRoute('spectacles_index');
        }

        return $this->render('spectacles/new.html.twig', [
            'spectacle' => $spectacle,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="spectacles_show", methods={"GET"})
     */
    public function show(Spectacles $spectacle): Response
    {
        return $this->render('spectacles/show.html.twig', [
            'spectacle' => $spectacle,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="spectacles_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Spectacles $spectacle): Response
    {
        $form = $this->createForm(SpectaclesType::class, $spectacle);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('spectacles_index');
        }

        return $this->render('spectacles/edit.html.twig', [
            'spectacle' => $spectacle,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="spectacles_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Spectacles $spectacle): Response
    {
        if ($this->isCsrfTokenValid('delete'.$spectacle->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($spectacle);
            $entityManager->flush();
        }

        return $this->redirectToRoute('spectacles_index');
    }
}
