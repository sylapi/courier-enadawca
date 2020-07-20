<?php
namespace Sylapi\Courier\Enadawca\Message;

use Sylapi\Courier\Common\Helper;
use Sylapi\Courier\Common\HelperGuid;


/**
 * Class addShipment
 * @package Sylapi\Courier\Enadawca\Message
 */
class addShipment
{
    /**
     * @var
     */
    private $data;
    /**
     * @var
     */
    private $response;

    /**
     * @param $parameters
     * @return $this
     */
    public function prepareData($parameters) {

        include_once(__DIR__.'/_add_shippment.php');

        $shippment = new \addShipment();

        $address = new \adresType();
        $address->nazwa = $parameters['receiver']['name'];
        $address->nazwa2 = '';
        $address->ulica = $parameters['receiver']['street'];
        $address->numerDomu = '';
        $address->numerLokalu = '';
        $address->miejscowosc = $parameters['receiver']['city'];
        $address->kodPocztowy = $parameters['receiver']['postcode'];
        $address->kraj = $parameters['receiver']['country'];
        $address->telefon = '';
        $address->email = $parameters['receiver']['email'];
        $address->mobile = $parameters['receiver']['phone'];
        $address->nip = '';

        $weight = (int)$parameters['options']['weight'];
        $price = (int)$parameters['options']['amount'];

        $shippmentType = new \przesylkaBiznesowaType();
        $shippmentType->urzadWydaniaEPrzesylki = '';
        $shippmentType->subPrzesylka = '';
        $shippmentType->gabaryt = $parameters['options']['custom']['gabaryt'];
        $shippmentType->masa = ($weight * 1000);
        $shippmentType->wartosc = ($price * 100);
        $shippmentType->ostroznie = isset($parameters['options']['custom']['ostroznie']) ? $parameters['options']['custom']['ostroznie'] : 0;
        $shippmentType->opis = $parameters['options']['references'];
        $shippmentType->adres = $address;
        $shippmentType->guid = Helper::guid();

        if (isset($parameters['options']['custom']['ubezpieczenie'])) {

            $ubezpieczenieType = new \ubezpieczenieType();
            $ubezpieczenieType->rodzaj = 'STANDARD';
            $ubezpieczenieType->kwota = $parameters['options']['custom']['ubezpieczenie'];

            $shippmentType->ubezpieczenie = $ubezpieczenieType;
        }

        if ($parameters['options']['cod'] == true) {

            $pobranieType = new \pobranieType();
            $pobranieType->kwotaPobrania = ($parameters['options']['cod'] == true) ? $parameters['options']['amount'] : '';
            $pobranieType->nrb = $parameters['options']['bank_number'];
            $pobranieType->sposobPobrania = 'RACHUNEK_BANKOWY';
            $pobranieType->tytulem = $parameters['options']['references'];

            $shippmentType->pobranie = $pobranieType;
        }

        $shippment->przesylki[] = $shippmentType;
        $this->data = $shippment;

        return $this;
    }

    /**
     * @param $client
     */
    public function call($client) {

        try {

            $result = $client->addShipment($this->data);

            if (is_array($result->retval)) {
                $result->retval = $result->retval[0];
            }

            if (isset($result->retval->error) && is_array($result->retval->error)) {
                $result->retval->error = $result->retval->error[0];
            }

            if (isset($result->retval->numerNadania)) {

                $this->response['return'] = [
                    'tracking_id' => $result->retval->numerNadania,
                    'custom_id' => $result->retval->guid.'',
                ];
            }
            else {

                $this->response['error'] = $result->retval->error->errorDesc.'';
                $this->response['code'] = $result->retval->error->errorNumber.'';
            }
        }
        catch (\SoapFault $e) {

            $this->response['error'] = $e->faultactor.' | '.$e->faultstring;
            $this->response['code'] = $e->faultcode.'';
        }
    }

    /**
     * @return |null
     */
    public function getResponse() {

        if (!empty($this->response['return'])) {
            return $this->response['return'];
        }
        return null;
    }

    /**
     * @return bool
     */
    public function isSuccess() {

        if (!empty($this->response['return']) && $this->getError() == null) {
            return true;
        }
        return false;
    }

    /**
     * @return |null
     */
    public function getError() {
        return (!empty($this->response['error'])) ? $this->response['error'] : null;
    }

    /**
     * @return |null
     */
    public function getCode() {
        return (!empty($this->response['code'])) ? $this->response['code'] : null;
    }
}