<?php



class paczkaPocztowaType extends przesylkaRejestrowanaType
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
    /** @var \masaType */
    public $masa;
    /** @var \wartoscType */
    public $wartosc;
    /** @var boolean */
    public $zwrotDoslanie;
    /** @var boolean */
    public $egzemplarzBiblioteczny;
    /** @var boolean */
    public $dlaOciemnialych;
}
