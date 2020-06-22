<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\FormBuilderInterface;

class RegisterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('username', TextType::class, array('label' => false, 'attr' => array('placeholder' => 'adresse e-mail')))
        ->add('firstname', TextType::class, array('label' => false, 'attr' => array('placeholder' => 'prénom')))
        ->add('lastname', TextType::class, array('label' => false, 'attr' => array('placeholder' => 'nom')))
        ->add('password', RepeatedType::class, array(
            'type' => PasswordType::class,
            'required' => true,
            'first_options' => array('label' => false, 'attr' => array('placeholder' => 'mot de passe')),
            'second_options' => array('label' => false, 'attr' => array('placeholder' => 'confirmation mot de passe'))
        ))
        ;
    }
}