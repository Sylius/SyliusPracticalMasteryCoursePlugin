<?php

declare(strict_types=1);

namespace SyliusAcademy\WorkshopPlugin\Repository;

use Doctrine\ORM\QueryBuilder;
use Sylius\Bundle\ResourceBundle\Doctrine\ORM\EntityRepository;
use Sylius\Component\Core\Model\ChannelInterface;
use SyliusAcademy\WorkshopPlugin\Entity\Brand\BrandInterface;

class BrandRepository extends EntityRepository implements BrandRepositoryInterface
{
    public function findEnabledByChannel(ChannelInterface $channel): array
    {
        return $this->createEnabledQueryBuilder()
            ->andWhere(':channel MEMBER OF o.channels')
            ->setParameter('channel', $channel)
            ->getQuery()
            ->getResult()
        ;
    }

    public function createEnabledQueryBuilder(): QueryBuilder
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.enabled = true')
        ;
    }

    public function getEnabled(): array
    {
        return $this->createEnabledQueryBuilder()
            ->getQuery()
            ->getResult()
        ;
    }

    public function findOneByCode(string $code): ?BrandInterface
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.code = :code')
            ->setParameter('code', $code)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
}
