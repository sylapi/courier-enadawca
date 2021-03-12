<?php

declare(strict_types=1);

namespace Sylapi\Courier\Enadawca;

use SoapFault;
use Sylapi\Courier\Contracts\CourierGetStatuses;
use Sylapi\Courier\Contracts\Status as StatusContract;
use Sylapi\Courier\Entities\Status;
use Sylapi\Courier\Enums\StatusType;
use Sylapi\Courier\Exceptions\TransportException;
use Sylapi\Courier\Helpers\ResponseHelper;

class EnadawcaCourierGetStatuses implements CourierGetStatuses
{
    private $session;

    public function __construct(EnadawcaSession $session)
    {
        $this->session = $session;
    }

    public function getStatus(string $shipmentId): StatusContract
    {
        $client = $this->session->clientTracking();

        try {
            $response = $client->__soapCall(
                'sprawdzPrzesylkePl',
                [
                    'sprawdzPrzesylke' => ['numer' => $shipmentId],
                ]
            );

            $statuses = $response->return->danePrzesylki->zdarzenia->zdarzenie ?? [];

            $statusName = end($statuses);

            if (!$statusName || !isset($statusName->kod)) {
                $statusName = StatusType::APP_RESPONSE_ERROR;
                $status = new Status((string) $statusName);
                $e = new TransportException('Error code: '.$response->return->status);
                ResponseHelper::pushErrorsToResponse($status, [$e]);
            } else {
                $status = new Status((string) new EnadawcaStatusTransformer($statusName->kod));
            }
        } catch (SoapFault $fault) {
            $excaption = new TransportException($fault->faultstring);
            $status = new Status(StatusType::APP_RESPONSE_ERROR);
            ResponseHelper::pushErrorsToResponse($status, [$excaption]);
        }

        return $status;
    }
}
