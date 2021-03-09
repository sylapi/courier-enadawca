<?php

class przesylkaFirmowaPoleconaType extends przesylkaRejestrowanaType
{
    /** @var \EPOType */
    public $epo;
    /** @var \zasadySpecjalneEnum */
    public $zasadySpecjalne;
    /** @var bool */
    public $posteRestante;
    /** @var \iloscPotwierdzenOdbioruType */
    public $iloscPotwierdzenOdbioru;
    /** @var \masaType */
    public $masa;
    /** @var bool */
    public $miejscowa;
    /** @var bool */
    public $obszarMiasto;
    /** @var \kategoriaType */
    public $kategoria;
    /** @var \gabarytType */
    public $gabaryt;
}
