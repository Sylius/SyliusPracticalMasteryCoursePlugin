<?php

declare(strict_types=1);

namespace SyliusAcademy\WorkshopPlugin\Payum\Action;

use Payum\Core\Action\ActionInterface;
use Payum\Core\Exception\RequestNotSupportedException;
use Payum\Core\Request\GetStatusInterface;
use Sylius\Component\Core\Model\PaymentInterface;

final class StatusAction implements ActionInterface
{
    public const STATUS_CAPTURED = 'CAPTURED';

    public const STATUS_CREATED = 'CREATED';

    public const STATUS_COMPLETED = 'COMPLETED';

    public const STATUS_PROCESSING = 'PROCESSING';

    public function execute($request): void
    {
        RequestNotSupportedException::assertSupports($this, $request);
        $paywallStatus = $_GET['status'] ?? null;
        if ($paywallStatus === 'success') {
            $request->markCaptured();

            return;
        }
        if ($paywallStatus === 'fail') {
            $request->markFailed();

            return;
        }

        /** @var array $model */
        $model = $request->getModel();

        if ($model['status'] === self::STATUS_CREATED) {
            $request->markNew();

            return;
        }

        if ($model['status'] === self::STATUS_CAPTURED) {
            $request->markPending();

            return;
        }

        if ($model['status'] === self::STATUS_COMPLETED) {
            $request->markCaptured();

            return;
        }

        $request->markFailed();
    }

    public function supports($request): bool
    {
        return
            $request instanceof GetStatusInterface &&
            $request->getFirstModel() instanceof PaymentInterface
        ;
    }
}
