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

class AnnonceCoworkingType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('titre',TextType::class,[
            'label' => "Titre",
            'required'=>true
        ])
        ->add('prix',TextType::class,[
            'label' => "Prix",'required'=>true
        ])
            ->add('nombredeposte',TextType::class,[
                'label' => "Nombre de poste",'required'=>true
            ])
            ->add('adresse',TextType::class,[
                'label' => "Adresse",'required'=>true
            ])
            ->add('ville',TextType::class, [
                'label' => "Ville",'required'=>true
                ])
            ->add('surface',TextType::class,[
                    'label' => "Surface",'required'=>true
                ])
            ->add('gouvernorat',ChoiceType::class, [
                'required'=>true,
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
                'required'=>true,
                'label' => "Déscription(Secrétariat, Bureautique: photocopieur – scanner – imprimante-rétroprojecteur, Réseau, Ménage, Cuisine, Accés handicapés)"
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
