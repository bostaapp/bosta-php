# Bosta PHP SDK

This repository contains the open source PHP SDK for integrating Bosta's APIs into your PHP application.

## Table of Contents

- [APIs Documentation](#apis-documentation)
- [Installation](#installation)
- [Usages](#usages)
- [Contribution](#contribution)
- [License](#license)

## APIs Documentation

- [Staging](https://stg-app.bosta.co/docs) APIs swagger documentation.
- [Production](https://app.bosta.co/docs) APIs swagger documentation.

## Installation

You can install the package via [Composer](https://getcomposer.org/). Run the following command:

``` bash
$ composer require bosta/bosta-sdk
```

## Usages

- Environment Variable Config
    ``` php
    $stgBaseUrl = 'https://stg-app.bosta.co';
    $prodBaseUrl = 'https://app.bosta.co';
    
    putenv("API_KEY=$your api key");
    putenv("BASE_URL=$your base url");
    ```

- Bosta Client
    ``` php
    require __DIR__ . '/vendor/autoload.php';
    use Bosta\Bosta;
    $bosta = new Bosta(getenv("API_KEY"), getenv("BASE_URL"));
    ```

- Pickup Client
    ``` php
    use Bosta\Utils\ContactPerson;

    /**
    * List Pickup Request
    *
    * @param int $pageNumber = 0
    * @return \stdClass
    */
    try {
        $list = $bosta->pickup->list(0);
        echo "list: \n";
        var_dump($list);
        echo "------------------------------------------ \n";
    } catch (Exception $e) {
        echo 'Caught exception: ',  $e->getMessage(), "\n";
    }

    /**
    * Get Pickup Request
    *
    * @param string $pickupRequestId = 070000000386
    * @return \stdClass
    */
    try {
        $get = $bosta->pickup->get('070000000386');
        echo "get: \n";
        var_dump($get);
        echo "------------------------------------------ \n";
    } catch (Exception $e) {
        echo 'Caught exception: ',  $e->getMessage(), "\n";
    }

    /**
    * Delete Pickup Request
    *
    * @param string $pickupRequestId = 070000000386
    * @return string
    */
    try {
        $delete = $bosta->pickup->delete('070000000386');
        echo "delete: \n";
        var_dump($delete);
        echo "------------------------------------------ \n";
    } catch (Exception $e) {
        echo 'Caught exception: ',  $e->getMessage(), "\n";
    }

    /**
    * Create ContactPerson Instance
    *
    * @param string $name = aliaa123
    * @param string $phone = 01209847552
    * @param string $email = test@test.com
    */
    $contactPerson = new ContactPerson("aliaa123", "01209847552", 'test@test.com');

    /**
    * Get Pickup Locations to use its id in create pickup Request
    */
    try {
        $listPickupLocations = $bosta->pickupLocation->list();
        echo "listPickupLocations: \n";
        var_dump($listPickupLocations);
        echo "------------------------------------------ \n";
    } catch (Exception $e) {
        echo 'Caught exception: ',  $e->getMessage(), "\n";
    }

    /**
    * Create Pickup Request
    *
    * @param string $scheduledDate = 2020-09-30 (YYYY-MM-DD)
    * @param string $scheduledTimeSlot = 10:00 to 13:00 || 13:00 to 16:00
    * @param \Bosta\Utils\ContactPerson $contactPerson
    * @param string $businessLocationId = SkIvXQn_a
    * @param string $notes = ''
    * @param int $noOfPackages = 0
    * @return \stdClass
    */
    try {
        $create = $bosta->pickup->create('2020-09-30', '10:00 to 13:00', $contactPerson, 'SkIvXQn_a', '', 0);
        echo "create: \n";
        var_dump($create);
        echo "------------------------------------------ \n";
    } catch (Exception $e) {
        echo 'Caught exception: ',  $e->getMessage(), "\n";
    }


    /**
    * Update Pickup Request
    *
    * @param string $pickupRequestId = 070000000386
    * @param string $scheduledDate = 2020-09-29 (YYYY-MM-DD)
    * @param string $scheduledTimeSlot = 10:00 to 13:00 || 13:00 to 16:00
    * @param \Bosta\Utils\ContactPerson $contactPerson
    * @param string $businessLocationId = SkIvXQn_a
    * @param string $notes = ''
    * @param int $noOfPackages = 0
    * @return string
    */
    try {
        $update = $bosta->pickup->update('070000000386', '2020-09-29', '10:00 to 13:00', $contactPerson, 'SkIvXQn_a', '', 0);
        echo "update: \n";
        var_dump($update);
        echo "------------------------------------------ \n";
    } catch (Exception $e) {
        echo 'Caught exception: ',  $e->getMessage(), "\n";
    }
    ```

- Delivery Client
    ``` php
    use Bosta\Utils\Receiver;
    use Bosta\Utils\DropOffAddress;

    /**
    * List Deliveries
    *
    * @param int $pageNumber = 0
    * @param int $pageLimit = 50
    * @return \stdClass
    */
    try {
        $list = $bosta->delivery->list(0, 50);
        echo "list: \n";
        var_dump($list);
        echo "------------------------------------------ \n";
    } catch (Exception $e) {
        echo 'Caught exception: ',  $e->getMessage(), "\n";
    }

    /**
    * get Delivery
    *
    * @param string $trackingNumber = 3082253
    * @return \stdClass
    */
    try {
        $get = $bosta->delivery->get('3082253');
        echo "get: \n";
        var_dump($get);
        echo "------------------------------------------ \n";
    } catch (Exception $e) {
        echo 'Caught exception: ',  $e->getMessage(), "\n";
    }

    /**
    * Delete Delivery
    *
    * @param string $deliveryId = cZTghcUW6E
    * @return void
    */
    try {
        $delete = $bosta->delivery->delete('cZTghcUW6E');
        echo "delete: \n";
        var_dump($delete);
        echo "------------------------------------------ \n";
    } catch (Exception $e) {
        echo 'Caught exception: ',  $e->getMessage(), "\n";
    }

    /**
    * Create Receiver Instance
    *
    * @param string $firstName = BostaDevTeam
    * @param string $lastName = lastname
    * @param string $phone = 01025810012
    */
    $receiver = new Receiver("BostaDevTeam", "lastname", '01025810012');

    /**
    * Create DropOffAddress Instance
    *
    * @param int $buildingNumber = 1
    * @param string $firstLine = firstLine
    * @param string $city = EG-05
    * @param string $zone = Dakahlia
    */
    $dropOffAddress = new DropOffAddress(1, "firstLine", "EG-05", 'Dakahlia');

    /**
    * Create Delivery
    *
    * @param int $type = 10
    * @param \Bosta\Utils\DropOffAddress $dropOffAddress
    * @param \Bosta\Utils\Receiver $receiver
    * @param string $notes = ''
    * @param int $cod = 0
    * @return \stdClass
    */
    try {
        $create = $bosta->delivery->create(10, $dropOffAddress, $receiver, '', 0);
        echo "create: \n";
        var_dump($create);
        echo "------------------------------------------ \n";
    } catch (Exception $e) {
        echo 'Caught exception: ',  $e->getMessage(), "\n";
    }

    /**
    * Create Receiver Instance
    *
    * @param string $firstName = BostaDevTeam
    * @param string $lastName = lastname
    * @param string $phone = 01025810012
    */
    $receiver = new Receiver("BostaDevTeam", "lastname", '01025810012');

    /**
    * Create DropOffAddress Instance
    *
    * @param int $buildingNumber = 1
    * @param string $firstLine = firstLine
    * @param string $city = EG-05
    * @param string $zone = Dakahlia
    */
    $dropOffAddress = new DropOffAddress(1, "firstLine", "EG-05", 'Dakahlia');

    /**
    * Update Delivery
    *
    * @param string $deliveryId = Dsu5bShCHK
    * @param \Bosta\Utils\DropOffAddress $dropOffAddress
    * @param \Bosta\Utils\Receiver $receiver
    * @param string $notes = ''
    * @param int $cod = 10
    * @return string
    */
    try {
        $update = $bosta->delivery->update('Dsu5bShCHK', $dropOffAddress, $receiver, '', 10);
        echo "update: \n";
        var_dump($update);
        echo "------------------------------------------ \n";
    } catch (Exception $e) {
        echo 'Caught exception: ',  $e->getMessage(), "\n";
    }
    ```

## Contribution

We are open to, and grateful for, any contributions made by the community.
By contributing to Bosta, you agree to abide by the code of conduct.
- [Contributing Guide](CONTRIBUTING.md) 
- [Code of Conduct](CODE_OF_CONDUCT.md)

## License

The MIT License (MIT) [License](LICENSE).
