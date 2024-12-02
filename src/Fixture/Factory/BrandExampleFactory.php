<?php

declare(strict_types=1);

namespace SyliusAcademy\WorkshopPlugin\Fixture\Factory;

use Faker\Factory;
use Faker\Generator;
use Sylius\Bundle\CoreBundle\Fixture\Factory\AbstractExampleFactory;
use Sylius\Bundle\CoreBundle\Fixture\Factory\ExampleFactoryInterface;
use Sylius\Component\Core\Formatter\StringInflector;
use SyliusAcademy\WorkshopPlugin\Entity\Brand\BrandInterface;
use SyliusAcademy\WorkshopPlugin\Factory\BrandFactoryInterface;
use Symfony\Component\OptionsResolver\Options;
use Symfony\Component\OptionsResolver\OptionsResolver;

final class BrandExampleFactory extends AbstractExampleFactory implements ExampleFactoryInterface
{
    private Generator $faker;

    private OptionsResolver $optionsResolver;

    public function __construct(
        private BrandFactoryInterface $brandFactory,
    ) {
        $this->faker = Factory::create();
        $this->optionsResolver = new OptionsResolver();

        $this->configureOptions($this->optionsResolver);
    }

    public function create(array $options = []): BrandInterface
    {
        $options = $this->optionsResolver->resolve($options);

        $brand = $this->brandFactory->createNew();
        $brand->setName($options['name']);
        $brand->setCode($options['code']);
        $brand->setType($options['type']);

        return $brand;
    }

    protected function configureOptions(OptionsResolver $resolver): void
    {
        $resolver
            ->setDefault('name', fn (Options $options): string => $this->faker->word)
            ->setDefault('code', fn (Options $options): string => StringInflector::nameToCode($options['name']))
            ->setDefault('type', fn (Options $options): string => rand(0, 1) === 1 ? BrandInterface::TYPE_AUTOMOTIVE : BrandInterface::TYPE_ELECTRONICS)
        ;
    }
}
