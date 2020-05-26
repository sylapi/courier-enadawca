<?php
namespace Sylapi\Courier\Enadawca\Message;

/**
 * Class clearEnvelope
 * @package Sylapi\Courier\Enadawca\Message
 */
class clearEnvelope
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
     * @param array $data
     * @return $this
     */
    public function prepareData($data=[]) {

        $this->data = $data;
        return $this;
    }

    /**
     * @param $client
     */
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

    /**
     * @return |null
     */
    public function getResponse() {
        if (!empty($this->response['return']) && $this->response['return'] > 0) {
            return $this->response['return'];
        }
        return null;
    }

    /**
     * @return bool
     */
    public function isSuccess() {
        if (!empty($this->response['return']) && $this->response['return'] > 0) {
            return true;
        }
        return false;
    }

    /**
     * @return mixed
     */
    public function getError() {
        return $this->response['error'];
    }

    /**
     * @return mixed
     */
    public function getCode() {
        return $this->response['code'];
    }
}