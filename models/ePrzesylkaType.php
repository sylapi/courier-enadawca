<?php



class ePrzesylkaType extends przesylkaRejestrowanaType
{
    /** @var \urzadWydaniaEPrzesylkiType */
    public $urzadWydaniaEPrzesylki;
    /** @var \pobranieType */
    public $pobranie;
    /** @var \masaType */
    public $masa;
    /** @var \eSposobPowiadomieniaType */
    public $eSposobPowiadomieniaAdresata;
    /** @var \eSposobPowiadomieniaType */
    public $eSposobPowiadomieniaNadawcy;
    /** @var \eKontaktType */
    public $eKontaktAdresata;
    /** @var \eKontaktType */
    public $eKontaktNadawcy;
    /** @var boolean */
    public $ostroznie;
    /** @var \wartoscType */
    public $wartosc;
}
