<?php


require __DIR__ . '/vendor/autoload.php';
use Bosta\Bosta;
use Bosta\Utils\Receiver;
use Bosta\Utils\DropOffAddress;

$bosta = new Bosta(getenv("API_KEY"), getenv("BASE_URL"));


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
