<?php

declare(strict_types=1);

namespace SyliusAcademy\WorkshopPlugin\Entity\Brand;

use Doctrine\Common\Collections\Collection;
use Sylius\Component\Channel\Model\ChannelsAwareInterface;
use Sylius\Resource\Model\CodeAwareInterface;
use Sylius\Resource\Model\ResourceInterface;
use Sylius\Resource\Model\TimestampableInterface;
use Sylius\Resource\Model\ToggleableInterface;
use Sylius\Resource\Model\TranslatableInterface;
use SyliusAcademy\WorkshopPlugin\Entity\Product\ProductInterface;

interface BrandInterface extends ResourceInterface, CodeAwareInterface, ToggleableInterface, TimestampableInterface, TranslatableInterface, ChannelsAwareInterface
{
    public const TYPE_ELECTRONICS = 'electronics';

    public const TYPE_AUTOMOTIVE = 'automotive';

    public const STATE_NEW = 'new';

    public const STATE_APPROVED = 'approved';

    public const STATE_REJECTED = 'rejected';

    public const STATE_SUSPENDED = 'suspended';

    public function getName(): ?string;

    public function setName(?string $name): void;

    public function getProducts(): Collection;

    public function addProduct(ProductInterface $product): void;

    public function removeProduct(ProductInterface $product): void;

    public function getType(): ?string;

    public function setType(?string $type): void;

    public function setDescription(string $description): void;

    public function getDescription(): ?string;

    public function getTranslation(?string $locale = null): BrandTranslationInterface;

    public function getState(): ?string;

    public function setState(?string $state): void;
}
