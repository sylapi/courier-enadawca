<?php

class subPrzesylkaBiznesowaPlusType extends przesylkaType
{
    /** @var \pobranieType */
    public $pobranie;
    /** @var \numerNadaniaType */
    public $numerNadania;
    /** @var \masaType */
    public $masa;
    /** @var \gabarytBiznesowaType */
    public $gabaryt;
    /** @var \wartoscType */
    public $wartosc;
    /** @var bool */
    public $ostroznie;
    /** @var string */
    public $numerPrzesylkiKlienta;
    /** @var int */
    public $kwotaTranzakcji;
    /** @var \numerTransakcjiOdbioruType */
    public $numerTransakcjiOdbioru;
}
