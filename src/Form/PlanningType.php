<?php

namespace App\Form;

use App\Entity\Planning;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class PlanningType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('activity')
            ->add('date_debut')
            ->add('date_fin')
            ->add('professeur')
            ->add('duree')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Planning::class,
            
        ]);
    }
}
