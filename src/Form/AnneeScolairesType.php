<?php

namespace App\Form;

use App\Entity\AnneeScolaires;
use App\Entity\FraisScolaires;
use App\Entity\Users;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AnneeScolairesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('anneeDebut')
            ->add('anneeFin')
            ->add('createdAt', null, [
                'widget' => 'single_text'
            ])
            ->add('updatedAt', null, [
                'widget' => 'single_text'
            ])
            ->add('fraisScolaires', EntityType::class, [
                'class' => FraisScolaires::class,
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
            'data_class' => AnneeScolaires::class,
        ]);
    }
}
