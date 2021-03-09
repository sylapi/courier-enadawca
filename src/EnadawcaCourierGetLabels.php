<?php

declare(strict_types=1);

namespace Sylapi\Courier\Enadawca;

use getPrintForParcel;
use Sylapi\Courier\Contracts\CourierGetLabels;
use Sylapi\Courier\Contracts\Label as LabelContract;
use Sylapi\Courier\Entities\Label;
use Sylapi\Courier\Exceptions\TransportException;
use Sylapi\Courier\Helpers\ResponseHelper;

class EnadawcaCourierGetLabels implements CourierGetLabels
{
    private $session;

    public function __construct(EnadawcaSession $session)
    {
        $this->session = $session;
    }

    public function getLabel(string $shipmentId): LabelContract
    {
        $client = $this->session->client();

        try {
            $parameters = new getPrintForParcel();
            $parameters->guid = $shipmentId;
            $parameters->type = [
                'kind'   => $this->session->parameters()->labelType,
                'method' => $this->session->parameters()->labelMethod,
            ];
            $result = $client->call('getPrintForParcel', $parameters);
            $label = new Label((string) $result->printResult->print);
        } catch (TransportException $e) {
            $label = new Label(null);
            ResponseHelper::pushErrorsToResponse($label, [$e]);
        }

        return $label;
    }
}
