<?php

namespace App\Form;

use App\Entity\Event;
use App\Entity\Player;
use App\Entity\Raid;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RaidType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'Nom du raid',
                ])
            ->add('slug', TextType::class, [
                'label' => 'nom-du-raid-sluggifié',
                ])
            ->add('events',
            EntityType::class, [
                'class' => Event::class,
                'choice_label' => 'name',
                'multiple' => true,
                'expanded' => true,
                'required' => false,])
            // ->add('player',
            // EntityType::class, [
            //     'class' => Player::class,
            //     'choice_label' => 'name',
            //     'multiple' => true,
            //     'expanded' => true,
            //     'required' => false,])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Raid::class,
        ]);
    }
}
