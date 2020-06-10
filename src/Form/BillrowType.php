<?php

namespace App\Form;

use App\Entity\Billrow;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class BillrowType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('description')
            ->add('quantity')
            ->add('amount')
            ->add('vat')
            ->add('total')
            //->add('idbill', TextareaType::class, ['attr'=>array('readonly' => true)])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Billrow::class,
        ]);
    }
}
