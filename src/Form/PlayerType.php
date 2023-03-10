<?php

namespace App\Form;

use App\Entity\Event;
use App\Entity\Item;
use App\Entity\Player;
use App\Entity\Role;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PlayerType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'Nom du joueur',
                ])
            ->add('class', ChoiceType::class, [
                'choices' => [
                    'Chaman' => 'Chaman',
                    'Chasseur' => 'Chasseur',
                    'Chevalier de la mort' => 'Chevalier de la mort',
                    'Démoniste' => 'Démoniste',
                    'Druide' => 'Druide',
                    'Guerrier' => 'Guerrier',
                    'Mage' => 'Mage',
                    'Paladin' => 'Paladin',
                    'Prêtre' => 'Prêtre',
                    'Voleur' => 'Voleur',
                ],
            ])
            ->add('score', 'number')
            ->add('rank', ChoiceType::class, [
                'choices' => [
                    'Demi' => 'Demi',
                    'Galopin' => 'Galopin',
                    'Sérieux' => 'Sérieux',
                ],
            ])
            ->add('isActif', ChoiceType::class, [
                'choices'  => [
                    'Active' => 1,
                    'Inactif' => 0],
                    'expanded' => true,
                'multiple' => false,
                ])
            ->add('slug', TextType::class, [
                'label' => 'nom-de-l-item-sluggifié',
                ])
            ->add('items',
            EntityType::class, [
                'class' => Item::class,
                'choice_label' => 'name',
                'multiple' => true,
                'expanded' => true,
                'required' => false,]
            )
            ->add('events',
            EntityType::class, [
                'class' => Event::class,
                'choice_label' => 'name',
                'multiple' => true,
                'expanded' => true,
                'required' => false,]
            )
            ->add('role',
            EntityType::class, [
                'class' => Role::class,
                'choice_label' => 'name',
                'multiple' => false,
                'expanded' => true,
                'required' => true,]
            )
            // ->add('raids',
            // EntityType::class, [
            //     'class' => Role::class,
            //     'choice_label' => 'name',
            //     'multiple' => true,
            //     'expanded' => true,
            //     'required' => false,]
            // )
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Player::class,
        ]);
    }
}
