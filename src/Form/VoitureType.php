<?php

namespace App\Form;

use App\Entity\Voiture;
use App\Enum\BoiteVitesseStatus;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EnumType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class VoitureType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nomVoiture', TextType::class)
            ->add('description', TextareaType::class)
            ->add('prixMensuel', NumberType::class)
            ->add('prixJournalier', NumberType::class)
            ->add('nombrePlaces', NumberType::class)
            ->add('status', EnumType::class, ['class' => BoiteVitesseStatus::class])
            ->add('nombreKm', TextType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Voiture::class,
        ]);
    }
}
