<?php

declare(strict_types=1);

namespace SyliusAcademy\WorkshopPlugin\Repository;

use SyliusAcademy\WorkshopPlugin\Entity\Brand\BrandInterface;

interface ProductRepositoryInterface
{
    public function findBrandedProducts(BrandInterface $brand): array;
}
