<?php

namespace Sylapi\Courier\Enadawca\Message;

class getAddresLabelByGuid
{
    private $data;
    private $response;

    public function prepareData($parameters)
    {
        $this->data = [
            'guid' => $parameters['custom_id'],
            //'idBufor' => ''
        ];

        return $this;
    }

    public function call($client)
    {
        try {
            print_r($this->data);
            $result = $client->getAddresLabelByGuid($this->data);
            print_r($result);

            $this->response['error'] = $result->retval->error[0]->errorDesc.'';
            $this->response['code'] = $result->retval->error[0]->errorNumber.'';

            if (empty($this->response['error'])) {
                $this->response['return'] = $result;
            }
        } catch (\SoapFault $e) {
            print_r($e);
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
        if (!empty($this->response['return']) && $this->response['return'] > 0 && $this->getError() == '') {
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
