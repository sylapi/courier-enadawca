<?php

class uslugaKurierskaType extends przesylkaRejestrowanaType
{
    /** @var \pobranieType */
    public $pobranie;
    /** @var \odbiorPrzesylkiOdNadawcyType */
    public $odbiorPrzesylkiOdNadawcy;
    /** @var \potwierdzenieDoreczeniaType */
    public $potwierdzenieDoreczenia;
    /** @var \urzadWydaniaEPrzesylkiType */
    public $urzadWydaniaEPrzesylki;
    /** @var \subUslugaKurierskaType */
    public $subPrzesylka;
    /** @var \potwierdzenieOdbioruKurierskaType */
    public $potwierdzenieOdbioru;
    /** @var \ubezpieczenieType */
    public $ubezpieczenie;
    /** @var \zwrotDokumentowKurierskaType */
    public $zwrotDokumentow;
    /** @var \doreczenieUslugaKurierskaType */
    public $doreczenie;
    /** @var \EPOType */
    public $epo;
    /** @var \zasadySpecjalneEnum */
    public $zasadySpecjalne;
    /** @var \masaType */
    public $masa;
    /** @var \wartoscType */
    public $wartosc;
    /** @var bool */
    public $ponadgabaryt;
    /** @var int */
    public $odleglosc;
    /** @var string */
    public $zawartosc;
    /** @var bool */
    public $sprawdzenieZawartosciPrzesylkiPrzezOdbiorce;
    /** @var bool */
    public $ostroznie;
    /** @var \uiszczaOplateType */
    public $uiszczaOplate;
    /** @var \terminKurierskaType */
    public $termin;
    /** @var \opakowanieKurierskaType */
    public $opakowanie;
    /** @var string */
    public $numerPrzesylkiKlienta;
    /** @var \numerTransakcjiOdbioruType */
    public $numerTransakcjiOdbioru;
}
