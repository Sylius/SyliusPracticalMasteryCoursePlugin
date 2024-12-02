<?php

declare(strict_types=1);

namespace SyliusAcademy\WorkshopPlugin\Entity\Brand;

use Sylius\Resource\Model\AbstractTranslation;

class BrandTranslation extends AbstractTranslation implements BrandTranslationInterface
{
    protected ?int $id = null;

    protected ?string $description = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): void
    {
        $this->description = $description;
    }
}
