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
    /** @var boolean */
    public $dostawaWSobote;
    /** @var boolean */
    public $przygotowanieDokumentowPrzewozowych;
    /** @var boolean */
    public $dostawaSamochodemDedykowanym;
    /** @var boolean */
    public $zmianaDanychAdresowych;
    /** @var boolean */
    public $ustalenieTerminuDostawy;
    /** @var boolean */
    public $samochodZWinda;
    /** @var boolean */
    public $zabranieOpakowania;
    /** @var boolean */
    public $wniesienie;
    /** @var boolean */
    public $awizoSMS;
}
