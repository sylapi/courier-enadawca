<?php



class paczkaZagranicznaType extends przesylkaRejestrowanaType
{
    /** @var \zwrotType */
    public $zwrot;
    /** @var \deklaracjaCelnaType */
    public $deklaracjaCelna;
    /** @var boolean */
    public $posteRestante;
    /** @var \masaType */
    public $masa;
    /** @var \wartoscType */
    public $wartosc;
    /** @var \kategoriaType */
    public $kategoria;
    /** @var \iloscPotwierdzenOdbioruType */
    public $iloscPotwierdzenOdbioru;
    /** @var boolean */
    public $utrudnionaManipulacja;
    /** @var boolean */
    public $ekspres;
    /** @var string */
    public $numerReferencyjnyCelny;
}
