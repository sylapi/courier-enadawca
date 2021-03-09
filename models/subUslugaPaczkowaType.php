<?php

class subUslugaPaczkowaType extends przesylkaType
{
    /** @var \pobranieType */
    public $pobranie;
    /** @var \ubezpieczenieType */
    public $ubezpieczenie;
    /** @var \numerNadaniaType */
    public $numerNadania;
    /** @var \masaType */
    public $masa;
    /** @var \wartoscType */
    public $wartosc;
    /** @var bool */
    public $ostroznie;
    /** @var \opakowaniePocztowaType */
    public $opakowanie;
    /** @var bool */
    public $ponadgabaryt;
    /** @var string */
    public $numerPrzesylkiKlienta;
    /** @var \gabarytType */
    public $gabaryt;
}
