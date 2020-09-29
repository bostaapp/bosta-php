# bosta-php

This repository contains A PHP SDK for Bosta APIs integration.

## Table of Contents

- [Integration Scope](#integration-scope)
  - [Pickups](#pickups-scope)
  - [Deliveries](#deliveries-scope)
- [Classes](#classes)
  - [Common Classes](#common-classes)
- [API Documentation](#api-documentation)
- [Installation](#installation)
- [Usages](#usages)
- [Contribution](#contribution)
- [License](#license)

## Integration Scope

### Pickups Scope

- Create pickup
  - Endpoint: `POST /api/v1/pickups`.
  - Release version: `v1.0.0`.
  - [Swagger Doc](https://app.bosta.co/docs/#/Pickup%20Requests/post_pickups).
- Update pickup
  - Endpoint: `PUT /api/v1/pickups/{id}`.
  - Release version: `v1.0.0`.
  - [Swagger Doc](https://app.bosta.co/docs/#/Pickup%20Requests/put_pickups__id_).
- Delete pickup
  - Endpoint: `DELETE /api/v1/pickups/{id}`.
  - Release version: `v1.0.0`.
  - [Swagger Doc](https://app.bosta.co/docs/#/Pickup%20Requests/delete_pickups__id_).
- Get pickup details
  - Endpoint: `GET /api/v1/pickups/{id}`.
  - Release version: `v1.0.0`.
  - [Swagger Doc](https://app.bosta.co/docs/#/Pickup%20Requests/get_pickups__id_).
- List pickups
  - Endpoint: `GET /api/v1/pickups`.
  - Release version: `v1.0.0`.
  - [Swagger Doc](https://app.bosta.co/docs/#/Pickup%20Requests/get_pickups).

### Deliveries Scope

- Create delivery
  - Endpoint: `POST /api/v1/deliveries`.
  - Release version: `v1.0.0`.
  - [Swagger Doc](https://app.bosta.co/docs/#/Deliveries/post_deliveries).
- Update delivery
  - Endpoint: `PATCH /api/v1/deliveries/{id}`.
  - Release version: `v1.0.0`.
  - [Swagger Doc](https://app.bosta.co/docs/#/Deliveries/patch_deliveries__id_).
- Terminate delivery
  - Endpoint: `DELETE /api/v1/deliveries/{id}`.
  - Release version: `v1.0.0`.
  - [Swagger Doc](https://app.bosta.co/docs/#/Deliveries/delete_deliveries__id_).
- Get delivery details
  - Endpoint: `GET /api/v1/deliveries/{id}`.
  - [Swagger Doc](https://app.bosta.co/docs/#/Deliveries/get_deliveries__id_).
  - Release version: `v1.0.0`.
- Print AWB
  - Endpoint: `GET /api/v1/deliveries/awb/{id}`.
  - Release version: `v1.0.0`.
  - [Swagger Doc](https://app.bosta.co/docs/#/Deliveries/get_deliveries_awb__id_).
- Track delivery
  - Endpoint: `GET /api/v1/deliveries/track/{id}`.
  - Release version: `v1.0.0`.
  - Swagger Doc: NIY.
- List deliveries
  - Endpoint: `GET /api/v1/deliveries`.
  - Release version: `v1.0.0`.
  - [Swagger Doc](https://app.bosta.co/docs/#/Deliveries/get_deliveries).

## Classes

### Common Classes

- `Bosta`
- `DropOffAddress`
- `ContactPerson`
- `Receiver`

## API Documentation
- [Staging](https://stg-app.bosta.co/docs).
- [Production](https://app.bosta.co/docs).

## Installation
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
- [CONTRIBUTING](CONTRIBUTING.md) 
- [CODE_OF_CONDUCT](CODE_OF_CONDUCT.md)

## License
The MIT License (MIT) [License](LICENSE).