<?php

declare(strict_types=1);

namespace SyliusAcademy\WorkshopPlugin\Fixture;

use Sylius\Bundle\CoreBundle\Fixture\AbstractResourceFixture;
use Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition;

final class BrandFixture extends AbstractResourceFixture
{
    public function getName(): string
    {
        return 'brand';
    }

    protected function configureResourceNode(ArrayNodeDefinition $resourceNode): void
    {
        $resourceNode
            ->children()
            ->scalarNode('name')->cannotBeEmpty()->end()
            ->scalarNode('code')->cannotBeEmpty()->end()
            ->scalarNode('type')->cannotBeEmpty()->end()
        ;
    }
}
