<?php

class paczkaZagranicznaType extends przesylkaRejestrowanaType
{
    /** @var \zwrotType */
    public $zwrot;
    /** @var \deklaracjaCelnaType */
    public $deklaracjaCelna;
    /** @var bool */
    public $posteRestante;
    /** @var \masaType */
    public $masa;
    /** @var \wartoscType */
    public $wartosc;
    /** @var \kategoriaType */
    public $kategoria;
    /** @var \iloscPotwierdzenOdbioruType */
    public $iloscPotwierdzenOdbioru;
    /** @var bool */
    public $utrudnionaManipulacja;
    /** @var bool */
    public $ekspres;
    /** @var string */
    public $numerReferencyjnyCelny;
}
