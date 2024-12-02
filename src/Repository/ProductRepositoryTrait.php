<?php

declare(strict_types=1);

namespace SyliusAcademy\WorkshopPlugin\Repository;

use SyliusAcademy\WorkshopPlugin\Entity\Brand\BrandInterface;

trait ProductRepositoryTrait
{
    public function findBrandedProducts(BrandInterface $brand): array
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.brand = :brand')
            ->setParameter('brand', $brand)
            ->getQuery()
            ->getResult()
        ;
    }
}
