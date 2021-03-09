<?php

class AdoreczeniePrzesylkiType
{
    /** @var dateTime */
    public $data;
    /** @var string */
    public $osobaOdbierajaca;
    /** @var \podmiotDoreczeniaEnum */
    public $podmiotDoreczenia;
    /** @var \date */
    public $dataPelnomocnictwa;
    /** @var string */
    public $numerPelnomocnictwa;
    /** @var bool */
    public $pieczecFirmowa;
    /** @var \miejscePozostawieniaZawiadomieniaODoreczeniuEnum */
    public $miejscePozostawieniaZawiadomieniaODoreczeniu;
}
