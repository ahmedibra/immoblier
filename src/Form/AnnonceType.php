<?php

namespace App\Form;

use App\Entity\Annonce;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class AnnonceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('transaction',ChoiceType::class, [
            'label' => "Transaction",
            'choices'  => [
                'Vente' => 'Achat',
                'Location' => 'Location',
                
            ],
        ])
            ->add('titre',TextType::class,[
                'label' => "Titre"
            ])
            ->add('surface',TextType::class,[
                'label' => "Surface"
            ])
            ->add('prix',TextType::class,[
                'label' => "Prix"
            ])
            ->add('typedebien',ChoiceType::class, [
                'label' => "Type de bien",
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
                'label' => "Etat",
                'choices'  => [
                    'Nouveau' => 'Nouveau',
                    'Bon etat' => 'Bon etat',
                    'à renover' => 'a renover',
                ],
            ])
            ->add('adresse',TextType::class,[
                'label' => "Adresse"
            ])
            ->add('ville',TextType::class, [
                'label' => "Ville"
                ])
            ->add('gouvernorat',ChoiceType::class, [
                'label' => "Gouvernorat",
                'choices'  => [
                    'Ariana' => 'Ariana',
                    'Béja' => 'Béja',
                    'Ben Arous' => 'Ben Arous',
                    'Bizerte' => 'Bizerte',
                    'Gabès' => 'Gabès',
                    'Gafsa' => 'Gafsa',
                    'Jendouba' => 'Jendouba',
                    'Kairouan' => 'Kairouan',
                    'Kasserine' => 'Kasserine',
                    'Kébili' => 'Kébili',
                    'Kef' => 'Kef',
                    'Mahdia' => 'Mahdia',
                    'Manouba' => 'Manouba',
                    'Médenine' => 'Médenine',
                    'Monastir' => 'Monastir',
                    'Nabeul' => 'Nabeul',
                    'Sfax' => 'Sfax',
                    'Sidi Bouzid' => 'Sidi Bouzid',
                    'Siliana' => 'Siliana',
                    'Sousse' => 'Sousse',
                    'Tataouine' => 'Tataouine',
                    'Tozeur' => 'Tozeur',
                    'Tunis' => 'Tunis',
                    'Zaghouan' => 'Zaghouan',
                ],
            ])
            ->add('description',TextareaType::class,[
                'label' => "Déscription (Agencement et equipements, Trafic(auto et pietons), Accessibilité(transport – parking), Infrastructure à proximité, Environnement proche du bien)"
            ])
            ->add('imageFile',FileType::class,[
                'required'=> false,
                'label' => "Image principal"

            ])
            ->add('imageFile1',FileType::class,[
                'required'=> false,
                'label' => "Image 1"

            ])
            ->add('imageFile2',FileType::class,[
                'required'=> false,
                'label' => "Image 2"

            ])
            ->add('imageFile3',FileType::class,[
                'required'=> false,
                'label' => "Image 3"

            ])
            ->add('imageFile4',FileType::class,[
                'required'=> false,
                'label' => "Image 4"

            ])
            ->add('imageFile5',FileType::class,[
                'required'=> false,
                'label' => "Image 5"

            ])
            ->add('imageFile6',FileType::class,[
                'required'=> false,
                'label' => "Image 6"

            ])
            ->add('imageFile7',FileType::class,[
                'required'=> false,
                'label' => "Image 7"

            ])
            ->add('imageFile8',FileType::class,[
                'required'=> false,
                'label' => "Image 8"

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
            'data_class' => Annonce::class,
        ]);
    }
}
