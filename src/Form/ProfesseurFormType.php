<?php

namespace App\Form;

use App\Entity\Professeur;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProfesseurFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nomProf',null,[
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('prenomProf',null,[
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('age',null,[
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('sexe',null,[
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('telephone',null,[
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('filiere',null,[
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('matiere',null,[
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Professeur::class,
        ]);
    }
}
