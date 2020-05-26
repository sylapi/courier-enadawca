<?php
namespace Sylapi\Courier\Enadawca\Message;

/**
 * Class getGuid
 * @package Sylapi\Courier\Enadawca\Message
 */
class getGuid
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

        $this->data = $parameters;
        $this->data['ilosc'] = 10;

        return $this;
    }

    /**
     * @param $client
     */
    public function call($client) {

        try {

            $result = $client->getGuid($this->data);

            $this->response['error'] = $result->retval->error[0]->errorDesc.'';
            $this->response['code'] = $result->retval->error[0]->errorNumber.'';

            if (empty($this->response['error'])) {
                $this->response['return'] = (is_array($result->guid)) ? $result->guid : [$result->guid.''];
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

        if (!empty($this->response['return']) && $this->getError() == '') {
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