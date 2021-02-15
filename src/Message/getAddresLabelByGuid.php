<?php

namespace Sylapi\Courier\Enadawca\Message;

/**
 * Class getAddresLabelByGuid.
 */
class getAddresLabelByGuid
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
     *
     * @return $this
     */
    public function prepareData($parameters)
    {
        $this->data = [
            'guid' => $parameters['custom_id'],
        ];

        return $this;
    }

    /**
     * @param $client
     */
    public function call($client)
    {
        try {
            $result = $client->getAddresLabelByGuid($this->data);

            $this->response['error'] = $result->retval->error[0]->errorDesc.'';
            $this->response['code'] = $result->retval->error[0]->errorNumber.'';

            if (empty($this->response['error'])) {
                $this->response['return'] = $result;
            }
        } catch (\SoapFault $e) {
            $this->response['error'] = $e->faultactor.' | '.$e->faultstring;
            $this->response['code'] = $e->faultcode.'';
        }
    }

    /**
     * @return |null
     */
    public function getResponse()
    {
        if (!empty($this->response['return']) && $this->response['return'] > 0) {
            return $this->response['return'];
        }

        return null;
    }

    /**
     * @return bool
     */
    public function isSuccess()
    {
        if (!empty($this->response['return']) && $this->response['return'] > 0 && $this->getError() == '') {
            return true;
        }

        return false;
    }

    /**
     * @return mixed
     */
    public function getError()
    {
        return $this->response['error'];
    }

    /**
     * @return mixed
     */
    public function getCode()
    {
        return $this->response['code'];
    }
}
