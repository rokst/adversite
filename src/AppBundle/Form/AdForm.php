<?php

namespace AppBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class AdForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Title', TextType::class, array(
                'label'  => false,
                'attr' => [
                    'placeholder' => 'Title',
                    'class' => 'form-control',
                ],
            ))
            ->add('Description', TextareaType::class, array(
                'label'  => false,
                'attr' => [
                    'placeholder' => 'Description',
                    'class' => 'form-control',
                ],
            ))
            ->add('Category', EntityType::class, array(
                'class' => 'AppBundle\Entity\Category',
                'choice_label' => 'name',
                'label'  => false,
                'attr' => [
                    'class' => 'form-control',
                ]
                ))
            ->add('Price', NumberType::class, array(
                'label'  => false,
                'attr' => [
                    'placeholder' => 'Price',
                    'class' => 'form-control',
                ],
            ));
    }
}