<?php

class paczkaPocztowaPLUSType extends przesylkaRejestrowanaType
{
    /** @var bool */
    public $posteRestante;
    /** @var \iloscPotwierdzenOdbioruType */
    public $iloscPotwierdzenOdbioru;
    /** @var \kategoriaType */
    public $kategoria;
    /** @var \gabarytType */
    public $gabaryt;
    /** @var \wartoscType */
    public $wartosc;
    /** @var \masaType */
    public $masa;
    /** @var bool */
    public $zwrotDoslanie;
}
