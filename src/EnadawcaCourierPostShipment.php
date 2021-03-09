<?php

declare(strict_types=1);

namespace Sylapi\Courier\Enadawca;

use sendEnvelope;
use Sylapi\Courier\Contracts\Booking;
use Sylapi\Courier\Contracts\CourierPostShipment;
use Sylapi\Courier\Contracts\Response as ResponseContract;
use Sylapi\Courier\Entities\Response;
use Sylapi\Courier\Exceptions\TransportException;
use Sylapi\Courier\Helpers\ResponseHelper;

class EnadawcaCourierPostShipment implements CourierPostShipment
{
    private $session;

    public function __construct(EnadawcaSession $session)
    {
        $this->session = $session;
    }

    public function postShipment(Booking $booking): ResponseContract
    {
        $response = new Response();

        $client = $this->session->client();

        try {
            $parameters = new sendEnvelope();
            $parameters->urzadNadania = $this->session->parameters()->postOfficeNumber ?? null;
            $result = $client->call('sendEnvelope', $parameters);
            $response->shipmentId = $booking->getShipmentId();
            $response->trackingId = $result->idEnvelope;
        } catch (TransportException $e) {
            ResponseHelper::pushErrorsToResponse($response, [$e]);
        }

        return $response;
    }
}
