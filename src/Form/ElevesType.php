<?php

namespace App\Form;

use App\Entity\Classes;
use App\Entity\Departements;
use App\Entity\EcoleProvenances;
use App\Entity\Eleves;
use App\Entity\FraisScolarites;
use App\Entity\LieuNaissances;
use App\Entity\Noms;
use App\Entity\Parents;
use App\Entity\Prenoms;
use App\Entity\Redoublements1;
use App\Entity\Redoublements2;
use App\Entity\Redoublements3;
use App\Entity\Scolarites1;
use App\Entity\Scolarites2;
use App\Entity\Scolarites3;
use App\Entity\Statuts;
use App\Entity\Users;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ElevesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('imageName')
            ->add('matricule')
            ->add('sexe')
            ->add('statutFinance')
            ->add('dateNaissance', null, [
                'widget' => 'single_text'
            ])
            ->add('dateExtrait', null, [
                'widget' => 'single_text'
            ])
            ->add('numExtrait')
            ->add('isAdmis')
            ->add('isActif')
            ->add('isHandicap')
            ->add('natureHandicap')
            ->add('dateInscription', null, [
                'widget' => 'single_text'
            ])
            ->add('dateRecrutement', null, [
                'widget' => 'single_text'
            ])
            ->add('fullname')
            ->add('adresse')
            ->add('createdAt', null, [
                'widget' => 'single_text'
            ])
            ->add('updatedAt', null, [
                'widget' => 'single_text'
            ])
            ->add('slug')
            ->add('nom', EntityType::class, [
                'class' => Noms::class,
'choice_label' => 'id',
            ])
            ->add('prenom', EntityType::class, [
                'class' => Prenoms::class,
'choice_label' => 'id',
            ])
            ->add('lieuNaissance', EntityType::class, [
                'class' => LieuNaissances::class,
'choice_label' => 'id',
            ])
            ->add('classe', EntityType::class, [
                'class' => Classes::class,
'choice_label' => 'id',
            ])
            ->add('statut', EntityType::class, [
                'class' => Statuts::class,
'choice_label' => 'id',
            ])
            ->add('ecoleAnDernier', EntityType::class, [
                'class' => EcoleProvenances::class,
'choice_label' => 'id',
            ])
            ->add('ecoleRecrutement', EntityType::class, [
                'class' => EcoleProvenances::class,
'choice_label' => 'id',
            ])
            ->add('departement', EntityType::class, [
                'class' => Departements::class,
'choice_label' => 'id',
            ])
            ->add('scolarite1', EntityType::class, [
                'class' => Scolarites1::class,
'choice_label' => 'id',
            ])
            ->add('scolarite2', EntityType::class, [
                'class' => Scolarites2::class,
'choice_label' => 'id',
            ])
            ->add('scolarite3', EntityType::class, [
                'class' => Scolarites3::class,
'choice_label' => 'id',
            ])
            ->add('redoublement1', EntityType::class, [
                'class' => Redoublements1::class,
'choice_label' => 'id',
            ])
            ->add('redoublement2', EntityType::class, [
                'class' => Redoublements2::class,
'choice_label' => 'id',
            ])
            ->add('redoublement3', EntityType::class, [
                'class' => Redoublements3::class,
'choice_label' => 'id',
            ])
            ->add('user', EntityType::class, [
                'class' => Users::class,
'choice_label' => 'id',
            ])
            ->add('parent', EntityType::class, [
                'class' => Parents::class,
'choice_label' => 'id',
            ])
            ->add('fraisScolarite', EntityType::class, [
                'class' => FraisScolarites::class,
'choice_label' => 'id',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Eleves::class,
        ]);
    }
}
