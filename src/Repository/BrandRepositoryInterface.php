<?php

declare(strict_types=1);

namespace SyliusAcademy\WorkshopPlugin\Repository;

use Doctrine\ORM\QueryBuilder;
use Sylius\Component\Core\Model\ChannelInterface;
use Sylius\Resource\Doctrine\Persistence\RepositoryInterface;
use SyliusAcademy\WorkshopPlugin\Entity\Brand\BrandInterface;

interface BrandRepositoryInterface extends RepositoryInterface
{
    public function findEnabledByChannel(ChannelInterface $channel): array;

    public function createEnabledQueryBuilder(): QueryBuilder;

    public function getEnabled(): array;

    public function findOneByCode(string $code): ?BrandInterface;
}
