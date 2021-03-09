<?php



class przesylkaPobraniowaType extends przesylkaRejestrowanaType
{
    /** @var \pobranieType */
    public $pobranie;
    /** @var boolean */
    public $posteRestante;
    /** @var \iloscPotwierdzenOdbioruType */
    public $iloscPotwierdzenOdbioru;
    /** @var \kategoriaType */
    public $kategoria;
    /** @var \gabarytType */
    public $gabaryt;
    /** @var boolean */
    public $ostroznie;
    /** @var \wartoscType */
    public $wartosc;
    /** @var \masaType */
    public $masa;
}
