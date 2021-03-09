<?php

class uslugaPaczkowaType extends przesylkaRejestrowanaType
{
    /** @var \pobranieType */
    public $pobranie;
    /** @var \potwierdzenieDoreczeniaType */
    public $potwierdzenieDoreczenia;
    /** @var \urzadWydaniaEPrzesylkiType */
    public $urzadWydaniaEPrzesylki;
    /** @var \subUslugaPaczkowaType */
    public $subPrzesylka;
    /** @var \potwierdzenieOdbioruPaczkowaType */
    public $potwierdzenieOdbioru;
    /** @var \ubezpieczenieType */
    public $ubezpieczenie;
    /** @var \zwrotDokumentowPaczkowaType */
    public $zwrotDokumentow;
    /** @var \doreczenieUslugaPocztowaType */
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
    /** @var string */
    public $zawartosc;
    /** @var bool */
    public $sprawdzenieZawartosciPrzesylkiPrzezOdbiorce;
    /** @var bool */
    public $ostroznie;
    /** @var \uiszczaOplateType */
    public $uiszczaOplate;
    /** @var \terminPaczkowaType */
    public $termin;
    /** @var \opakowaniePocztowaType */
    public $opakowanie;
    /** @var string */
    public $numerPrzesylkiKlienta;
    /** @var \numerTransakcjiOdbioruType */
    public $numerTransakcjiOdbioru;
    /** @var \gabarytType */
    public $gabaryt;
}
