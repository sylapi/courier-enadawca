<?php

use Sylapi\Courier\CourierFactory;

$courier = CourierFactory::create('Enadawca', [
    'login'             => 'mylogin',
    'password'          => 'mypassword',
    'sandbox'           => true,
    'packageSize'       => 'XS', //Default: XXL
    'labelType'         => 'ADDRESS_LABEL', //Default: ADDRESS_LABEL
    'labelMethod'       => 'EACH_PARCEL_SEPARATELY', //Default: EACH_PARCEL_SEPARATELY
    'carefully'         => true,
    'insurance_type'    => 'STANDARD',
    'insurance_amount'  => 500000, //Kwota w groszach
    'cod'               => true,
    'cod_amount'        => 2000, //Kwota w groszach
    'cod_title'         => 'Tytuł przelewu',
    'cod_method'        => 'RACHUNEK_BANKOWY',
    'bank_number'       => '1111111111111111111111111',
]);

/**
 * GetStatus.
 */
try {
    $response = $courier->getStatus('123456');
    if ($response->hasErrors()) {
        var_dump($response->getFirstError()->getMessage());
    } else {
        var_dump((string) $response);
    }
} catch (\Exception $e) {
    var_dump($e->getMessage());
}
