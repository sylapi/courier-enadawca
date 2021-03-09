<?php

class przesylkaBiznesowaPlusType extends przesylkaRejestrowanaType
{
    /** @var \pobranieType */
    public $pobranie;
    /** @var \placowkaPocztowaType */
    public $urzadWydaniaPrzesylki;
    /** @var \subPrzesylkaBiznesowaPlusType */
    public $subPrzesylka;
    /** @var \date */
    public $dataDrugiejProbyDoreczenia;
    /** @var int */
    public $drugaProbaDoreczeniaPoLiczbieDni;
    /** @var bool */
    public $posteRestante;
    /** @var \masaType */
    public $masa;
    /** @var \gabarytBiznesowaType */
    public $gabaryt;
    /** @var \wartoscType */
    public $wartosc;
    /** @var \kwotaTranzakcjiType */
    public $kwotaTranzakcji;
    /** @var bool */
    public $ostroznie;
    /** @var \kategoriaType */
    public $kategoria;
    /** @var \iloscPotwierdzenOdbioruType */
    public $iloscPotwierdzenOdbioru;
    /** @var bool */
    public $zwrotDoslanie;
    /** @var \eKontaktType */
    public $eKontaktAdresata;
    /** @var \eSposobPowiadomieniaType */
    public $eSposobPowiadomieniaAdresata;
    /** @var \numerPrzesylkiKlientaType */
    public $numerPrzesylkiKlienta;
    /** @var int */
    public $iloscDniOczekiwaniaNaWydanie;
    /** @var dateTime */
    public $oczekiwanyTerminDoreczenia;
    /** @var \terminRodzajPlusType */
    public $terminRodzajPlus;
    /** @var \numerTransakcjiOdbioruType */
    public $numerTransakcjiOdbioru;
}
