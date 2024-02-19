<?php

namespace App\DataFixtures;

use App\Entity\FormuleDeJeu;
use App\Entity\ModeCalculChampionnat;
use App\Entity\ModeCompetition;
use App\Entity\RegleCroix;
use App\Entity\RepartitionPoints;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // Chargement des paramètres 
        $this->loadFormuleDeJeu($manager);
        $this->loadModeCompetition($manager);
        $this->loadRegleCroix($manager);
        $this->loadModeCalcul($manager);
        $this->loadRepartitionPoints($manager);
        
    }

    // Chargement des formules de jeu
    private function loadFormuleDeJeu(ObjectManager $manager): void
    {
        $listeFormuleDeJeu = json_decode(file_get_contents("docs/data/formuleDeJeu.json"),true);

        foreach ($listeFormuleDeJeu as $uneFdj) {
            $formuleDeJeu = new FormuleDeJeu();
            $formuleDeJeu
                ->setNom($uneFdj['nom'])
                ->setDescription($uneFdj['description'])            
            ;
            $manager->persist($formuleDeJeu);
        }

        $manager->flush();
    }

    // Chargement des modes de compétition
    private function loadModeCompetition(ObjectManager $manager): void
    {
        $listeModeCompetition = json_decode(file_get_contents("docs/data/modeCompetition.json"),true);

        foreach ($listeModeCompetition as $unMC) {
            $modeCompetition = new ModeCompetition();
            $modeCompetition
                ->setNom($unMC['nom'])
                ->setDescription($unMC['description'])            
            ;
            $manager->persist($modeCompetition);
        }

        $manager->flush();
    }

    // Chargement des règles de Croix
    private function loadRegleCroix(ObjectManager $manager): void
    {
        $listeRegleCroix = json_decode(file_get_contents("docs/data/regleCroix.json"),true);

        foreach ($listeRegleCroix as $uneRG) {
            $regleCroix = new RegleCroix();
            $regleCroix
                ->setNom($uneRG['nom'])
                ->setDescription($uneRG['description'])
                ->setValeurCroix($uneRG['valeurCroix'])            
            ;
            $manager->persist($regleCroix);
        }

        $manager->flush();
    }

    // Chargement des modes de calcul
    private function loadModeCalcul(ObjectManager $manager): void
    {
        $listeModeCalcul = json_decode(file_get_contents("docs/data/modeCalcul.json"),true);

        foreach ($listeModeCalcul as $unMC) {
            $modeCalcul = new ModeCalculChampionnat();
            $modeCalcul
                ->setNom($unMC['nom'])
                ->setDescription($unMC['description'])
            ;
            $manager->persist($modeCalcul);
        }

        $manager->flush();
    }

    // Chargement des règles de répartition des points
    private function loadRepartitionPoints(ObjectManager $manager): void
    {
        $listeRepartitionPoints = json_decode(file_get_contents("docs/data/repartitionPoints.json"),true);

        foreach ($listeRepartitionPoints as $uneRP) {
            $repartitionPoints = new RepartitionPoints();
            $repartitionPoints
                ->setNom($uneRP['nom'])
                ->setDescription($uneRP['description'])
            ;
            $manager->persist($repartitionPoints);
        }

        $manager->flush();
    }
}
