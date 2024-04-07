<?php

namespace App\Controller;

use App\Entity\Parcours;
use App\Form\ParcoursType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/parcours')]
class ParcoursController extends AbstractController
{
    #[Route('/show', name: 'app_parcours_show')]
    public function index(int $id, Parcours $parcours): Response
    {
        return $this->render('parcours/show.html.twig', [
            'parcours' => $parcours,
        ]);
    }

    #[Route('/{id}/competition/{idc}/edit', name: 'app_parcours_edit')]
    public function edit(int $id, int $idc, Request $request, PArcours $parcours, EntityManagerInterface $em): Response
    {
        $form = $this->createForm(ParcoursType::class, $parcours);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->flush();

            return $this->redirectToRoute('app_competition_show', ['id' => $idc], Response::HTTP_SEE_OTHER);
        }

        return $this->render('parcours/edit.html.twig', [
            'parcours' => $parcours,
            'form' => $form,
        ]);
    }
}
