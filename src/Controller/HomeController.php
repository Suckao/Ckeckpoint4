<?php


namespace App\Controller;

use App\Entity\Newlesters;
use App\Entity\Spectacles;
use App\Form\Newlesters1Type;
use App\Repository\EvenementsRepository;
use App\Repository\SpectaclesRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="accueil")
     */
    public function index( SpectaclesRepository $spectaclesRepository, EvenementsRepository $evenementsRepository, Request $request)
    {
        $newlester = new Newlesters();
        $form = $this->createForm(Newlesters1Type::class, $newlester);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($newlester);
            $entityManager->flush();

            return $this->redirectToRoute('accueil');
        }

        return $this->render('home/index.html.twig',
        [
            'spectacles' => $spectaclesRepository->findAll(),
            'evenements' => $evenementsRepository->findAll(),
            'newlester' => $newlester,
            'form' => $form->createView(),
        ]);
    }

}