<?php

declare(strict_types=1);

namespace Tests\SyliusAcademy\WorkshopPlugin\Entity\Product;

use Doctrine\ORM\Mapping as ORM;
use Sylius\Component\Core\Model\Product as BaseProduct;
use SyliusAcademy\WorkshopPlugin\Entity\Product\ProductInterface;
use SyliusAcademy\WorkshopPlugin\Entity\Product\ProductTrait;

#[ORM\Entity]
#[ORM\Table(name: 'sylius_product')]
class Product extends BaseProduct implements ProductInterface
{
    use ProductTrait;
}
