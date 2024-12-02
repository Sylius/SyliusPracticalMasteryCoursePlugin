<?php

declare(strict_types=1);

namespace SyliusAcademy\WorkshopPlugin\Entity\Product;

use Sylius\Component\Core\Model\ProductInterface as BaseProductInterface;
use SyliusAcademy\WorkshopPlugin\Entity\Brand\BrandInterface;

interface ProductInterface extends BaseProductInterface
{
    public function getBrand(): ?BrandInterface;

    public function setBrand(?BrandInterface $brand): void;
}
