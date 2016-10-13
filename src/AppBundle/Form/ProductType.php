<?php

namespace AppBundle\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProductType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('reference',TextType::class,
                [
                    'attr' =>
                        [
                            'class' => 'form-control'
                        ]
                ])
            ->add('designation',TextareaType::class,
                [
                    'attr' =>
                        [
                            'class' => 'form-control'
                        ]
                ])
            ->add('descriptive',TextType::class,
                [
                    'attr' =>
                        [
                            'class' => 'form-control'
                        ]
                ])
            ->add('price',TextType::class,
                [
                    'attr' =>
                        [
                            'class' => 'form-control'
                        ]
                ])
            ->add('tva',TextType::class,
                [
                    'attr' =>
                        [
                            'class' => 'form-control'
                        ]
                ])
            ->add('dlc',TextType::class,
                [
                    'attr' =>
                        [
                            'class' => 'form-control'
                        ]
                ])
            ->add('picture', FileType::class)
        ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Product'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_product';
    }


}
