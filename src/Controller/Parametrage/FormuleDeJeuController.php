<?php

namespace App\Controller\Parametrage;

use App\Entity\FormuleDeJeu;
use App\Form\FormuleDeJeuType;
use App\Repository\FormuleDeJeuRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/parametrage/fdj')]
class FormuleDeJeuController extends AbstractController
{
    #[Route('/', name: 'app_fdj_index', methods: ['GET'])]
    public function index(FormuleDeJeuRepository $formuleDeJeuRepository): Response
    {
        return $this->render('parametrage/formule_de_jeu/index.html.twig', [
            'formule_de_jeus' => $formuleDeJeuRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_fdj_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $formuleDeJeu = new FormuleDeJeu();
        $form = $this->createForm(FormuleDeJeuType::class, $formuleDeJeu);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($formuleDeJeu);
            $entityManager->flush();

            return $this->redirectToRoute('app_fdj_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('parametrage/formule_de_jeu/new.html.twig', [
            'formule_de_jeu' => $formuleDeJeu,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_fdj_show', methods: ['GET'])]
    public function show(FormuleDeJeu $formuleDeJeu): Response
    {
        return $this->render('parametrage/formule_de_jeu/show.html.twig', [
            'formule_de_jeu' => $formuleDeJeu,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_fdj_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, FormuleDeJeu $formuleDeJeu, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(FormuleDeJeuType::class, $formuleDeJeu);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_fdj_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('parametrage/formule_de_jeu/edit.html.twig', [
            'formule_de_jeu' => $formuleDeJeu,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_fdj_delete', methods: ['POST'])]
    public function delete(Request $request, FormuleDeJeu $formuleDeJeu, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$formuleDeJeu->getId(), $request->request->get('_token'))) {
            $entityManager->remove($formuleDeJeu);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_fdj_index', [], Response::HTTP_SEE_OTHER);
    }
}
