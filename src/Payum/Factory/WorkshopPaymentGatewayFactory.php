<?php

declare(strict_types=1);

namespace SyliusAcademy\WorkshopPlugin\Payum\Factory;

use Payum\Core\Bridge\Spl\ArrayObject;
use Payum\Core\GatewayFactory;
use SyliusAcademy\WorkshopPlugin\Payum\Action\StatusAction;
use SyliusAcademy\WorkshopPlugin\Payum\Model\WorkshopApi;

final class WorkshopPaymentGatewayFactory extends GatewayFactory
{
    protected function populateConfig(ArrayObject $config): void
    {
        $config->defaults([
            'payum.factory_name' => 'workshop_payment',
            'payum.factory_title' => 'Workshop Payment',
            'payum.action.status' => new StatusAction(),
        ]);

        $config['payum.api'] = function (ArrayObject $config) {
            return new WorkshopApi(
                $config['shop_id'],
                $config['api_key'],
                $config['sandbox']
            );
        };
    }
}
