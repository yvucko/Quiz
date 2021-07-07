<?php

namespace App\Form;

use App\Entity\QuizAnswers;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;


class AnswersType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('expectedAnswer', CheckboxType::class, [
                'label' => 'Réponse attendue :',
                'required' => false
            ])
            ->add('quizQuestions');
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => QuizAnswers::class,
        ]);
    }
}
