<?php

declare(strict_types=1);

namespace SyliusAcademy\WorkshopPlugin\Payum\Model;

final class WorkshopApi
{
    public function __construct(
        private string $shopId,
        private string $apiKey,
        private bool $sandbox
    ) {
    }

    public function getShopId(): string
    {
        return $this->shopId;
    }

    public function getApiKey(): string
    {
        return $this->apiKey;
    }

    public function isSandbox(): bool
    {
        return $this->sandbox;
    }
}
