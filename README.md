# Courier-enadawca

![StyleCI](https://github.styleci.io/repos/240472903/shield?style=flat&style=flat) ![PHPStan](https://img.shields.io/badge/PHPStan-level%205-brightgreen.svg?style=flat) [![Build](https://github.com/sylapi/courier-enadawca/actions/workflows/build.yaml/badge.svg?event=push)](https://github.com/sylapi/courier-enadawca/actions/workflows/build.yaml) [![codecov.io](https://codecov.io/github/sylapi/courier-enadawca/coverage.svg)](https://codecov.io/github/sylapi/courier-enadawca/)

## Methody

## Init

```php
    /**
    * @return Sylapi\Courier\Courier
    */
    $courier = CourierFactory::create('Enadawca', [
        'login'             => 'mylogin',
        'password'          => 'mypassword',
        'sandbox'           => true,
        'postOfficeNumber'  => 123456,
        'packageSize'       => 'XS', //Default: XXL
        'labelType'         => 'ADDRESS_LABEL', //Default: ADDRESS_LABEL
        'labelMethod'       => 'EACH_PARCEL_SEPARATELY', //Default: EACH_PARCEL_SEPARATELY
        'carefully'         => true,
        'insurance_type'    => 'STANDARD',
        'insurance_amount'  =>  500000, //Kwota w groszach
        'cod'               => true,
        'cod_amount'        => 2000, //Kwota w groszach
        'cod_title'         => 'Tytuł przelewu',
        'cod_method'        => 'RACHUNEK_BANKOWY',
        'bank_number'       => '11111111111111111111111111',
    ]);
```

## CreateShipment

```php
    $sender = $courier->makeSender();
    $sender->setFullName('Nazwa Firmy/Nadawca')
        ->setStreet('Ulica')
        ->setHouseNumber('2a')
        ->setApartmentNumber('1')
        ->setCity('Miasto')
        ->setZipCode('66100')
        ->setCountry('Poland')
        ->setCountryCode('pl')
        ->setContactPerson('Jan Kowalski')
        ->setEmail('my@email.com')
        ->setPhone('48500600700')


    $receiver = $courier->makeReceiver();

    $receiver->setFirstName('Jan')
        ->setSurname('Nowak')
        ->setStreet('Ulica')
        ->setHouseNumber('2a')
        ->setApartmentNumber('1')
        ->setCity('Miasto')
        ->setZipCode('66100')
        ->setCountry('Poland')
        ->setCountryCode('pl')
        ->setContactPerson('Jan Kowalski')
        ->setEmail('my@email.com')
        ->setPhone('48500600700')

    $parcel = $courier->makeParcel();
    $parcel->setWeight(1.5);

    $shipment = $courier->makeShipment();
    $shipment->setSender($sender)
        ->setReceiver($receiver);
        ->setParcel($parcel);
        ->setContent('Zawartość przesyłki')


    try {
        $response = $courier->createShipment($shipment);
        if ($response->hasErrors()) {
            var_dump($response->getFirstError()->getMessage());
        } else {
            var_dump($response->referenceId); // Utworzony wewnetrzny idetyfikator zamowienia
            var_dump($response->shipmentId); // Zewnetrzny idetyfikator zamowienia
            var_dump($response->trackingId); // Zewnetrzny idetyfikator sledzenia przesylki
        }
    } catch (\Exception $e) {
        var_dump($e->getMessage());
    }
```

## PostShipment

```php
    /**
     * Init Courier
     */

    $booking = $courier->makeBooking();
    $booking->setShipmentId('123456');

    try {
        $response = $courier->postShipment($booking);
        if ($response->hasErrors()) {
            var_dump($response->getFirstError()->getMessage());
        } else {
            var_dump($response->shipmentId); // Zewnetrzny idetyfikator zamowienia
            var_dump($response->trackingId); // Zewnetrzny idetyfikator sledzenia przesylki
        }
    } catch (\Exception $e) {
        var_dump($e->getMessage());
    }
```

## GetLabel

```php
    /**
     * Init Courier
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
```

## GetStatus

```php
    /**
     * Init Courier
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
```