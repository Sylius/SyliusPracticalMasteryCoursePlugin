<?php

declare(strict_types=1);

namespace SyliusAcademy\WorkshopPlugin\Validator\Constraints;

use SyliusAcademy\WorkshopPlugin\Validator\BrandHasCorrectTypeValidator;
use Symfony\Component\Validator\Constraint;

final class BrandHasCorrectType extends Constraint
{
    public string $message = 'sylius_academy_workshop_plugin.brand.type.invalid';

    public function validatedBy(): string
    {
        return BrandHasCorrectTypeValidator::class;
    }

    public function getTargets(): string
    {
        return self::CLASS_CONSTRAINT;
    }
}
