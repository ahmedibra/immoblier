<?php

namespace App\Form;

use App\Entity\Annonce;
use App\Entity\AnnonceConfier;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class AnnonceConfierType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('transaction',ChoiceType::class, [
                'placeholder' => "Transaction",
                'label' =>false,
                'required' => false,
                'choices'  => [
                    'Vente' => 'Achat',
                    'Location' => 'Location',
                    
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
            ->add('budgetMin',TextType::class,[
                'label' =>false,
                'required' => false,
                'attr' => array(
                    'placeholder' => 'Budget minimal'),

            ])
            ->add('budgetMax',TextType::class,[
                'required' => false,
                'attr' => array(
                    'placeholder' => 'Budjet Maximal'),
                    'label' =>false,
            ])
            ->add('surfaceMin',TextType::class,[
                'required' => false,
                'attr' => array(
                    'placeholder' => 'Surface minimal'),
                'label' =>false,
            ])
            ->add('etat',ChoiceType::class, [
                'label' =>false,
                'placeholder' => "Etat",
                'choices'  => [
                    'Nouveau' => 'Nouveau',
                    'Bon etat' => 'Bon etat',
                    'à renover' => 'a renover',
                    
                ],
            ])
            ->add('surfaceMax',TextType::class,[
                'required' => false,
                'attr' => array(
                    'placeholder' => 'Surface maximal'),
                
                'label' =>false,
            ])
            ->add('typedebien',ChoiceType::class, [
                'placeholder' => "Type de bien",
               
                'label' =>false,
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
            
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => AnnonceConfier::class,
        ]);
    }
}
