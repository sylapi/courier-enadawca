<?php

namespace Sylapi\Courier\Enadawca;

use Sylapi\Courier\Enadawca\Message\addShipment;
use Sylapi\Courier\Enadawca\Message\clearEnvelopeByGuids;
use Sylapi\Courier\Enadawca\Message\getGuid;
use Sylapi\Courier\Enadawca\Message\getPrintForParcel;

class Enadawca extends Connect
{
    protected $session;

    public function initialize($parameters)
    {
        $this->parameters = $parameters;

        if (!empty($parameters['accessData'])) {
            $this->setLogin($parameters['accessData']['login']);
            $this->setPassword($parameters['accessData']['password']);
        } else {
            $this->setError('Access Data is empty');
        }
    }

    public function login()
    {
        if (empty($this->client)) {
            foreach (self::$classmap as $key => $value) {
                if (!isset($options['classmap'][$key])) {
                    $options['classmap'][$key] = $value;
                }
            }

            $options['login'] = $this->login;
            $options['password'] = $this->password;
            $options['trace'] = 1;

            $this->client = new \SoapClient($this->getApiUri(), $options);

            $this->client->soap_defencoding = 'UTF-8';
            $this->client->decode_utf8 = true;
        }

        return false;
    }

    public function ValidateData()
    {
        $this->setResponse(['result' => true]);

        /*
        $getGuid = new getGuid();
        $getGuid->prepareData($this->parameters)->call($this->client);

        $this->setResponse($getGuid->getResponse());
        $this->setError($getGuid->getError());

        if ($getGuid->isSuccess()) {
            $this->preparing_delete($this->getResponse());
        }
        */
    }

    public function GetLabel()
    {
        $this->login();

        if (empty($this->parameters['custom_id'])) {
            $getGuid = new getGuid();
            $getGuid->prepareData($this->parameters)->call($this->client);

            $this->setResponse($getGuid->getResponse());
            $this->setError($getGuid->getError());

            if ($getGuid->isSuccess()) {
                $guids = $this->getResponse();
                $this->parameters['custom_id'] = $guids[0];
            }
        }

        if (!empty($this->parameters['custom_id'])) {
            $getAddresLabelByGuid = new getPrintForParcel();
            $getAddresLabelByGuid->prepareData($this->parameters)->call($this->client);

            $this->setResponse($getAddresLabelByGuid->getResponse());
            $this->setError($getAddresLabelByGuid->getError());
        }
    }

    public function CreatePackage()
    {
        $this->login();

        $addShipment = new addShipment();
        $addShipment->prepareData($this->parameters)->call($this->client);

        $response = $addShipment->getResponse();

        if ($addShipment->isSuccess()) {
            $response['custom_id'] = $response['custom_id'];
        }

        $this->setResponse($response);
        $this->setError($addShipment->getError());
    }

    public function CheckPrice()
    {
        $response = (isset($this->parameters['options']['custom']['parcel_cost'])) ? $this->parameters['options']['custom']['parcel_cost'] : 0;
        $this->setResponse($response);
    }

    private function preparing_delete($guid_id)
    {
        $clearEnvelopeByGuids = new clearEnvelopeByGuids();
        $clearEnvelopeByGuids->prepareData($guid_id)->call($this->client, $this->session);
    }
}
