<?php

declare(strict_types=1);

namespace SyliusAcademy\WorkshopPlugin\Entity\Brand;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Sylius\Component\Channel\Model\ChannelInterface;
use Sylius\Resource\Model\TimestampableTrait;
use Sylius\Resource\Model\ToggleableTrait;
use Sylius\Resource\Model\TranslatableTrait;
use SyliusAcademy\WorkshopPlugin\Entity\Product\ProductInterface;

class Brand implements BrandInterface
{
    use ToggleableTrait, TimestampableTrait;

    use TranslatableTrait {
        __construct as private initializeTranslationsCollection;
        getTranslation as private doGetTranslation;
    }

    protected ?int $id = null;

    protected ?string $name = null;

    protected ?string $code = null;

    protected Collection $products;

    protected ?string $type = null;

    protected $enabled = true;

    protected $createdAt;

    protected $updatedAt;

    protected ?string $state = BrandInterface::STATE_NEW;

    protected Collection $channels;

    public function __construct()
    {
        $this->products = new ArrayCollection();
        $this->channels = new ArrayCollection();
        $this->initializeTranslationsCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(?string $code): void
    {
        $this->code = $code;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    public function getProducts(): Collection
    {
        return $this->products;
    }

    public function addProduct(ProductInterface $product): void
    {
        if (!$this->products->contains($product)) {
            $this->products->add($product);
            $product->setBrand($this);
        }
    }

    public function removeProduct(ProductInterface $product): void
    {
        if ($this->products->contains($product)) {
            $this->products->removeElement($product);
            $product->setBrand(null);
        }
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(?string $type): void
    {
        $this->type = $type;
    }

    public function setDescription(string $description): void
    {
        $this->getTranslation()->setDescription($description);
    }

    public function getDescription(): ?string
    {
        return $this->getTranslation()->getDescription();
    }

    public function getTranslation(?string $locale = null): BrandTranslationInterface
    {
        /** @var BrandTranslation $translation */
        $translation = $this->doGetTranslation($locale);

        return $translation;
    }

    public function getState(): ?string
    {
        return $this->state;
    }

    public function setState(?string $state): void
    {
        $this->state = $state;
    }

    protected function createTranslation(): BrandTranslationInterface
    {
        return new BrandTranslation();
    }

    public function getChannels(): Collection
    {
        return $this->channels;
    }

    public function hasChannel(ChannelInterface $channel): bool
    {
        return $this->channels->contains($channel);
    }

    public function addChannel(ChannelInterface $channel): void
    {
        if (!$this->hasChannel($channel)) {
            $this->channels->add($channel);
        }
    }

    public function removeChannel(ChannelInterface $channel): void
    {
        if ($this->hasChannel($channel)) {
            $this->channels->removeElement($channel);
        }
    }
}
