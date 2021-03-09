<?php



class EMSType extends przesylkaRejestrowanaType
{
    /** @var \ubezpieczenieType */
    public $ubezpieczenie;
    /** @var \deklaracjaCelnaType */
    public $deklaracjaCelna;
    /** @var \EMSTypOpakowaniaType */
    public $typOpakowania;
    /** @var \masaType */
    public $masa;
    /** @var boolean */
    public $zalaczoneDokumenty;
}
