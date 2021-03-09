<?php

use Sylapi\Courier\CourierFactory;

$courier = CourierFactory::create('Enadawca', [
    'login'             => 'mylogin',
    'password'          => 'mypassword',
    'sandbox'           => true,
    'packageSize'       => 'XS', //Default: XXL
    'labelType'         => 'ADDRESS_LABEL', //Default: ADDRESS_LABEL
    'labelMethod'       => 'EACH_PARCEL_SEPARATELY', //Default: EACH_PARCEL_SEPARATELY
]);

/**
 * GetLabel.
 */
try {
    $response = $courier->getLabel('123456');
    if ($response->hasErrors()) {
        var_dump($response->getFirstError()->getMessage());
    } else {
        var_dump((string) $response);
    }
} catch (\Exception $e) {
    var_dump($e->getMessage());
}
