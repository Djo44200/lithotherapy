<?php

namespace App\Form;

use App\Entity\Mineral;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MineralType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('description')
            ->add('propriety')
            ->add('photo')
            ->add('hardnesses')
            ->add('colors')
            ->add('reloads')
            ->add('purifications')
            ->add('chakras')
            ->add('users')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Mineral::class,
        ]);
    }
}
