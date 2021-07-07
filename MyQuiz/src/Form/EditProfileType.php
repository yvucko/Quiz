<?php

namespace App\Form;

use App\Entity\Users;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class EditProfileType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email', TextType::class, [
                'label' => false,
                'attr' => [
                    'class' => 'form-control bg-lightblue border-lightblue text-green',
                    'placeholder' => 'Email',
                ],

            ])
            ->add('pseudo', TextType::class, [
                'label' => false,
                'attr' => [
                    'class' => 'form-control bg-lightblue border-lightblue text-green',
                    'placeholder' => 'Pseudo',
                ],

            ])
            ->add('name', TextType::class, [
                'label' => false,
                'attr' => [
                    'class' => 'form-control bg-lightblue border-lightblue text-green',
                    'placeholder' => 'Nom',
                ],

            ])
            ->add('firstname', TextType::class, [
                'label' => false,
                'attr' => [
                    'class' => 'form-control bg-lightblue border-lightblue text-green',
                    'placeholder' => 'Prénom',
                ],

            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Users::class,
        ]);
    }
}
