<?php

declare(strict_types=1);

namespace SyliusAcademy\WorkshopPlugin\Form\Extension;

use Sylius\Bundle\ProductBundle\Form\Type\ProductType;
use SyliusAcademy\WorkshopPlugin\Entity\Brand\Brand;
use SyliusAcademy\WorkshopPlugin\Repository\BrandRepositoryInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractTypeExtension;
use Symfony\Component\Form\FormBuilderInterface;

final class ProductTypeExtension extends AbstractTypeExtension
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder->add('brand', EntityType::class, [
            'class' => Brand::class,
            'choice_label' => 'name',
            'label' => 'sylius_academy_workshop_plugin.form.product.brand',
            'placeholder' => 'sylius_academy_workshop_plugin.form.product.select_brand',
            'query_builder' => fn (BrandRepositoryInterface $repository) => $repository->createEnabledQueryBuilder(),
        ]);
    }

    public static function getExtendedTypes(): iterable
    {
        return [
            ProductType::class,
        ];
    }
}
