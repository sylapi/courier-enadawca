<?php

class przesylkaPoleconaKrajowaType extends przesylkaRejestrowanaType
{
    /** @var \EPOType */
    public $epo;
    /** @var \zasadySpecjalneEnum */
    public $zasadySpecjalne;
    /** @var bool */
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
    /** @var bool */
    public $egzemplarzBiblioteczny;
    /** @var bool */
    public $dlaOciemnialych;
    /** @var bool */
    public $obszarMiasto;
    /** @var bool */
    public $miejscowa;
}
