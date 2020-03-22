<?php

namespace App\Form;

use App\Entity\Planning;
use App\Entity\Formation;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;

class PlanningType extends AbstractType
{
    /**
     * Création d'un formalaire pour les activités
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('activity',TextType::class,[
                'attr'=>[
                    'placeholder'=>'activité'
                ]
            ])
            ->add('date_debut',DateType::class,[
                'html5' => true,
                'widget' => 'single_text',
                
            ])
            ->add('date_fin',DateType::class,[
                'html5' => true,
                'widget' => 'single_text',
                
            ])
            ->add('professeur',TextType::class,[
                'attr'=>[
                    'placeholder'=>'professeur'
                ]
            ])
            ->add('duree',TextType::class,[
                'attr'=>[
                    'placeholder'=>'durée'
                ]
            ])
            ->add('formation')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Planning::class,
        ]);
    }
}
