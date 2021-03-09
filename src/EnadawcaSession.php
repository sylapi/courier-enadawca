<?php

declare(strict_types=1);

namespace Sylapi\Courier\Enadawca;

use SoapClient;
use SoapHeader;

class EnadawcaSession
{
    private $parameters;
    private $client;
    private $clientTracking;

    public function __construct(EnadawcaParameters $parameters)
    {
        $this->parameters = $parameters;
        $this->client = null;
    }

    public function parameters(): EnadawcaParameters
    {
        return $this->parameters;
    }

    public function client(): EnadawcaSoap
    {
        if (!$this->client) {
            $this->initializeSession();
        }

        return $this->client;
    }

    public function clientTracking(): SoapClient
    {
        if (!$this->clientTracking) {
            $this->initializeTrackingSession();
        }

        return $this->clientTracking;
    }

    private function initializeSession(): void
    {
        $this->client = new EnadawcaSoap(
            $this->parameters->apiUrl,
            $this->parameters->login,
            $this->parameters->password,
            $this->parameters->apiUrlEndpoint
        );
        $this->client->soap_defencoding = 'UTF-8';
        $this->client->decode_utf8 = true;
    }

    private function initializeTrackingSession(): void
    {
        $user = $this->parameters->loginTracking;
        $pass = $this->parameters->passwordTracking;
        $apiUrl = $this->parameters->apiUrlTracking;
        $client = new SoapClient($apiUrl, ['trace' => 1]);

        $wssNs = 'http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-wssecurity-secext-1.0.xsd';

        $auth = new \stdClass();
        $auth->Username = new \SoapVar($user, XSD_STRING, '', $wssNs, '', $wssNs);
        $auth->Password = new \SoapVar($pass, XSD_STRING, '', $wssNs, '', $wssNs);

        $UsernameToken = new \stdClass();
        $UsernameToken->UsernameToken = new \SoapVar(
            $auth,
            SOAP_ENC_OBJECT,
            '',
            $wssNs,
            'UsernameToken',
            $wssNs
        );

        $SecuritySv = new \SoapVar(
            new \SoapVar($UsernameToken, SOAP_ENC_OBJECT, '', $wssNs, 'UsernameToken', $wssNs),
            SOAP_ENC_OBJECT,
            '',
            $wssNs,
            'Security',
            $wssNs
        );

        $soapHeader = new SoapHeader($wssNs, 'Security', $SecuritySv, true);
        $client->__setSoapHeaders($soapHeader);

        $this->clientTracking = $client;
    }
}
