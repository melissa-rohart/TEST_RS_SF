<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class AddSiteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('label', TextType::class, array('label' => false, 'attr' => array('placeholder' => 'label')))
        ->add('url', TextType::class, array('label' => false, 'attr' => array('placeholder' => 'url')))
        ->add('status', TextType::class, array('label' => false, 'attr' => array('placeholder' => 'status')));
    }
}