<?php

namespace App\Form;

use App\Entity\Spectacles;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SpectaclesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Nom')
            ->add('Description')
            ->add('Dates')
            ->add('Image')
            ->add('Places')
            ->add('Prix')
            ->add('Reservation')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Spectacles::class,
        ]);
    }
}
