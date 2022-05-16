<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
class RegistrationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('firstName',TextType::class,['label'=> "Votre prénom"])
        ->add('lastName',TextType::class,['label'=> "Votre nom"])
        ->add('email',EmailType::class,['label'=> "Votre email",
        'invalid_message' => '
            Votre mot de passe existe déja.'])
        ->add('password', RepeatedType::class, [
            'type' => PasswordType::class,
            'invalid_message' => '
            les mots de passe doivent être identiques.',
            'options' => ['attr' => ['class' => 'password-field']],
            'required' => true,
            'first_options'  => ['label' => 'mot de passe'],
            'second_options' => ['label' => 'Confirmer mot de passe'],
        ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
