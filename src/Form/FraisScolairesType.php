<?php

namespace App\Form;

use App\Entity\AnneeScolaires;
use App\Entity\Echeances;
use App\Entity\FraisScolaires;
use App\Entity\FraisScolarites;
use App\Entity\FraisType;
use App\Entity\Users;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FraisScolairesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('designation')
            ->add('montant')
            ->add('createdAt', null, [
                'widget' => 'single_text'
            ])
            ->add('updatedAt', null, [
                'widget' => 'single_text'
            ])
            ->add('echeance', EntityType::class, [
                'class' => Echeances::class,
'choice_label' => 'id',
            ])
            ->add('fraisType', EntityType::class, [
                'class' => FraisType::class,
'choice_label' => 'id',
            ])
            ->add('fraisScolarites', EntityType::class, [
                'class' => FraisScolarites::class,
'choice_label' => 'id',
'multiple' => true,
            ])
            ->add('anneeScolaires', EntityType::class, [
                'class' => AnneeScolaires::class,
'choice_label' => 'id',
'multiple' => true,
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
            'data_class' => FraisScolaires::class,
        ]);
    }
}
