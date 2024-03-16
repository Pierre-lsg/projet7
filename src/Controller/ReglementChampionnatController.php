<?php

namespace App\Controller;

use App\Entity\ReglementChampionnat;
use App\Form\ReglementChampionnatType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/reglement')]
class ReglementChampionnatController extends AbstractController
{

    
    #[Route('/{id}/championnat/{idc}/edit', name: 'app_reglement_edit', methods: ['GET', 'POST'])]
    public function edit(int $id, int $idc, Request $request, ReglementChampionnat $reglement, EntityManagerInterface $em): Response
    {
        $form = $this->createForm(ReglementChampionnatType::class, $reglement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->flush();

            return $this->redirectToRoute('app_championnat_show', ['id' => $idc], Response::HTTP_SEE_OTHER);
        }

        return $this->render('reglement_championnat/edit.html.twig', [
            'reglement' => $reglement,
            'form' => $form,
        ]);
    }

}
