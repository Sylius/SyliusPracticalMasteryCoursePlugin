<?php

declare(strict_types=1);

namespace Tests\SyliusAcademy\WorkshopPlugin\Repository;

use Sylius\Bundle\CoreBundle\Doctrine\ORM\ProductRepository as BaseProductRepository;
use SyliusAcademy\WorkshopPlugin\Repository\ProductRepositoryInterface;
use SyliusAcademy\WorkshopPlugin\Repository\ProductRepositoryTrait;

final class ProductRepository extends BaseProductRepository implements ProductRepositoryInterface
{
    use ProductRepositoryTrait;
}
