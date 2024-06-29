<?php

namespace App\Form;

use App\Entity\Niveaux;
use App\Entity\Scolarites1;
use App\Entity\Scolarites2;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class Scolarites2Type extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('scolarite')
            ->add('createdAt', null, [
                'widget' => 'single_text'
            ])
            ->add('updatedAt', null, [
                'widget' => 'single_text'
            ])
            ->add('scolarite1', EntityType::class, [
                'class' => Scolarites1::class,
'choice_label' => 'id',
            ])
            ->add('niveau', EntityType::class, [
                'class' => Niveaux::class,
'choice_label' => 'id',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Scolarites2::class,
        ]);
    }
}
