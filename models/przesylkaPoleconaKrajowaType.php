<?php



class przesylkaPoleconaKrajowaType extends przesylkaRejestrowanaType
{
    /** @var \EPOType */
    public $epo;
    /** @var \zasadySpecjalneEnum */
    public $zasadySpecjalne;
    /** @var boolean */
    public $posteRestante;
    /** @var \iloscPotwierdzenOdbioruType */
    public $iloscPotwierdzenOdbioru;
    /** @var \kategoriaType */
    public $kategoria;
    /** @var \gabarytType */
    public $gabaryt;
    /** @var \formatType */
    public $format;
    /** @var \masaType */
    public $masa;
    /** @var boolean */
    public $egzemplarzBiblioteczny;
    /** @var boolean */
    public $dlaOciemnialych;
    /** @var boolean */
    public $obszarMiasto;
    /** @var boolean */
    public $miejscowa;
}
