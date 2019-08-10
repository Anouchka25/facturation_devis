<?php

namespace App\Form;

use App\Entity\Facture;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class FactureType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('numfacture', TextType::class, ['required' => true])
            ->add('numtva', TextType::class, ['required' => true])
            ->add('datefacture', DateType::class, ['required' => true])
            ->add('vosinfos', TextareaType::class, ['required' => true])
            ->add('infosclient', TextareaType::class, ['required' => true])
            ->add('conditions', TextareaType::class, ['required' => true])
            ->add('consignes', TextareaType::class, ['required' => false])
            ->add('designation1', TextareaType::class, ['required' => true])
            ->add('quantite1', IntegerType::class, ['required' => true])
            ->add('prixht1', NumberType::class, ['required' => true])
            ->add('taxe1', NumberType::class, ['required' => true])
            ->add('designation2', TextareaType::class, ['required' => false])
            ->add('quantite2', IntegerType::class, ['required' => false])
            ->add('prixht2', NumberType::class, ['required' => false])
            ->add('taxe2', NumberType::class, ['required' => false])
            ->add('designation3', TextareaType::class, ['required' => false])
            ->add('quantite3', IntegerType::class, ['required' => false])
            ->add('prixht3', NumberType::class, ['required' => false])
            ->add('taxe3', NumberType::class, ['required' => false])
          //  ->add('save', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Facture::class,
        ]);
    }
}
