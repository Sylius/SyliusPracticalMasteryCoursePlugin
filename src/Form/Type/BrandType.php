<?php

declare(strict_types=1);

namespace SyliusAcademy\WorkshopPlugin\Form\Type;

use Sylius\Bundle\ChannelBundle\Form\Type\ChannelChoiceType;
use Sylius\Bundle\ResourceBundle\Form\Type\AbstractResourceType;
use Sylius\Bundle\ResourceBundle\Form\Type\ResourceTranslationsType;
use SyliusAcademy\WorkshopPlugin\Entity\Brand\BrandInterface;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

final class BrandType extends AbstractResourceType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'sylius_academy_workshop_plugin.form.brand.name',
            ])
            ->add('code', TextType::class, [
                'label' => 'sylius_academy_workshop_plugin.form.brand.code',
            ])
            ->add('type', ChoiceType::class, [
                'label' => 'sylius_academy_workshop_plugin.form.brand.type',
                'choices' => [
                    'sylius_academy_workshop_plugin.form.brand.type_electronics' => BrandInterface::TYPE_ELECTRONICS,
                    'sylius_academy_workshop_plugin.form.brand.type_automotive' => BrandInterface::TYPE_AUTOMOTIVE,
                ],
            ])
            ->add('enabled', CheckboxType::class, [
                'label' => 'sylius_academy_workshop_plugin.form.brand.enabled',
            ])
            ->add('translations', ResourceTranslationsType::class, [
                'entry_type' => BrandTranslationType::class,
            ])
            ->add('channels', ChannelChoiceType::class, [
                'multiple' => true,
                'expanded' => true,
                'label' => 'sylius.ui.channels',
            ])
        ;
    }
}
