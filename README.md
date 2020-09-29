# Bosta PHP SDK

This repository contains the open source PHP SDK for integrating Bosta's APIs into your PHP application.

## Table of Contents

- [APIs Documentation](#apis-documentation)
- [Installation](#installation)
- [Usages](#usages)
- [Contribution](#contribution)
- [License](#license)`

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

    try {
        $list = $bosta->pickup->list(0);
        var_dump($list);
    } catch (Exception $e) {
        echo 'Caught exception: ',  $e->getMessage(), "\n";
    }

    try {
        $get = $bosta->pickup->get('070000000386');
        var_dump($get);
    } catch (Exception $e) {
        echo 'Caught exception: ',  $e->getMessage(), "\n";
    }

    try {
        $delete = $bosta->pickup->delete('070000000386');
        var_dump($delete);
    } catch (Exception $e) {
        echo 'Caught exception: ',  $e->getMessage(), "\n";
    }


    $contactPerson = new ContactPerson("aliaa123", "01209847552", 'test@test.com');
    try {
        $create = $bosta->pickup->create('2020-09-30', '10:00 to 13:00', $contactPerson, 'SkIvXQn_a', '', 0);
        var_dump($create);
    } catch (Exception $e) {
        echo 'Caught exception: ',  $e->getMessage(), "\n";
    }

    try {
        $update = $bosta->pickup->update('070000000386', '2020-09-29', '10:00 to 13:00', $contactPerson, 'SkIvXQn_a', '', 0);
        var_dump($update);
    } catch (Exception $e) {
        echo 'Caught exception: ',  $e->getMessage(), "\n";
    }
    ```

- Delivery Client
    ``` php
    use Bosta\Utils\Receiver;
    use Bosta\Utils\DropOffAddress;

    try {
        $list = $bosta->delivery->list(0);
        var_dump($list);
    } catch (Exception $e) {
        echo 'Caught exception: ',  $e->getMessage(), "\n";
    }

    try {
        $get = $bosta->delivery->get('3082253');
        var_dump($get);
    } catch (Exception $e) {
        echo 'Caught exception: ',  $e->getMessage(), "\n";
    }

    try {
        $delete = $bosta->delivery->delete('cZTghcUW6E');
        var_dump($delete);
    } catch (Exception $e) {
        echo 'Caught exception: ',  $e->getMessage(), "\n";
    }

    $receiver = new Receiver("BostaDevTeam", "lastname", '01025810012');
    $dropOffAddress = new DropOffAddress(1, "firstLine", "EG-05", 'Dakahlia');
    try {
        $create = $bosta->delivery->create(10, $dropOffAddress, $receiver, '', 0);
        var_dump($create);
    } catch (Exception $e) {
        echo 'Caught exception: ',  $e->getMessage(), "\n";
    }

    $receiver = new Receiver("BostaDevTeam", "lastname", '01025810012');
    $dropOffAddress = new DropOffAddress(1, "firstLine", "EG-05", 'Dakahlia');
    try {
        $update = $bosta->delivery->update('Dsu5bShCHK', $dropOffAddress, $receiver, '', 0);
        var_dump($update);
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
