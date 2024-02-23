<?php

namespace App\Controller;

use App\Entity\Championnat;
use App\Repository\ChampionnatRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('championnat')]
class ChampionnatController extends AbstractController
{
    private ChampionnatRepository $championnatRepository;

    public function __construct(ChampionnatRepository $championnatRepository)
    {
        $this->championnatRepository = $championnatRepository;
    }

    #[Route('/', name: 'app_championnat')]
    public function index(): Response
    {
        return $this->render('championnat/index.html.twig', [
            'championnats' => $this->championnatRepository->findAll(),
        ]);
    }

    #[Route('/{id}', name: 'app_championnat_show')]
    public function show(Championnat $championnat): Response
    {
        return $this->render('championnat/show.html.twig', [
            'championnat' => $championnat,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_championnat_edit')]
    public function edit(): Response
    {
        return $this->render('championnat/index.html.twig', [
            'championnats' => $this->championnatRepository->findAll(),
        ]);
    }
}
