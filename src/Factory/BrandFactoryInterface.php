<?php

declare(strict_types=1);

namespace SyliusAcademy\WorkshopPlugin\Factory;

use Sylius\Resource\Factory\FactoryInterface;
use SyliusAcademy\WorkshopPlugin\Entity\Brand\BrandInterface;

interface BrandFactoryInterface extends FactoryInterface
{
    public function createNew(): BrandInterface;
}
