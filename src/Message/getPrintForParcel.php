<?php

namespace Sylapi\Courier\Enadawca\Message;

class getPrintForParcel
{
    private $data;
    private $response;

    public function prepareData($parameters)
    {
        $this->data = [
            'guid' => $parameters['custom_id'],
            'type' => [
                'kind'   => 'ADDRESS_LABEL',
                'method' => 'EACH_PARCEL_SEPARATELY',
            ],
        ];

        return $this;
    }

    public function call($client)
    {
        try {
            $result = $client->getPrintForParcel($this->data);

            if (isset($result->printResult->print)) {
                $this->response['return'] = $result->printResult->print;
            } else {
                $this->response['error'] = $result->error->errorDesc.'';
                $this->response['code'] = $result->error->errorNumber.'';
            }
        } catch (\SoapFault $e) {
            $this->response['error'] = $e->faultactor.' | '.$e->faultstring;
            $this->response['code'] = $e->faultcode.'';
        }
    }

    public function getResponse()
    {
        if (!empty($this->response['return'])) {
            return $this->response['return'];
        }

        return null;
    }

    public function isSuccess()
    {
        if (!empty($this->response['return']) && $this->getError() == '') {
            return true;
        }

        return false;
    }

    public function getError()
    {
        return (isset($this->response['error'])) ? $this->response['error'] : '';
    }

    public function getCode()
    {
        return (isset($this->response['code'])) ? $this->response['code'] : '';
    }
}
