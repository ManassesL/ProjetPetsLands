<?php

namespace App\Form;

use App\Entity\Address;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class AddressType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'label' => "Nom de l'adresse ?",
                'attr' => [
                    'placeholder' => 'Exemple (adresse 1, adresse 2 ...)'
                ]
            ])
            ->add('firstname', TextType::class, [
                'label' => 'Votre prénom ?',
                'attr' => [
                    'placeholder' => 'Entrez votre adresse'
                ]
            ])

            ->add('lastname', TextType::class, [
                'label' => 'Votre nom ?',
                'attr' => [
                    'placeholder' => 'Entrez votre adresse'
                ]
            ])
            ->add('company', TextType::class, [
                'label' => 'votre société ?',
                'required' => false,
                'attr' => [
                    'placeholder' => 'Entrez le nom de votre société (facultatif)'
                ]
            ])
            ->add('address', TextType::class, [
                'label' => 'Votre Adresse ?',
                'attr' => [
                    'placeholder' => 'Entrez votre adresse'
                ]
            ])
            ->add('postal', TextType::class, [
                'label' => 'Votre code postale ?',
                'attr' => [
                    'placeholder' => 'Entrez votre code postale'
                ]
            ])
            ->add('city', TextType::class, [
                'label' => 'Ville ?',
                'attr' => [
                    'placeholder' => 'Entrez votre ville '
                ]
            ])
            ->add('country', CountryType::class, [
                'label' => 'Pays?',
                'attr' => [
                    'placeholder' => 'Entrez votre pays'
                ]
            ])
            ->add('phone', TelType::class, [
                'label' => 'Votre N° de téléphone ?',
                'attr' => [
                    'placeholder' => 'Entrez votre N° de téléphone '
                ]
            ])
            ->add('submit', SubmitType::class, [
                'label' => 'Valider',
                'attr' => [
                    'class' => 'btn-block btn-info'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Address::class,
        ]);
    }
}
