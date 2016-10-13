<?php

namespace AppBundle\Form;

use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class StockType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('amount', IntegerType::class,
                [
                    'attr' =>
                        [
                            'class' => 'form-control',
                            'placeholder' => 'Quantitée'
                        ]
                ])
            ->add('room', EntityType::class,
                [
                    'label' => 'Room',
                    'class' => 'AppBundle\Entity\Room',
                    'choice_label' => 'name',
                    'attr' =>
                        [
                            'class' => 'form-control'
                        ]
                ])
            ->add('product', EntityType::class,
                [
                    'label' => 'Produit',
                    'class' => 'AppBundle\Entity\Product',
                    'choice_label' => 'designation',
                    'attr' =>
                        [
                            'class' => 'form-control'
                        ]
                ])
        ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Stock'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_stock';
    }


}
