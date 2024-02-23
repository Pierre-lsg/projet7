<?php

namespace App\Controller\Parametrage;

use App\Entity\ModeCalculChampionnat;
use App\Form\ModeCalculChampionnatType;
use App\Repository\ModeCalculChampionnatRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/parametrage/mcc')]
class ModeCalculChampionnatController extends AbstractController
{
    #[Route('/', name: 'app_mcc_index', methods: ['GET'])]
    public function index(ModeCalculChampionnatRepository $modeCalculChampionnatRepository): Response
    {
        return $this->render('parametrage/mode_calcul_championnat/index.html.twig', [
            'mode_calcul_championnats' => $modeCalculChampionnatRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_mcc_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $modeCalculChampionnat = new ModeCalculChampionnat();
        $form = $this->createForm(ModeCalculChampionnatType::class, $modeCalculChampionnat);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($modeCalculChampionnat);
            $entityManager->flush();

            return $this->redirectToRoute('app_mcc_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('parametrage/mode_calcul_championnat/new.html.twig', [
            'mode_calcul_championnat' => $modeCalculChampionnat,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_mcc_show', methods: ['GET'])]
    public function show(ModeCalculChampionnat $modeCalculChampionnat): Response
    {
        return $this->render('parametrage/mode_calcul_championnat/show.html.twig', [
            'mode_calcul_championnat' => $modeCalculChampionnat,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_mcc_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, ModeCalculChampionnat $modeCalculChampionnat, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ModeCalculChampionnatType::class, $modeCalculChampionnat);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_mcc_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('parametrage/mode_calcul_championnat/edit.html.twig', [
            'mode_calcul_championnat' => $modeCalculChampionnat,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_mcc_delete', methods: ['POST'])]
    public function delete(Request $request, ModeCalculChampionnat $modeCalculChampionnat, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$modeCalculChampionnat->getId(), $request->request->get('_token'))) {
            $entityManager->remove($modeCalculChampionnat);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_mcc_index', [], Response::HTTP_SEE_OTHER);
    }
}
