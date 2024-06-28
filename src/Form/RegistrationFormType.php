<?php

namespace App\Form;

use App\Entity\Users;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Validator\Constraints\Regex;


class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', TextType::class, [
                'label' => 'Nom',
            'attr'=>[
                'placeholder' => 'Entrer le Nom de Famille',
            ],
                'required' => false,
                'error_bubbling' => false,
            ])
            ->add('prenom', TextType::class, [
                'label' => 'Prénom',
            'attr'=>[
                'placeholder' => 'Entrer le Prénom',
            ],
                'required' => false,
                'error_bubbling' => false,
            ])
            ->add('username', TextType::class, [
                'attr' => ['placeholder' => "Nom d'utilisateur"],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Please enter a password',
                    ]),
                    new Length([
                        'min' => 6,
                        'minMessage' => 'Your username should be at least {{ limit }} characters',
                        // max length allowed by Symfony for security reasons
                        'max' => 50,
                    ]),
                ],

                'error_bubbling' => false,
            ])
            ->add('agreeTerms', CheckboxType::class, [
                'mapped' => false,
                'constraints' => [
                    new IsTrue([
                        'message' => 'You should agree to our terms.',
                    ]),
                ],
            ])
            ->add('email', EmailType::class, [
                'label' => "E-mail",
                'required' => True,
                'attr' => [
                    'placeholder' => 'exemple@email.fr',
                ]
            ])
            ->add('telephone', TelType::class, [
                'label' => 'Téléphone',
                'attr' => [
                    'placeholder' => 'exemple +22300000000',
                ],
                'constraints' => new Length([
                    'min' => 12,
                    'minMessage' => 'Your phone number should be at least {{ limit }} characters',
                    // max length allowed by Symfony for security reasons
                    'max' => 12,
                ]),
            ])
            ->add('adresse', TextareaType::class, [
                'attr' => [
                    'placeholder' => 'Votre adresse ici',
                ],
            ])
            ->add('plainPassword', RepeatedType::class, [
                // instead of being set onto the object directly,
                // this is read and encoded in the controller
                'mapped' => false,
                'attr' => ['autocomplete' => 'new-password'],
                'type' => PasswordType::class,
                'options' => [
                    'attr' => [
                        'type' => 'password'
                    ]
                ],
                'first_options' => ['label' => 'Mot de passe'],
                'second_options' => ['label' => 'confirmer le mot de passe'],
                'constraints' => [
                    new Regex('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{10,30}$/',
                    "Il faut un mot de passe de 8 à 10 caractères avec un Majuscule, un minuscule, un chiffre et un caractère spécial")
                ],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Users::class,
        ]);
    }
}
