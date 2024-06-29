<?php

namespace App\Form;

use App\Entity\AnneeScolaires;
use App\Entity\Eleves;
use App\Entity\FraisScolaires;
use App\Entity\FraisScolarites;
use App\Entity\FraisType;
use App\Entity\Users;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FraisScolaritesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('montant')
            ->add('arrieres')
            ->add('inscription')
            ->add('carnet')
            ->add('transfert')
            ->add('septembre')
            ->add('octobre')
            ->add('novembre')
            ->add('decembre')
            ->add('janvier')
            ->add('fevrier')
            ->add('mars')
            ->add('avril')
            ->add('mai')
            ->add('juin')
            ->add('autre')
            ->add('echeanceTransfert', null, [
                'widget' => 'single_text'
            ])
            ->add('echeanceCarnet', null, [
                'widget' => 'single_text'
            ])
            ->add('echeanceInscription', null, [
                'widget' => 'single_text'
            ])
            ->add('echeancesArrieres', null, [
                'widget' => 'single_text'
            ])
            ->add('echeanceSeptembre', null, [
                'widget' => 'single_text'
            ])
            ->add('echeanceOctobre', null, [
                'widget' => 'single_text'
            ])
            ->add('echeanceNovembre', null, [
                'widget' => 'single_text'
            ])
            ->add('echeanceDecembre', null, [
                'widget' => 'single_text'
            ])
            ->add('echeanceJanvier', null, [
                'widget' => 'single_text'
            ])
            ->add('echeanceFevrier', null, [
                'widget' => 'single_text'
            ])
            ->add('echeanceMars', null, [
                'widget' => 'single_text'
            ])
            ->add('echeanceAvril', null, [
                'widget' => 'single_text'
            ])
            ->add('echeanceMai', null, [
                'widget' => 'single_text'
            ])
            ->add('echeanceJuin', null, [
                'widget' => 'single_text'
            ])
            ->add('echeanceAutre', null, [
                'widget' => 'single_text'
            ])
            ->add('eleves', EntityType::class, [
                'class' => Eleves::class,
'choice_label' => 'id',
            ])
            ->add('fraisScolaires', EntityType::class, [
                'class' => FraisScolaires::class,
'choice_label' => 'id',
'multiple' => true,
            ])
            ->add('anneeScolaires', EntityType::class, [
                'class' => AnneeScolaires::class,
'choice_label' => 'id',
            ])
            ->add('fraisType', EntityType::class, [
                'class' => FraisType::class,
'choice_label' => 'id',
            ])
            ->add('createdBy', EntityType::class, [
                'class' => Users::class,
'choice_label' => 'id',
            ])
            ->add('updatedBy', EntityType::class, [
                'class' => Users::class,
'choice_label' => 'id',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => FraisScolarites::class,
        ]);
    }
}
