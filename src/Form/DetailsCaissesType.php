<?php

namespace App\Form;

use App\Entity\Caisses;
use App\Entity\DetailsCaisses;
use App\Entity\Users;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DetailsCaissesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('dateOp', null, [
                'widget' => 'single_text'
            ])
            ->add('designation')
            ->add('montant')
            ->add('createdAt', null, [
                'widget' => 'single_text'
            ])
            ->add('updatedAt', null, [
                'widget' => 'single_text'
            ])
            ->add('slug')
            ->add('caisse', EntityType::class, [
                'class' => Caisses::class,
'choice_label' => 'id',
            ])
            ->add('author', EntityType::class, [
                'class' => Users::class,
'choice_label' => 'id',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => DetailsCaisses::class,
        ]);
    }
}
