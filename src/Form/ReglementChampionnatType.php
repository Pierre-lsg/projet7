<?php

namespace App\Form;

use App\Entity\ModeCalculChampionnat;
use App\Entity\ReglementChampionnat;
use App\Entity\RepartitionPoints;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ReglementChampionnatType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nombreCompetitionRequis')
            ->add('repartitionPoints', EntityType::class, [
                'class' => RepartitionPoints::class,
'choice_label' => 'nom',
            ])
            ->add('modeCalculChampionnat', EntityType::class, [
                'class' => ModeCalculChampionnat::class,
'choice_label' => 'nom',
            ])
            ->add('listePointsClassementEquipe', CollectionType::class, [
                'entry_type' => PointsClassementEquipeType::class,
                'allow_add' => true,
                'allow_delete' => true,
                'by_reference' => false,
                'entry_options' => ['label' => false],
                'attr' => [
                    'data-controller' => 'form-collection',
                    'data-form-collection-add-label-value' => 'Ajouter un classement',
                    'data-form-collection-add-delete-value' => 'Supprimer'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ReglementChampionnat::class,
        ]);
    }
}
