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
    /** @var boolean */
    public $ostroznie;
    /** @var \opakowaniePocztowaType */
    public $opakowanie;
    /** @var boolean */
    public $ponadgabaryt;
    /** @var string */
    public $numerPrzesylkiKlienta;
    /** @var \gabarytType */
    public $gabaryt;
}