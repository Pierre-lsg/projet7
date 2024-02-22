<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

class ParametrageController extends AbstractController
{
    #[Route('/parametrage', name: 'app_parametrage')]
    #[IsGranted('ROLE_USER')]
    public function index(): Response
    {
        return $this->render('parametrage/index.html.twig', [
            'controller_name' => 'ParametrageController',
        ]);
    }
}
