<?php

class subPrzesylkaBiznesowaType extends przesylkaType
{
    /** @var \ubezpieczenieType */
    public $ubezpieczenie;
    /** @var \numerNadaniaType */
    public $numerNadania;
    /** @var \masaType */
    public $masa;
    /** @var \gabarytBiznesowaType */
    public $gabaryt;
    /** @var \wartoscType */
    public $wartosc;
    /** @var bool */
    public $ostroznie;
}
