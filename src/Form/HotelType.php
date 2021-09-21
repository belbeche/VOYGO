<?php

namespace App\Form;

use App\Entity\Hotel;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class HotelType extends AbstractType
{
    /**
     * BuildForm
     *
     * @param FormBuilderInterface $builder
     * @param array $options
     *
     * @return null
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(
                'titre',
                TextType::class,
                [
                    'label'    => 'Name',
                    'required' => false,
                    'attr' => [
                        'placeholder' => 'Titre',
                    ],
                ]
            )
            ->add(
                'lieu',
                TextType::class,
                [
                    'label'    => 'Lieu',
                    'required' => false,
                    'attr' => [
                        'placeholder' => 'Lieu ...',
                    ],
                ]
            )
            ->add('chambres');

    }

    /**
     * configureOptions
     *
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(
            [
                'data_class' => Hotel::class
            ]
        );
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName(): string
    {
        return 'admin_hotel_new';
    }
}