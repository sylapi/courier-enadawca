<?php



class przesylkaFirmowaPoleconaType extends przesylkaRejestrowanaType
{
    /** @var \EPOType */
    public $epo;
    /** @var \zasadySpecjalneEnum */
    public $zasadySpecjalne;
    /** @var boolean */
    public $posteRestante;
    /** @var \iloscPotwierdzenOdbioruType */
    public $iloscPotwierdzenOdbioru;
    /** @var \masaType */
    public $masa;
    /** @var boolean */
    public $miejscowa;
    /** @var boolean */
    public $obszarMiasto;
    /** @var \kategoriaType */
    public $kategoria;
    /** @var \gabarytType */
    public $gabaryt;
}
