<?php


require __DIR__ . '/vendor/autoload.php';
use Bosta\Bosta;
use Bosta\Utils\Receiver;
use Bosta\Utils\DropOffAddress;

$bosta = new Bosta(getenv("API_KEY"), getenv("BASE_URL"));

/**
 * List delivery with pageNumber=0
 */
try {
    $list = $bosta->delivery->list(0);
    echo "list: \n";
    var_dump($list);
    echo "------------------------------------------";
} catch (Exception $e) {
    echo 'Caught exception: ',  $e->getMessage(), "\n";
}

/**
 * Get delivery with trackingNumber=3082253
 */
try {
    $get = $bosta->delivery->get('3082253');
    echo "get: \n";
    var_dump($get);
    echo "------------------------------------------";
} catch (Exception $e) {
    echo 'Caught exception: ',  $e->getMessage(), "\n";
}

/**
 * Delete delivery with id=cZTghcUW6E
 */
try {
    $delete = $bosta->delivery->delete('cZTghcUW6E');
    echo "delete: \n";
    var_dump($delete);
    echo "------------------------------------------";
} catch (Exception $e) {
    echo 'Caught exception: ',  $e->getMessage(), "\n";
}

/**
 * Create receiver instance
 */
$receiver = new Receiver("BostaDevTeam", "lastname", '01025810012');

/**
 * Create dropOffAddress instance
 */
$dropOffAddress = new DropOffAddress(1, "firstLine", "EG-05", 'Dakahlia');
try {
    $create = $bosta->delivery->create(10, $dropOffAddress, $receiver, '', 0);
    echo "create: \n";
    var_dump($create);
    echo "------------------------------------------";
} catch (Exception $e) {
    echo 'Caught exception: ',  $e->getMessage(), "\n";
}

/**
 * Create receiver instance for update
 */
$receiver = new Receiver("BostaDevTeam", "lastname", '01025810012');

/**
 * Create dropOffAddress instance for update
 */
$dropOffAddress = new DropOffAddress(1, "firstLine", "EG-05", 'Dakahlia');

/**
 * Update delivery with id=Dsu5bShCHK
 */
try {
    $update = $bosta->delivery->update('Dsu5bShCHK', $dropOffAddress, $receiver, '', 0);
    echo "update: \n";
    var_dump($update);
    echo "------------------------------------------";
} catch (Exception $e) {
    echo 'Caught exception: ',  $e->getMessage(), "\n";
}
