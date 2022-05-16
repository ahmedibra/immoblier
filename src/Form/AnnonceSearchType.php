<?php

namespace App\Form;

use App\Entity\Annonce;
use App\Entity\AnnonceSearch;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Doctrine\ORM\EntityRepository;

class AnnonceSearchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('maxPrice',IntegerType::class,[
                'required' => false,
                'label' =>false,
                'attr' => [
                    'placeholder' =>'Budget max'
                ]
            ])
            ->add('maxSurface',IntegerType::class,[
                'required' => false,
                'label' =>false,
                'attr' => [
                    'placeholder' =>'Surface minimale'
                ]
            ])
            ->add('transaction',ChoiceType::class, [
                'placeholder' => "Transaction",
                'label' =>false,
                'required' => false,
                'choices'  => [
                    'Achat' => 'Achat',
                    'Location' => 'Location',
                    
                ],
            ])
            ->add('typedebien',ChoiceType::class, [
                'placeholder' => "Type de bien",
                'label' =>false,
                'required' => false,
                'choices'  => [
                    'Local commercial' => 'Local commercial',
                    'Fonds de commerce' => 'Fonds de commerce',
                    'Bureau ' => 'Bureau ',
                    'Terrain' => 'Terrain',
                    'Ferme' => 'Ferme',
                    "Batiment d'activité" => "Batiment d'activité",
                    'Batiment industriel' => 'Batiment industriel',
                    'Entrepôt' => 'Entrepôt',
                    
                ],
            ])
            ->add('ville', EntityType::class, [
                'placeholder' => "Ville",
                'label' =>false,
                'required' => false,
                'class' => Annonce::class,
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('u')
                        ->orderBy('u.ville', 'ASC');
                },
                'choice_label' => 'ville',
                'choice_value' => 'ville'
            ])
            ->add('submit', SubmitType::class,[
                'label' =>'rechercher'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => AnnonceSearch::class,
            'method' =>'get',
            'csrf_protection' =>false

        ]);
    }
}
