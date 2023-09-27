<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;
use Karser\Recaptcha3Bundle\Form\Recaptcha3Type;
use Karser\Recaptcha3Bundle\Validator\Constraints\Recaptcha3;

class RegisterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('firstname', TextType::class, [
                'label' => 'Votre prénom',
                'constraints' => new Length([ 
                    'min' => 2,
                    'max' => 30]),
                'attr' => [
                    'placeholder' => 'Saisisez votre prénom'
                ]
            ])
            ->add('lastname', TextType::class, [
                'label' => 'Votre nom',
                'constraints' => new Length([ 
                'min' => 2,
                'max' => 30]),
                'attr' => [
                    'placeholder' => 'Saisisez votre nom'
                ]
            ])
            ->add('email', EmailType::class, [
                'label' => 'Votre e-mail', 
                'constraints' => new Length([ 
                    'min' => 2,
                    'max' => 55]),
                'attr' => [
                    'placeholder' => 'Saisisez votre adresse e-mail'
                ]
            ])
            ->add('password', RepeatedType::class, [
                'type' => PasswordType::class,
                'invalid_message' => 'le mot de passe et la confirmation doivent être identique.',
                'label' => 'Votre mot de passe',
                'required' => true, 
                'first_options' => [
                 'label' => 'Votre mot de passe',
                 'attr' => ['placeholder' => 'Saisisez votre mot de passe']
                ],
                'second_options' => [
                    'label' => 'Confirmer votre mot de passe',
                    'attr' => ['placeholder' => 'Veuillez confirmer votre mot de passe']
                   ], 
            ])
            
            ->add('submit', SubmitType::class, [
                'label'=> "S'inscrire"
            ])

            ->add('captcha', Recaptcha3Type::class, [
                'constraints' => new Recaptcha3(),
                'action_name' => 'register',
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
