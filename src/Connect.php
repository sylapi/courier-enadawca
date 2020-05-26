<?php

namespace Sylapi\Courier\Enadawca;

/**
 * Class Connect
 * @package Sylapi\Courier\Enadawca
 */
abstract class Connect
{
    const API_LIVE = 'https://e-nadawca.poczta-polska.pl/websrv/en.wsdl';

    const API_SANDBOX = 'https://en-testwebapi.poczta-polska.pl/websrv/en.wsdl';

    /**
     * @var string
     */
    protected $api_uri;
    /**
     * @var
     */
    protected $client;
    /**
     * @var
     */
    protected $login;
    /**
     * @var
     */
    protected $password;
    /**
     * @var
     */
    protected $parameters;
    /**
     * @var
     */
    protected $error;
    /**
     * @var
     */
    protected $response;
    /**
     * @var string
     */
    protected $code = '';

    /**
     * @var array
     */
    protected static $classmap = array(
        'addShipment' => 'addShipment',
        'przesylkaType' => 'przesylkaType',
        'pocztexKrajowyType' => 'pocztexKrajowyType',
        'umowaType' => 'umowaType',
        'masaType' => 'masaType',
        'numerNadaniaType' => 'numerNadaniaType',
        'changePassword' => 'changePassword',
        'changePasswordResponse' => 'changePasswordResponse',
        'terminRodzajType' => 'terminRodzajType',
        'uiszczaOplateType' => 'uiszczaOplateType',
        'wartoscType' => 'wartoscType',
        'kwotaPobraniaType' => 'kwotaPobraniaType',
        'sposobPobraniaType' => 'sposobPobraniaType',
        'sposobPrzekazaniaType' => 'sposobPrzekazaniaType',
        'sposobDoreczeniaPotwierdzeniaType' => 'sposobDoreczeniaPotwierdzeniaType',
        'iloscPotwierdzenOdbioruType' => 'iloscPotwierdzenOdbioruType',
        'dataDlaDostarczeniaType' => 'dataDlaDostarczeniaType',
        'razemType' => 'razemType',
        'nazwaType' => 'nazwaType',
        'nazwa2Type' => 'nazwa2Type',
        'ulicaType' => 'ulicaType',
        'numerDomuType' => 'numerDomuType',
        'numerLokaluType' => 'numerLokaluType',
        'miejscowoscType' => 'miejscowoscType',
        'kodPocztowyType' => 'kodPocztowyType',
        'paczkaPocztowaType' => 'paczkaPocztowaType',
        'kategoriaType' => 'kategoriaType',
        'gabarytType' => 'gabarytType',
        'paczkaPocztowaPLUSType' => 'paczkaPocztowaPLUSType',
        'przesylkaPobraniowaType' => 'przesylkaPobraniowaType',
        'przesylkaNaWarunkachSzczegolnychType' => 'przesylkaNaWarunkachSzczegolnychType',
        'przesylkaPoleconaKrajowaType' => 'przesylkaPoleconaKrajowaType',
        'przesylkaHandlowaType' => 'przesylkaHandlowaType',
        'przesylkaListowaZadeklarowanaWartoscType' => 'przesylkaListowaZadeklarowanaWartoscType',
        'przesylkaFullType' => 'przesylkaFullType',
        'adresType' => 'adresType',
        'sendEnvelope' => 'sendEnvelope',
        'sendEnvelopeResponseType' => 'sendEnvelopeResponseType',
        'urzadNadaniaType' => 'urzadNadaniaType',
        'getUrzedyNadania' => 'getUrzedyNadania',
        'getUrzedyNadaniaResponse' => 'getUrzedyNadaniaResponse',
        'clearEnvelope' => 'clearEnvelope',
        'clearEnvelopeResponse' => 'clearEnvelopeResponse',
        'urzadNadaniaFullType' => 'urzadNadaniaFullType',
        'guidType' => 'guidType',
        'ePrzesylkaType' => 'ePrzesylkaType',
        'eSposobPowiadomieniaType' => 'eSposobPowiadomieniaType',
        'eKontaktType' => 'eKontaktType',
        'urzadWydaniaEPrzesylkiType' => 'urzadWydaniaEPrzesylkiType',
        'pobranieType' => 'pobranieType',
        'anonymous52' => 'anonymous52',
        'anonymous53' => 'anonymous53',
        'przesylkaPoleconaZagranicznaType' => 'przesylkaPoleconaZagranicznaType',
        'przesylkaZadeklarowanaWartoscZagranicznaType' => 'przesylkaZadeklarowanaWartoscZagranicznaType',
        'krajType' => 'krajType',
        'getUrzedyWydajaceEPrzesylki' => 'getUrzedyWydajaceEPrzesylki',
        'getUrzedyWydajaceEPrzesylkiResponse' => 'getUrzedyWydajaceEPrzesylkiResponse',
        'uploadIWDContent' => 'uploadIWDContent',
        'getEnvelopeStatus' => 'getEnvelopeStatus',
        'getEnvelopeStatusResponse' => 'getEnvelopeStatusResponse',
        'envelopeStatusType' => 'envelopeStatusType',
        'downloadIWDContent' => 'downloadIWDContent',
        'downloadIWDContentResponse' => 'downloadIWDContentResponse',
        'przesylkaShortType' => 'przesylkaShortType',
        'getKarty' => 'getKarty',
        'getKartyResponse' => 'getKartyResponse',
        'getPasswordExpiredDate' => 'getPasswordExpiredDate',
        'getPasswordExpiredDateResponse' => 'getPasswordExpiredDateResponse',
        'setAktywnaKarta' => 'setAktywnaKarta',
        'setAktywnaKartaResponse' => 'setAktywnaKartaResponse',
        'getEnvelopeContentFull' => 'getEnvelopeContentFull',
        'getEnvelopeContentFullResponse' => 'getEnvelopeContentFullResponse',
        'getEnvelopeContentShort' => 'getEnvelopeContentShort',
        'getEnvelopeContentShortResponse' => 'getEnvelopeContentShortResponse',
        'hello' => 'hello',
        'helloResponse' => 'helloResponse',
        'kartaType' => 'kartaType',
        'telefonType' => 'telefonType',
        'getAddressLabel' => 'getAddressLabel',
        'getAddressLabelResponse' => 'getAddressLabelResponse',
        'addressLabelContent' => 'addressLabelContent',
        'getOutboxBook' => 'getOutboxBook',
        'getOutboxBookResponse' => 'getOutboxBookResponse',
        'getFirmowaPocztaBook' => 'getFirmowaPocztaBook',
        'getFirmowaPocztaBookResponse' => 'getFirmowaPocztaBookResponse',
        'getEnvelopeList' => 'getEnvelopeList',
        'getEnvelopeListResponse' => 'getEnvelopeListResponse',
        'envelopeInfoType' => 'envelopeInfoType',
        'przesylkaZagranicznaType' => 'przesylkaZagranicznaType',
        'przesylkaRejestrowanaType' => 'przesylkaRejestrowanaType',
        'przesylkaNieRejestrowanaType' => 'przesylkaNieRejestrowanaType',
        'anonymous94' => 'anonymous94',
        'przesylkaBiznesowaType' => 'przesylkaBiznesowaType',
        'gabarytBiznesowaType' => 'gabarytBiznesowaType',
        'subPrzesylkaBiznesowaType' => 'subPrzesylkaBiznesowaType',
        'subPrzesylkaBiznesowaPlusType' => 'subPrzesylkaBiznesowaPlusType',
        'getAddresLabelByGuid' => 'getAddresLabelByGuid',
        'getAddresLabelByGuidResponse' => 'getAddresLabelByGuidResponse',
        'przesylkaBiznesowaPlusType' => 'przesylkaBiznesowaPlusType',
        'opisType' => 'opisType',
        'numerPrzesylkiKlientaType' => 'numerPrzesylkiKlientaType',
        'pakietType' => 'pakietType',
        'opakowanieType' => 'opakowanieType',
        'typOpakowaniaType' => 'typOpakowaniaType',
        'getPlacowkiPocztowe' => 'getPlacowkiPocztowe',
        'getPlacowkiPocztoweResponse' => 'getPlacowkiPocztoweResponse',
        'getGuid' => 'getGuid',
        'getGuidResponse' => 'getGuidResponse',
        'kierunekType' => 'kierunekType',
        'getKierunki' => 'getKierunki',
        'prefixKodPocztowy' => 'prefixKodPocztowy',
        'getKierunkiResponse' => 'getKierunkiResponse',
        'czynnoscUpustowaType' => 'czynnoscUpustowaType',
        'miejsceOdbioruType' => 'miejsceOdbioruType',
        'sposobNadaniaType' => 'sposobNadaniaType',
        'getKierunkiInfo' => 'getKierunkiInfo',
        'getKierunkiInfoResponse' => 'getKierunkiInfoResponse',
        'kwotaTranzakcjiType' => 'kwotaTranzakcjiType',
        'uslugiType' => 'uslugiType',
        'idWojewodztwoType' => 'idWojewodztwoType',
        'placowkaPocztowaType' => 'placowkaPocztowaType',
        'anonymous124' => 'anonymous124',
        'anonymous125' => 'anonymous125',
        'punktWydaniaPrzesylkiBiznesowejPlus' => 'punktWydaniaPrzesylkiBiznesowejPlus',
        'statusType' => 'statusType',
        'terminRodzajPlusType' => 'terminRodzajPlusType',
        'typOpakowanieType' => 'typOpakowanieType',
        'getEnvelopeBufor' => 'getEnvelopeBufor',
        'getEnvelopeBuforResponse' => 'getEnvelopeBuforResponse',
        'clearEnvelopeByGuids' => 'clearEnvelopeByGuids',
        'clearEnvelopeByGuidsResponse' => 'clearEnvelopeByGuidsResponse',
        'zwrotDokumentowType' => 'zwrotDokumentowType',
        'odbiorPrzesylkiOdNadawcyType' => 'odbiorPrzesylkiOdNadawcyType',
        'potwierdzenieDoreczeniaType' => 'potwierdzenieDoreczeniaType',
        'rodzajListType' => 'rodzajListType',
        'potwierdzenieOdbioruType' => 'potwierdzenieOdbioruType',
        'sposobPrzekazaniaPotwierdzeniaOdbioruType' => 'sposobPrzekazaniaPotwierdzeniaOdbioruType',
        'doreczenieType' => 'doreczenieType',
        'doreczenieUslugaPocztowaType' => 'doreczenieUslugaPocztowaType',
        'doreczenieUslugaKurierskaType' => 'doreczenieUslugaKurierskaType',
        'oczekiwanaGodzinaDoreczeniaType' => 'oczekiwanaGodzinaDoreczeniaType',
        'oczekiwanaGodzinaDoreczeniaUslugiType' => 'oczekiwanaGodzinaDoreczeniaUslugiType',
        'paczkaZagranicznaType' => 'paczkaZagranicznaType',
        'setEnvelopeBuforDataNadania' => 'setEnvelopeBuforDataNadania',
        'setEnvelopeBuforDataNadaniaResponse' => 'setEnvelopeBuforDataNadaniaResponse',
        'lokalizacjaGeograficznaType' => 'lokalizacjaGeograficznaType',
        'wspolrzednaGeograficznaType' => 'wspolrzednaGeograficznaType',
        'zwrotType' => 'zwrotType',
        'sposobZwrotuType' => 'sposobZwrotuType',
        'listZwyklyType' => 'listZwyklyType',
        'reklamowaType' => 'reklamowaType',
        'getEPOStatus' => 'getEPOStatus',
        'getEPOStatusResponse' => 'getEPOStatusResponse',
        'statusEPOEnum' => 'statusEPOEnum',
        'EPOType' => 'EPOType',
        'EPOSimpleType' => 'EPOSimpleType',
        'EPOExtendedType' => 'EPOExtendedType',
        'zasadySpecjalneEnum' => 'zasadySpecjalneEnum',
        'przesylkaEPOType' => 'przesylkaEPOType',
        'przesylkaFirmowaPoleconaType' => 'przesylkaFirmowaPoleconaType',
        'EPOInfoType' => 'EPOInfoType',
        'awizoPrzesylkiType' => 'awizoPrzesylkiType',
        'doreczeniePrzesylkiType' => 'doreczeniePrzesylkiType',
        'zwrotPrzesylkiType' => 'zwrotPrzesylkiType',
        'miejscaPozostawieniaAwizoEnum' => 'miejscaPozostawieniaAwizoEnum',
        'podmiotDoreczeniaEnum' => 'podmiotDoreczeniaEnum',
        'przyczynaZwrotuEnum' => 'przyczynaZwrotuEnum',
        'getAddresLabelCompact' => 'getAddresLabelCompact',
        'getAddresLabelCompactResponse' => 'getAddresLabelCompactResponse',
        'getAddresLabelByGuidCompact' => 'getAddresLabelByGuidCompact',
        'getAddresLabelByGuidCompactResponse' => 'getAddresLabelByGuidCompactResponse',
        'ubezpieczenieType' => 'ubezpieczenieType',
        'rodzajUbezpieczeniaType' => 'rodzajUbezpieczeniaType',
        'kwotaUbezpieczeniaType' => 'kwotaUbezpieczeniaType',
        'emailType' => 'emailType',
        'mobileType' => 'mobileType',
        'EMSType' => 'EMSType',
        'EMSTypOpakowaniaType' => 'EMSTypOpakowaniaType',
        'getEnvelopeBuforList' => 'getEnvelopeBuforList',
        'getEnvelopeBuforListResponse' => 'getEnvelopeBuforListResponse',
        'buforType' => 'buforType',
        'createEnvelopeBufor' => 'createEnvelopeBufor',
        'createEnvelopeBuforResponse' => 'createEnvelopeBuforResponse',
        'moveShipments' => 'moveShipments',
        'moveShipmentsResponse' => 'moveShipmentsResponse',
        'updateEnvelopeBufor' => 'updateEnvelopeBufor',
        'updateEnvelopeBuforResponse' => 'updateEnvelopeBuforResponse',
        'getUbezpieczeniaInfo' => 'getUbezpieczeniaInfo',
        'getUbezpieczeniaInfoResponse' => 'getUbezpieczeniaInfoResponse',
        'ubezpieczeniaInfoType' => 'ubezpieczeniaInfoType',
        'isMiejscowa' => 'isMiejscowa',
        'isMiejscowaResponse' => 'isMiejscowaResponse',
        'trasaRequestType' => 'trasaRequestType',
        'trasaResponseType' => 'trasaResponseType',
        'deklaracjaCelnaType' => 'deklaracjaCelnaType',
        'szczegolyDeklaracjiCelnejType' => 'szczegolyDeklaracjiCelnejType',
        'przesylkaPaletowaType' => 'przesylkaPaletowaType',
        'rodzajPaletyType' => 'rodzajPaletyType',
        'paletaType' => 'paletaType',
        'platnikType' => 'platnikType',
        'subPrzesylkaPaletowaType' => 'subPrzesylkaPaletowaType',
        'getBlankietPobraniaByGuids' => 'getBlankietPobraniaByGuids',
        'getBlankietPobraniaByGuidsResponse' => 'getBlankietPobraniaByGuidsResponse',
        'updateAccount' => 'updateAccount',
        'updateAccountResponse' => 'updateAccountResponse',
        'accountType' => 'accountType',
        'permisionType' => 'permisionType',
        'getAccountList' => 'getAccountList',
        'getAccountListResponse' => 'getAccountListResponse',
        'profilType' => 'profilType',
        'getProfilList' => 'getProfilList',
        'getProfilListResponse' => 'getProfilListResponse',
        'updateProfil' => 'updateProfil',
        'updateProfilResponse' => 'updateProfilResponse',
        'statusAccountType' => 'statusAccountType',
        'uslugaPaczkowaType' => 'uslugaPaczkowaType',
        'subUslugaPaczkowaType' => 'subUslugaPaczkowaType',
        'terminPaczkowaType' => 'terminPaczkowaType',
        'opakowaniePocztowaType' => 'opakowaniePocztowaType',
        'uslugaKurierskaType' => 'uslugaKurierskaType',
        'subUslugaKurierskaType' => 'subUslugaKurierskaType',
        'createAccount' => 'createAccount',
        'createAccountResponse' => 'createAccountResponse',
        'createProfil' => 'createProfil',
        'createProfilResponse' => 'createProfilResponse',
        'terminKurierskaType' => 'terminKurierskaType',
        'opakowanieKurierskaType' => 'opakowanieKurierskaType',
        'zwrotDokumentowPaczkowaType' => 'zwrotDokumentowPaczkowaType',
        'potwierdzenieOdbioruPaczkowaType' => 'potwierdzenieOdbioruPaczkowaType',
        'sposobPrzekazaniaPotwierdzeniaOdbioruPocztowaType' => 'sposobPrzekazaniaPotwierdzeniaOdbioruPocztowaType',
        'zwrotDokumentowKurierskaType' => 'zwrotDokumentowKurierskaType',
        'terminZwrotDokumentowKurierskaType' => 'terminZwrotDokumentowKurierskaType',
        'terminZwrotDokumentowPaczkowaType' => 'terminZwrotDokumentowPaczkowaType',
        'potwierdzenieOdbioruKurierskaType' => 'potwierdzenieOdbioruKurierskaType',
        'sposobPrzekazaniaPotwierdzeniaOdbioruKurierskaType' => 'sposobPrzekazaniaPotwierdzeniaOdbioruKurierskaType',
        'addReklamacje' => 'addReklamacje',
        'addReklamacjeResponse' => 'addReklamacjeResponse',
        'getReklamacje' => 'getReklamacje',
        'getReklamacjeResponse' => 'getReklamacjeResponse',
        'getZapowiedziFaktur' => 'getZapowiedziFaktur',
        'getZapowiedziFakturResponse' => 'getZapowiedziFakturResponse',
        'addOdwolanieDoReklamacji' => 'addOdwolanieDoReklamacji',
        'addOdwolanieDoReklamacjiResponse' => 'addOdwolanieDoReklamacjiResponse',
        'addRozbieznoscDoZapowiedziFaktur' => 'addRozbieznoscDoZapowiedziFaktur',
        'addRozbieznoscDoZapowiedziFakturResponse' => 'addRozbieznoscDoZapowiedziFakturResponse',
        'reklamowanaPrzesylkaType' => 'reklamowanaPrzesylkaType',
        'powodReklamacjiType' => 'powodReklamacjiType',
        'reklamacjaRozpatrzonaType' => 'reklamacjaRozpatrzonaType',
        'rozstrzygniecieType' => 'rozstrzygniecieType',
        'getListaPowodowReklamacji' => 'getListaPowodowReklamacji',
        'getListaPowodowReklamacjiResponse' => 'getListaPowodowReklamacjiResponse',
        'powodSzczegolowyType' => 'powodSzczegolowyType',
        'kategoriePowodowReklamacjiType' => 'kategoriePowodowReklamacjiType',
        'listBiznesowyType' => 'listBiznesowyType',
        'zamowKuriera' => 'zamowKuriera',
        'zamowKurieraResponse' => 'zamowKurieraResponse',
        'getEZDOList' => 'getEZDOList',
        'getEZDOListResponse' => 'getEZDOListResponse',
        'getEZDO' => 'getEZDO',
        'getEZDOResponse' => 'getEZDOResponse',
        'EZDOPakietType' => 'EZDOPakietType',
        'EZDOPrzesylkaType' => 'EZDOPrzesylkaType',
        'wplataCKPType' => 'wplataCKPType',
        'getWplatyCKP' => 'getWplatyCKP',
        'getWplatyCKPResponse' => 'getWplatyCKPResponse',
        'globalExpresType' => 'globalExpresType',
        'cancelReklamacja' => 'cancelReklamacja',
        'cancelReklamacjaResponse' => 'cancelReklamacjaResponse',
        'zalacznikDoReklamacjiType' => 'zalacznikDoReklamacjiType',
        'addZalacznikDoReklamacji' => 'addZalacznikDoReklamacji',
        'addZalacznikDoReklamacjiResponse' => 'addZalacznikDoReklamacjiResponse',
        'getPrintForParcel' => 'getPrintForParcel'
    );

    /**
     * Connect constructor.
     */
    public function __construct() {
        $this->api_uri = self::API_LIVE;
    }

    /**
     * @param $login
     * @return mixed
     */
    protected function setLogin($login) {
        return $this->login = $login;
    }

    /**
     * @param $password
     * @return mixed
     */
    protected function setPassword($password) {
        return $this->password = $password;
    }

    /**
     * @return string
     */
    public function getApiUri() {
        return $this->api_uri;
    }

    /**
     * @return string
     */
    public function sandbox() {
        return $this->api_uri = self::API_SANDBOX;
    }

    /**
     * @return bool
     */
    public function isSuccess() {
        return (empty($this->error)) ? true : false;
    }

    /**
     * @return mixed
     */
    public function getError() {
        return $this->error;
    }

    /**
     * @param $value
     * @return mixed
     */
    protected function setError($value) {
        if (!empty($value)) {
            return $this->error[] = $value;
        }
    }

    /**
     * @param $value
     * @return mixed
     */
    protected function setCode($value) {
        return $this->code = $value;
    }

    /**
     * @return string
     */
    public function getCode() {
        return $this->code;
    }

    /**
     * @param $value
     * @return mixed
     */
    protected function setResponse($value) {
        return $this->response = $value;
    }

    /**
     * @return mixed
     */
    public function getResponse() {
        return $this->response;
    }

    /**
     * @param $soap
     */
    public function setSoapClient($soap) {
        $this->client = $soap;
    }

    /**
     * @return array
     */
    public function debug() {

        return [
            'success' => $this->isSuccess(),
            'code' => $this->getCode(),
            'error' => $this->getError(),
            'response' => $this->getResponse(),
        ];
    }
}