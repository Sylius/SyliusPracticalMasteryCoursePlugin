<?php

declare(strict_types=1);

namespace SyliusAcademy\WorkshopPlugin\Grid\Field;

use Sylius\Component\Grid\Definition\Field;
use Sylius\Component\Grid\FieldTypes\FieldTypeInterface;
use SyliusAcademy\WorkshopPlugin\Entity\Brand\BrandInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

final class AssociatedProductsType implements FieldTypeInterface
{
    public function render(Field $field, $data, array $options): string
    {
        if (!$data instanceof BrandInterface) {
            return '';
        }

        return (string) $data->getProducts()->count();
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        // TODO: Implement configureOptions() method.
    }
}
