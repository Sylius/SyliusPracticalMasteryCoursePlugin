<?php

declare(strict_types=1);

namespace SyliusAcademy\WorkshopPlugin\Validator;

use SyliusAcademy\WorkshopPlugin\Entity\Brand\BrandInterface;
use SyliusAcademy\WorkshopPlugin\Validator\Constraints\BrandHasCorrectType;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

final class BrandHasCorrectTypeValidator extends ConstraintValidator
{
    private const AUTOMOTIVE_BRANDS = [
        'Yamaha',
        'Honda',
        'Suzuki',
        'Kawasaki',
        'Ducati',
        'BMW',
        'Harley-Davidson',
        'Triumph',
        'KTM',
        'Aprilia',
    ];

    public function validate(mixed $value, Constraint $constraint): void
    {
        $brand = $value;
        if (!$brand instanceof BrandInterface || !$constraint instanceof BrandHasCorrectType) {
            return;
        }

        if ($brand->getType() !== BrandInterface::TYPE_AUTOMOTIVE) {
            return;
        }

        if (!in_array($brand->getName(), self::AUTOMOTIVE_BRANDS, true)) {
            $this->context
                ->buildViolation($constraint->message)
                ->atPath('type')
                ->addViolation()
            ;
        }
    }
}
