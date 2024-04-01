<?php

namespace App\Form;

use App\Entity\ModeCompetition;
use App\Entity\RegleCroix;
use App\Entity\ReglementCompetition;
use App\Entity\Repere;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ReglementCompetitionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('dateCompetition')
            ->add('datePublicationResultat')
            ->add('nombreJoueurParEquipe')
            ->add('nombreEquipeParFlight')
            ->add('accueil', EntityType::class, [
                'class' => Repere::class,
'choice_label' => 'nom',
            ])
            ->add('modeCompetition', EntityType::class, [
                'class' => ModeCompetition::class,
'choice_label' => 'nom',
            ])
            ->add('regleCroix', EntityType::class, [
                'class' => RegleCroix::class,
'choice_label' => 'nom',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ReglementCompetition::class,
        ]);
    }
}
