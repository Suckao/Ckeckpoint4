<?php

namespace App\Controller;

use App\Entity\Newlesters;
use App\Form\Newlesters1Type;
use App\Repository\NewlestersRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/newlesters")
 */
class NewlestersController extends AbstractController
{
    /**
     * @Route("/", name="newlesters_index", methods={"GET"})
     */
    public function index(NewlestersRepository $newlestersRepository): Response
    {
        return $this->render('newlesters/index.html.twig', [
            'newlesters' => $newlestersRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="newlesters_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $newlester = new Newlesters();
        $form = $this->createForm(Newlesters1Type::class, $newlester);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($newlester);
            $entityManager->flush();

            return $this->redirectToRoute('newlesters_index');
        }

        return $this->render('newlesters/new.html.twig', [
            'newlester' => $newlester,
            'form' => $form->createView(),
        ]);
    }
}
