<?php

class AlistWartosciowyKrajowyType extends przesylkaRejestrowanaType
{
    /** @var bool */
    public $posteRestante;
    /** @var \wartoscType */
    public $wartosc;
    /** @var \iloscPotwierdzenOdbioruType */
    public $iloscPotwierdzenOdbioru;
    /** @var \kategoriaType */
    public $kategoria;
    /** @var \formatType */
    public $format;
    /** @var \masaType */
    public $masa;
    /** @var string */
    public $numerWewnetrznyPrzesylki;
    /** @var bool */
    public $egzemplarzBiblioteczny;
    /** @var bool */
    public $dlaOciemnialych;
}
