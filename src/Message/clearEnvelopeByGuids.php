<?php

namespace Sylapi\Courier\Enadawca\Message;

class clearEnvelopeByGuids
{
    private $data;
    private $response;

    public function prepareData($data = [])
    {
        $this->data = [
            'quid' => $data['quid'],
        ];

        return $this;
    }

    public function call($client)
    {
        try {
            $this->response['return'] = $client->clearEnvelopeByGuids($this->data);

            pr($this->response['return']);
        } catch (\SoapFault $e) {
            $this->response['error'] = $e->faultactor.' | '.$e->faultstring;
            $this->response['code'] = $e->faultcode.'';
        }
    }

    public function getResponse()
    {
        if (!empty($this->response['return']) && $this->response['return'] > 0) {
            return $this->response['return'];
        }

        return null;
    }

    public function isSuccess()
    {
        if (!empty($this->response['return']) && $this->response['return'] > 0) {
            return true;
        }

        return false;
    }

    public function getError()
    {
        return $this->response['error'];
    }

    public function getCode()
    {
        return $this->response['code'];
    }
}
