<?php

namespace App\DataFixtures;

use App\Entity\Championnat;
use App\Entity\Club;
use App\Entity\FormuleDeJeu;
use App\Entity\Joueur;
use App\Entity\ModeCalculChampionnat;
use App\Entity\ModeCompetition;
use App\Entity\PointsClassementEquipe;
use App\Entity\RegleCroix;
use App\Entity\ReglementChampionnat;
use App\Entity\RepartitionPoints;
use App\Repository\ChampionnatRepository;
use App\Repository\ClubRepository;
use App\Repository\JoueurRepository;
use App\Repository\ModeCalculChampionnatRepository;
use App\Repository\RepartitionPointsRepository;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class AppFixtures extends Fixture
{
    private RepartitionPointsRepository $rpRepo;
    private ModeCalculChampionnatRepository $mccrRepo;
    private ClubRepository $clRepo;
    private ChampionnatRepository $chRepo;
    private JoueurRepository $jRepo;

    public function __construct(RepartitionPointsRepository $rpRepo,
                                ModeCalculChampionnatRepository $mccrRepo,
                                ClubRepository $clRepo,
                                ChampionnatRepository $chRepo,
                                JoueurRepository $jRepo
    )
    {
        $this->rpRepo = $rpRepo;
        $this->mccrRepo = $mccrRepo;
        $this->clRepo = $clRepo;
        $this->chRepo = $chRepo;
        $this->jRepo = $jRepo;
    }

    public function load(ObjectManager $manager): void
    {
        // Chargement des paramètres 
        $this->loadFormuleDeJeu($manager);
        $this->loadModeCompetition($manager);
        $this->loadRegleCroix($manager);
        $this->loadModeCalcul($manager);
        $this->loadRepartitionPoints($manager);
        
        // Création des entités 
        $this->createClub($manager);
        $this->createChampionnat($manager);

        // Création des liens
        $this->linkClubChampionnat($manager);
        $this->linkJoueurChampionnat($manager);

    }

    //--------------------------------------//
    //         Création des entités         //
    //--------------------------------------//

    // Création du championnat
    private function createChampionnat(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');

        for ($i=0; $i < 3; $i++) { 
            // Création du règlement
            $reglementChampionnat = $this->createReglementChampionnat($manager);

            // Création du comptage des points par équipe
            $this->loadPointsClassementEquipe($manager, $reglementChampionnat);
            
            // Création du Championnat
            $championnat = new Championnat();
            $championnat
                ->setNom(ucwords($faker->words(3, true)) . ' Golf')
                ->setDescription($faker->paragraph())
                ->setSaison(2024 + $i)
                ->setReglementChampionnat($reglementChampionnat)
            ;
            $manager->persist($championnat);
        }

        $manager->flush();
    }

    // Création du règlement du championnat
    private function createReglementChampionnat(ObjectManager $manager): ?ReglementChampionnat
    {
        $faker = Factory::create('fr_FR');

        $rp = new RepartitionPoints();
        $rp = $this->rpRepo->findAll()[0];

        $mccr = new ModeCalculChampionnat();
        $mccr = $this->mccrRepo->findAll()[0];

        $reglementChampionnat = new ReglementChampionnat();
        $reglementChampionnat
            ->setNombreCompetitionRequis(0)
            ->setRepartitionPoints($rp)
            ->setModeCalculChampionnat($mccr)
        ;

        $manager->persist($reglementChampionnat);
        $manager->flush();

        return $reglementChampionnat;
    }

    // Création de clubs 
    private function createClub(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');

        for ($i=0; $i < 20; $i++) { 
            $club = new Club();
            $club
                ->setNom(ucwords($faker->words(2, true)) . ' Golf')
                ->setDescription($faker->paragraph())
            ;
            $manager->persist($club);
            $manager->flush();

            $this->createJoueurs($manager, $club);
            $manager->persist($club);
            $manager->flush();

        }

    }

    // Création de joueurs 
    private function createJoueurs(ObjectManager $manager, Club $club): void
    {
        $faker = Factory::create('fr_FR');

        for ($i=0; $i < $faker->numberBetween(2, 10); $i++) { 
            $joueur = new Joueur();
            $joueur
                ->setNom($faker->lastName())
                ->setPrenom($faker->firstName())
                ->setClub($club)
            ;
            $manager->persist($joueur);
        }

        $manager->flush();
    }

    //--------------------------------------//
    // Chargement des données de paramètres //
    //--------------------------------------//

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

    // Chargement des règles de répartition des points
    private function loadPointsClassementEquipe(ObjectManager $manager, ReglementChampionnat $reglementChampionnat): void
    {
        $listePointsClassementEquipe = json_decode(file_get_contents("docs/data/pointsClassementEquipe.json"),true);

        foreach ($listePointsClassementEquipe as $unPce) {
            $pointsClassementEquipe = new PointsClassementEquipe();
            $pointsClassementEquipe
                ->setClassement($unPce['classement'])
                ->setPoints($unPce['points'])
                ->setReglementChampionnat($reglementChampionnat)            
            ;
            $manager->persist($pointsClassementEquipe);
        }
        $manager->flush();
    }

    //--------------------------------------//
    // Création des liens entre entités     //
    //--------------------------------------//

    // Création des liens entre les clubs et le championnat
    private function linkClubChampionnat(ObjectManager $manager): void
    {
        $ch[] = new Championnat();
        $ch = $this->chRepo->findAll();

        $cl[] = new Club();
        $cl = $this->clRepo->findAll();

        foreach ($ch as $unCh) {
            foreach ($cl as $unCl) {
                $unCh->addClubsChampionnat($unCl);
            }
            $manager->persist($unCh);
        }
        $manager->flush();
    }

    // Création des liens entre les joueurs et le championnat
    private function linkJoueurChampionnat(ObjectManager $manager): void
    {
        $ch[] = new Championnat();
        $ch = $this->chRepo->findAll();

        $jo[] = new Joueur();
        $jo = $this->jRepo->findAll();

        foreach ($ch as $unCh) {
            foreach ($jo as $unJoueur) {
                $unCh->addJoueursChampionnat($unJoueur);
            }
            $manager->persist($unCh);
        }
        $manager->flush();
    }
}
