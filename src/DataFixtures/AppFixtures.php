<?php

namespace App\DataFixtures;

use App\Entity\FormuleDeJeu;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $this->loadFormuleDeJeu($manager);
        
    }

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
}
