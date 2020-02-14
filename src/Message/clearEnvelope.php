<?php
namespace Sylapi\Courier\Enadawca\Message;

class clearEnvelope
{
    private $data;
    private $response;

    public function prepareData($data=[]) {

        $this->data = $data;
        return $this;
    }

    public function call($client) {

        try {

            $this->response['return'] = $client->clearEnvelope();

            pr($this->response['return']);
        }
        catch (\SoapFault $e) {
            $this->response['error'] = $e->faultactor.' | '.$e->faultstring;
            $this->response['code'] = $e->faultcode.'';
        }
    }

    public function getResponse() {
        if (!empty($this->response['return']) && $this->response['return'] > 0) {
            return $this->response['return'];
        }
        return null;
    }

    public function isSuccess() {
        if (!empty($this->response['return']) && $this->response['return'] > 0) {
            return true;
        }
        return false;
    }

    public function getError() {
        return $this->response['error'];
    }

    public function getCode() {
        return $this->response['code'];
    }
}