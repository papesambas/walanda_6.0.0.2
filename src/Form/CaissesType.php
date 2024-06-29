<?php

namespace App\Form;

use App\Entity\AnneeScolaires;
use App\Entity\Caisses;
use App\Entity\FraisScolarites;
use App\Entity\Users;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CaissesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('dateOp', null, [
                'widget' => 'single_text'
            ])
            ->add('libelle')
            ->add('debit')
            ->add('credit')
            ->add('solde')
            ->add('soldeCumul')
            ->add('createdAt', null, [
                'widget' => 'single_text'
            ])
            ->add('updatedAt', null, [
                'widget' => 'single_text'
            ])
            ->add('slug')
            ->add('scolarite', EntityType::class, [
                'class' => FraisScolarites::class,
'choice_label' => 'id',
            ])
            ->add('author', EntityType::class, [
                'class' => Users::class,
'choice_label' => 'id',
            ])
            ->add('anneeScolaires', EntityType::class, [
                'class' => AnneeScolaires::class,
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
            'data_class' => Caisses::class,
        ]);
    }
}
