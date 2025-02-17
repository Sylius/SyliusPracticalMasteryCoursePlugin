<?php

declare(strict_types=1);

namespace SyliusAcademy\WorkshopPlugin\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

final class WorkshopGatewayConfigurationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('shop_id', TextType::class, [
                'label' => 'sylius.form.gateway_configuration.shop_id',
            ])
            ->add('api_key', TextType::class, [
                'label' => 'sylius.form.gateway_configuration.api_key',
            ])
            ->add('sandbox', CheckboxType::class, [
                'label' => 'sylius.form.gateway_configuration.sandbox',
            ])
        ;
    }
}
