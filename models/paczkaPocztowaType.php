<?php

class paczkaPocztowaType extends przesylkaRejestrowanaType
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
    /** @var \masaType */
    public $masa;
    /** @var \wartoscType */
    public $wartosc;
    /** @var bool */
    public $zwrotDoslanie;
    /** @var bool */
    public $egzemplarzBiblioteczny;
    /** @var bool */
    public $dlaOciemnialych;
}
