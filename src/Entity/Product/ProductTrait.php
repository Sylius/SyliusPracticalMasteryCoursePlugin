<?php

declare(strict_types=1);

namespace SyliusAcademy\WorkshopPlugin\Entity\Product;

use Doctrine\ORM\Mapping as ORM;
use SyliusAcademy\WorkshopPlugin\Entity\Brand\BrandInterface;

trait ProductTrait
{
    /**
     * @ORM\ManyToOne(targetEntity="SyliusAcademy\WorkshopPlugin\Entity\Brand\BrandInterface", inversedBy="products")
     * @ORM\JoinColumn(name="brand_id", referencedColumnName="id", onDelete="SET NULL")
     */
    #[ORM\ManyToOne(targetEntity: BrandInterface::class, inversedBy: 'products')]
    #[ORM\JoinColumn(name: 'brand_id', referencedColumnName: 'id', onDelete: 'SET NULL')]
    private ?BrandInterface $brand = null;

    public function getBrand(): ?BrandInterface
    {
        return $this->brand;
    }

    public function setBrand(?BrandInterface $brand): void
    {
        $this->brand = $brand;
    }
}
