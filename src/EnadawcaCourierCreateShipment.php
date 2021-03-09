<?php

declare(strict_types=1);

namespace Sylapi\Courier\Enadawca;

use adresType;
use Exception;
use addShipment;
use przesylkaBiznesowaType;
use Sylapi\Courier\Entities\Response;
use Sylapi\Courier\Contracts\Shipment;
use Sylapi\Courier\Helpers\ResponseHelper;
use Sylapi\Courier\Contracts\CourierCreateShipment;
use Sylapi\Courier\Contracts\Response as ResponseContract;



class EnadawcaCourierCreateShipment implements CourierCreateShipment
{
    private $session;

    public function __construct(EnadawcaSession $session)
    {
        $this->session = $session;
    }

    public function createShipment(Shipment $shipment): ResponseContract
    {
        $client = $this->session->client();
        $response = new Response();
        try {
            $result = $client->call('clearEnvelope', []);
            $result = $client->call('addShipment', $this->getShipment($shipment));
            $response->shipmentId = $result->retval->guid ?? null;
            $response->referenceId = $result->retval->guid ?? null;
            $response->trackingId = $result->retval->numerNadania ?? null;
        } catch ( Exception $e) {
            ResponseHelper::pushErrorsToResponse($response, [$e]);
        }
        return $response;
    }

    private function getShipment(Shipment $shipment): addShipment
    {
        $shipmentEN = new addShipment();
        $shipmentEN->przesylki[] = $this->getBusinessShipment($shipment);
        return $shipmentEN;
    }

    private function getBusinessShipment(Shipment $shipment): przesylkaBiznesowaType
    {
        $package = new przesylkaBiznesowaType();
        $package->adres = $this->getAddress($shipment);
        $package->gabaryt = $this->session->parameters()->packageSize;
        $package->masa = ($shipment->getParcel()->getWeight() * 1000);
        $package->opis = $shipment->getContent();
        $package->ostroznie = false;
        $package->guid = $this->getGuid();

        return $package; 
    }

    private function getAddress(Shipment $shipment): adresType
    {
        $address = new adresType();
        $address->nazwa = $shipment->getReceiver()->getFullName();
        $address->nazwa2 = '';
        $address->ulica = $shipment->getReceiver()->getStreet();
        $address->numerDomu = $shipment->getReceiver()->getHouseNumber();
        $address->numerLokalu = $shipment->getReceiver()->getApartmentNumber();
        $address->miejscowosc = $shipment->getReceiver()->getCity();
        $address->kodPocztowy = $shipment->getReceiver()->getZipCode();
        $address->kraj = $shipment->getReceiver()->getCountryCode();
        $address->telefon = '';
        $address->email = $shipment->getReceiver()->getEmail();
        $address->mobile = $shipment->getReceiver()->getPhone();
        $address->osobaKontaktowa = $shipment->getReceiver()->getContactPerson();
        $address->nip = '';
        return $address;
    }

    private function getGuid(): string
    {
        $result = $this->session->client()->call('getGuid', [
            'ilosc' => 1
        ]);

        return (string) $result->guid;
    }

}
