<?php

declare(strict_types=1);

namespace SyliusAcademy\WorkshopPlugin\Payum\Action;

use Payum\Core\Action\ActionInterface;
use Payum\Core\ApiAwareInterface;
use Payum\Core\ApiAwareTrait;
use Payum\Core\Exception\RequestNotSupportedException;
use Payum\Core\Model\PaymentInterface;
use Payum\Core\Reply\HttpPostRedirect;
use Payum\Core\Request\Capture;
use Sylius\Bundle\PayumBundle\Model\PaymentSecurityTokenInterface;
use SyliusAcademy\WorkshopPlugin\Payum\Model\WorkshopApi;

final class CaptureAction implements ActionInterface, ApiAwareInterface
{
    use ApiAwareTrait;

    public function __construct()
    {
        $this->apiClass = WorkshopApi::class;
    }

    public function execute($request): void
    {
        RequestNotSupportedException::assertSupports($this, $request);

        /** @var PaymentInterface $payment */
        $payment = $request->getFirstModel();

        /** @var PaymentSecurityTokenInterface $token */
        $token = $request->getToken();

        /** @var WorkshopApi $model */
        $model = $request->getModel();
        $model['status'] = StatusAction::STATUS_CREATED;

        $request->setModel($model);

        throw new HttpPostRedirect(
            'https://kkftxnfks1.execute-api.eu-central-1.amazonaws.com/default/Workshop_Paywall', [
                'afterUrl' => $token->getAfterUrl(),
                'token' => $token->getHash(),
            ]
        );
    }

    public function supports($request): bool
    {
        return
            $request instanceof Capture &&
            $request->getModel() instanceof \ArrayObject
        ;
    }
}
