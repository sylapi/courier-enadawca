<?php

class przesylkaPaletowaType extends przesylkaRejestrowanaType
{
    /** @var \adresType */
    public $miejsceOdbioru;
    /** @var \adresType */
    public $miejsceDoreczenia;
    /** @var \paletaType */
    public $paleta;
    /** @var \platnikType */
    public $platnik;
    /** @var \pobranieType */
    public $pobranie;
    /** @var \subPrzesylkaPaletowaType */
    public $subPaleta;
    /** @var \daneSentType */
    public $daneSent;
    /** @var \awizacjaType */
    public $awizacja;
    /** @var string */
    public $zawartosc;
    /** @var \masaType */
    public $masa;
    /** @var \date */
    public $dataZaladunku;
    /** @var \date */
    public $dataDostawy;
    /** @var \wartoscType */
    public $wartosc;
    /** @var int */
    public $iloscZwracanychPaletEUR;
    /** @var string */
    public $zalaczonaFV;
    /** @var string */
    public $zalaczonyWZ;
    /** @var string */
    public $zalaczoneInne;
    /** @var string */
    public $zwracanaFV;
    /** @var string */
    public $zwracanyWZ;
    /** @var string */
    public $zwracaneInne;
    /** @var string */
    public $powiadomienieNadawcy;
    /** @var \eSposobPowiadomieniaType */
    public $powiadomienieOdbiorcy;
    /** @var bool */
    public $dostawaWSobote;
    /** @var bool */
    public $przygotowanieDokumentowPrzewozowych;
    /** @var bool */
    public $dostawaSamochodemDedykowanym;
    /** @var bool */
    public $zmianaDanychAdresowych;
    /** @var bool */
    public $ustalenieTerminuDostawy;
    /** @var bool */
    public $samochodZWinda;
    /** @var bool */
    public $zabranieOpakowania;
    /** @var bool */
    public $wniesienie;
    /** @var bool */
    public $awizoSMS;
}
