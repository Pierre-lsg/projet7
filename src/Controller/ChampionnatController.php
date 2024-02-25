<?php

namespace App\Controller;

use App\Entity\Championnat;
use App\Form\ChampionnatType;
use App\Repository\ChampionnatRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
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

    #[Route('/{id}/edit', name: 'app_championnat_edit', methods: ['GET', 'POST'])]
    public function edit(int $id, Request $request, Championnat $championnat, EntityManagerInterface $em): Response
    {
        $form = $this->createForm(ChampionnatType::class, $championnat);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->flush();

            return $this->redirectToRoute('app_championnat_show', ['id' => $id], Response::HTTP_SEE_OTHER);
        }

        return $this->render('championnat/edit.html.twig', [
            'championnat' => $championnat,
            'form' => $form,
        ]);
    }
}
