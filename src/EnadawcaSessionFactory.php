<?php

declare(strict_types=1);

namespace Sylapi\Courier\Enadawca;

class EnadawcaSessionFactory
{
    private $sessions = [];

    /**
     * @var null|EnadawcaParameters<string,mixed>
     */
    private $parameters;

    //These constants can be extracted into injected configuration
    const API_LIVE = 'https://live.enadawca.test/websrv/labs.wsdl';
    const API_LIVE_ENDPOINT = 'https://live.enadawca.test/websrv/labs.php';
    const API_SANDBOX = 'https://en-testwebapi.poczta-polska.pl/websrv/en.wsdl';
    const API_SANDBOX_ENDPOINT = 'https://en-testwebapi.poczta-polska.pl/websrv/en.php';
    const API_LIVE_TRACKING = 'https://tt.poczta-polska.pl/Sledzenie/services/Sledzenie?wsdl';
    const API_LIVE_TRACKING_LOGIN = 'sledzeniepp';
    const API_LIVE_TRACKING_PASSWORD = 'PPSA';
    const PACKAGE_SIZE_DEFAULT = 'XXL';
    const LABEL_TYPE = 'ADDRESS_LABEL';
    const LABEL_METHOD = 'EACH_PARCEL_SEPARATELY';

    public function session(EnadawcaParameters $parameters): EnadawcaSession
    {
        $this->parameters = $parameters;
        $this->parameters->apiUrl = ($this->parameters->sandbox) ? self::API_SANDBOX : self::API_LIVE;
        $this->parameters->apiUrlEndpoint = ($this->parameters->sandbox) ? self::API_SANDBOX_ENDPOINT : self::API_LIVE_ENDPOINT;
        $this->parameters->apiUrlTracking = self::API_LIVE_TRACKING;
        $this->parameters->loginTracking = $this->parameters->loginTracking ?? self::API_LIVE_TRACKING_LOGIN;
        $this->parameters->passwordTracking = $this->parameters->passwordTracking ?? self::API_LIVE_TRACKING_PASSWORD;
        $this->parameters->packageSize = $this->parameters->packageSize ?? self::PACKAGE_SIZE_DEFAULT;
        $this->parameters->labelType = $this->parameters->labelType ?? self::LABEL_TYPE;
        $this->parameters->labelMethod = $this->parameters->labelMethod ?? self::LABEL_METHOD;

        $key = sha1($this->parameters->apiUrl.':'.$this->parameters->login.':'.$this->parameters->password);

        return (isset($this->sessions[$key])) ? $this->sessions[$key] : ($this->sessions[$key] = new EnadawcaSession($this->parameters));
    }
}
