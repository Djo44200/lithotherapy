<?php

namespace App\Form;

use App\Entity\Chakra;
use App\Entity\Color;
use App\Entity\Hardness;
use App\Entity\Mineral;
use App\Entity\Purification;
use App\Entity\Reload;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MineralType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name',TextType::class,[
            'label'=>'Nom',
            ])
            ->add('description', TextareaType::class,[
            'label'=>'Description',
            ])
            ->add('propriety', TextareaType::class,[
                'label'=>'Propriété',
            ])
            ->add('photo')
            ->add('hardnesses',EntityType::class,[
                'class'=>Hardness::class,
                'choice_label'=>'number',
                'label'=>'Dureté',
            ])
            ->add('colors',EntityType::class,[
                'class'=>Color::class,
                'multiple' => true,
                'choice_label'=>'name',
                'label'=>'Couleur',
            ])
            ->add('reloads',EntityType::class,[
                'class'=>Reload::class,
                'multiple' => true,
                'choice_label'=>'name',
                'label'=>'Rechargement',
            ])
            ->add('purifications',EntityType::class,[
                'class'=>Purification::class,
                'multiple' => true,
                'choice_label'=>'name',
                'label'=>'Purification',
            ])
            ->add('chakras',EntityType::class,[
                'class'=>Chakra::class,
                'multiple' => true,
                'choice_label'=>'name',
                'label'=>'Chakra',
            ])
            ->add('submit',SubmitType::class,[
                'label'=> 'Enregistrer',
                'attr' => array('class' => 'btn bouton')])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Mineral::class,
        ]);
    }
}
