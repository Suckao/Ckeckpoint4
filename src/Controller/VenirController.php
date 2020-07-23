<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class VenirController extends AbstractController
{
    /**
     * @Route("/venir", name="venir")
     */
    public function index()
    {
        return $this->render('venir/index.html.twig', [
            'controller_name' => 'VenirController',
        ]);
    }
}
