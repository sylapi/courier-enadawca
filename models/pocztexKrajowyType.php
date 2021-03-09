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
    /** @var boolean */
    public $posteRestante;
    /** @var \terminRodzajType */
    public $terminRodzaj;
    /** @var boolean */
    public $kopertaFirmowa;
    /** @var \masaType */
    public $masa;
    /** @var \wartoscType */
    public $wartosc;
    /** @var boolean */
    public $ostroznie;
    /** @var boolean */
    public $ponadgabaryt;
    /** @var \uiszczaOplateType */
    public $uiszczaOplate;
    /** @var int */
    public $odleglosc;
    /** @var string */
    public $zawartosc;
    /** @var boolean */
    public $sprawdzenieZawartosciPrzesylkiPrzezOdbiorce;
}
