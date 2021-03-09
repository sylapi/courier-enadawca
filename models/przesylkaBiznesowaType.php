<?php

class przesylkaBiznesowaType extends przesylkaRejestrowanaType
{
    /** @var \pobranieType */
    public $pobranie;
    /** @var \urzadWydaniaEPrzesylkiType */
    public $urzadWydaniaEPrzesylki;
    /** @var \subPrzesylkaBiznesowaType */
    public $subPrzesylka;
    /** @var \ubezpieczenieType */
    public $ubezpieczenie;
    /** @var \EPOType */
    public $epo;
    /** @var \zasadySpecjalneEnum */
    public $zasadySpecjalne;
    public $masa;
    /** @var \gabarytBiznesowaType */
    public $gabaryt;
    /** @var \wartoscType */
    public $wartosc;
    /** @var bool */
    public $ostroznie;
    /** @var \numerTransakcjiOdbioruType */
    public $numerTransakcjiOdbioru;

    public $niestandardowa;
    public $doreczenie;
    public $potwierdzenieOdbioru;
    public $zwrotDokumentow;
}
