<?php

declare(strict_types=1);

namespace SyliusAcademy\WorkshopPlugin\StateMachine;

interface BrandTransitions
{
    public const GRAPH = 'sylius_brand';

    public const TRANSITION_APPROVE = 'approve';

    public const TRANSITION_REJECT = 'reject';

    public const TRANSITION_SUSPEND = 'suspend';
}
