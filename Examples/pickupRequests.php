<?php


require __DIR__ . '/vendor/autoload.php';
use Bosta\Bosta;
use Bosta\Utils\ContactPerson;

$bosta = new Bosta(getenv("API_KEY"), getenv("BASE_URL"));

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
