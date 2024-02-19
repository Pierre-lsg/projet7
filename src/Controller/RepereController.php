<?php

namespace App\Controller;

use App\Entity\Repere;
use App\Form\RepereType;
use App\Repository\RepereRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/repere')]
class RepereController extends AbstractController
{
    #[Route('/', name: 'app_repere_index', methods: ['GET'])]
    public function index(RepereRepository $repereRepository): Response
    {
        return $this->render('repere/index.html.twig', [
            'reperes' => $repereRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_repere_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $repere = new Repere();
        $form = $this->createForm(RepereType::class, $repere);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($repere);
            $entityManager->flush();

            return $this->redirectToRoute('app_repere_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('repere/new.html.twig', [
            'repere' => $repere,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_repere_show', methods: ['GET'])]
    public function show(Repere $repere): Response
    {
        return $this->render('repere/show.html.twig', [
            'repere' => $repere,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_repere_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Repere $repere, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(RepereType::class, $repere);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_repere_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('repere/edit.html.twig', [
            'repere' => $repere,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_repere_delete', methods: ['POST'])]
    public function delete(Request $request, Repere $repere, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$repere->getId(), $request->request->get('_token'))) {
            $entityManager->remove($repere);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_repere_index', [], Response::HTTP_SEE_OTHER);
    }
}
