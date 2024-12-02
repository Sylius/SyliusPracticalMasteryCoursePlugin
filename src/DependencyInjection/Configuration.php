<?php

declare(strict_types=1);

namespace SyliusAcademy\WorkshopPlugin\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

final class Configuration implements ConfigurationInterface
{
    /**
     * @psalm-suppress UnusedVariable
     */
    public function getConfigTreeBuilder(): TreeBuilder
    {
        $treeBuilder = new TreeBuilder('sylius_academy_workshop');
        $rootNode = $treeBuilder->getRootNode();

        return $treeBuilder;
    }
}
