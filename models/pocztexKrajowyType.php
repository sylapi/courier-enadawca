<?php

class pocztexKrajowyType extends przesylkaRejestrowanaType
{
    /** @var \pobranieType */
    public $pobranie;
    /** @var \odbiorPrzesylkiOdNadawcyType */
    public $odbiorPrzesylkiOdNadawcy;
    /** @var \doreczenieType */
    public $doreczenie;
    /** @var \zwrotDokumentowType */
    public $zwrotDokumentow;
    /** @var \potwierdzenieOdbioruType */
    public $potwierdzenieOdbioru;
    /** @var \potwierdzenieDoreczeniaType */
    public $potwierdzenieDoreczenia;
    /** @var \ubezpieczenieType */
    public $ubezpieczenie;
    /** @var bool */
    public $posteRestante;
    /** @var \terminRodzajType */
    public $terminRodzaj;
    /** @var bool */
    public $kopertaFirmowa;
    /** @var \masaType */
    public $masa;
    /** @var \wartoscType */
    public $wartosc;
    /** @var bool */
    public $ostroznie;
    /** @var bool */
    public $ponadgabaryt;
    /** @var \uiszczaOplateType */
    public $uiszczaOplate;
    /** @var int */
    public $odleglosc;
    /** @var string */
    public $zawartosc;
    /** @var bool */
    public $sprawdzenieZawartosciPrzesylkiPrzezOdbiorce;
}
