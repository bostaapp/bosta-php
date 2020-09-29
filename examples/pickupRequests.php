<?php


require __DIR__ . '/vendor/autoload.php';
use Bosta\Bosta;
use Bosta\Utils\ContactPerson;

$bosta = new Bosta(getenv("API_KEY"), getenv("BASE_URL"));

/**
 * List pickups with pageNumber=0
 */
try {
    $list = $bosta->pickup->list(0);
    echo "list: \n";
    var_dump($list);
    echo "------------------------------------------";
} catch (Exception $e) {
    echo 'Caught exception: ',  $e->getMessage(), "\n";
}

/**
 * Get pickup with id=070000000386
 */
try {
    $get = $bosta->pickup->get('070000000386');
    echo "get: \n";
    var_dump($get);
    echo "------------------------------------------";
} catch (Exception $e) {
    echo 'Caught exception: ',  $e->getMessage(), "\n";
}

/**
 * Delete pickup with id=070000000386
 */
try {
    $delete = $bosta->pickup->delete('070000000386');
    echo "delete: \n";
    var_dump($delete);
    echo "------------------------------------------";
} catch (Exception $e) {
    echo 'Caught exception: ',  $e->getMessage(), "\n";
}

/**
 * Create contactPerson instance
 */
$contactPerson = new ContactPerson("aliaa123", "01209847552", 'test@test.com');

/**
 * Create pickup request
 */
try {
    $create = $bosta->pickup->create('2020-09-30', '10:00 to 13:00', $contactPerson, 'SkIvXQn_a', '', 0);
    echo "create: \n";
    var_dump($create);
    echo "------------------------------------------";
} catch (Exception $e) {
    echo 'Caught exception: ',  $e->getMessage(), "\n";
}

/**
 * Update pickup request
 */
try {
    $update = $bosta->pickup->update('070000000386', '2020-09-29', '10:00 to 13:00', $contactPerson, 'SkIvXQn_a', '', 0);
    echo "update: \n";
    var_dump($update);
    echo "------------------------------------------";
} catch (Exception $e) {
    echo 'Caught exception: ',  $e->getMessage(), "\n";
}
