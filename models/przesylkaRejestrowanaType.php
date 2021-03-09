<?php



class przesylkaRejestrowanaType extends przesylkaType
{
    /** @var \adresType */
    public $adres;
    /** @var \adresType */
    public $nadawca;
    /** @var \relatedToAllegroType */
    public $relatedToAllegro;
    /** @var \numerNadaniaType */
    public $numerNadania;
    /** @var \sygnaturaType */
    public $sygnatura;
    /** @var \terminType */
    public $terminSprawy;
    /** @var \rodzajType */
    public $rodzaj;
}
