<?php

namespace App\Form;

use App\Entity\Annonce;
use App\Entity\AnnonceConfier;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class ConfierType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('transaction',ChoiceType::class, [
            'placeholder' => "Transaction",
            'label' =>"Transaction",
            'required' => false,
            'choices'  => [
                'Vente' => 'Achat',
                'Location' => 'Location',
                
            ],
        ])
        ->add('ville', EntityType::class, [
            'placeholder' => "Ville",
            'label' =>"Ville",
            'required' => false,
            'class' => Annonce::class,
            'query_builder' => function (EntityRepository $er) {
                return $er->createQueryBuilder('u')
                    ->orderBy('u.ville', 'ASC');
            },
            'choice_label' => 'ville',
            'choice_value' => 'ville'
        ])
        ->add('typedebien',ChoiceType::class, [
            'placeholder' => "Type de bien",
           
            'label' =>"Type de bien",
            'choices'  => [
                'Local commercial' => 'Local commercial',
                'Fonds de commerce' => 'Fonds de commerce',
                'Bureau ' => 'Bureau ',
                'Terrain' => 'Terrain',
                'Ferme' => 'Ferme',
                "Batiment d'activité" => "Batiment d'activité",
                'Batiment industriel' => 'Batiment industriel',
                'Entrepôt' => 'Entrepôt'
                
            ],
        ])
        ->add('etat',ChoiceType::class, [
            'label' =>'Etat',
            'placeholder' => "Etat",
            'choices'  => [
                'Nouveau' => 'Nouveau',
                'Bon etat' => 'Bon etat',
                'à renover' => 'a renover',
                
            ],
        ])
        ->add('budgetMin',NumberType::class,[
            'label' => 'Budget minimal',
            'required' => false,
            'attr' => array(
                'placeholder' => 'Budget minimal'),

        ])
        ->add('budgetMax',NumberType::class,[
            'required' => false,
            'attr' => array(
                'placeholder' => 'Budjet Maximal'),
                'label' =>'Budjet Maximal',
        ])
        ->add('surfaceMin',NumberType::class,[
            'required' => false,
            'attr' => array(
                'placeholder' => 'Surface minimal'),
            'label' =>'Surface minimal',
        ])
       
        ->add('surfaceMax',NumberType::class,[
            'required' => false,
            'attr' => array(
                'placeholder' => 'Surface maximal'),
            
            'label' =>'Surface maximal',
        ])
        ->add('telephone',TelType::class,[
            'required'=> true,
            'label' => "Télephone"

        ])
        
    ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => AnnonceConfier::class,
        ]);
    }
}
