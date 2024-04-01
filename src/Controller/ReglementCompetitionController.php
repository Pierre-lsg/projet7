<?php

namespace App\Controller;

use App\Entity\ReglementCompetition;
use App\Form\ReglementCompetitionType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


#[Route('/reglementCompetition')]
class ReglementCompetitionController extends AbstractController
{
    #[Route('/{id}/competition/{idc}/edit', name: 'app_reglement_competition_edit', methods: ['GET', 'POST'])]
    public function edit(int $id, int $idc, Request $request, ReglementCompetition $reglement, EntityManagerInterface $em): Response
    {
        $form = $this->createForm(ReglementCompetitionType::class, $reglement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->flush();

            return $this->redirectToRoute('app_competition_show', ['id' => $idc], Response::HTTP_SEE_OTHER);
        }

        return $this->render('reglement_competition/edit.html.twig', [
            'reglement' => $reglement,
            'form' => $form,
        ]);
    }

}
