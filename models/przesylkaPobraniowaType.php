<?php

class przesylkaPobraniowaType extends przesylkaRejestrowanaType
{
    /** @var \pobranieType */
    public $pobranie;
    /** @var bool */
    public $posteRestante;
    /** @var \iloscPotwierdzenOdbioruType */
    public $iloscPotwierdzenOdbioru;
    /** @var \kategoriaType */
    public $kategoria;
    /** @var \gabarytType */
    public $gabaryt;
    /** @var bool */
    public $ostroznie;
    /** @var \wartoscType */
    public $wartosc;
    /** @var \masaType */
    public $masa;
}
