<?php

class AglobalExpresType extends przesylkaRejestrowanaType
{
    /** @var \ubezpieczenieType */
    public $ubezpieczenie;
    /** @var \potwierdzenieDoreczeniaType */
    public $potwierdzenieDoreczenia;
    /** @var \masaType */
    public $masa;
    /** @var bool */
    public $posteRestante;
    /** @var string */
    public $zawartosc;
    /** @var \kategoriaType */
    public $kategoria;
    /** @var string */
    public $numerPrzesylkiKlienta;
}
