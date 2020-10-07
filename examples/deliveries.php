<?php


require __DIR__ . '/vendor/autoload.php';
use Bosta\Bosta;
use Bosta\Utils\Receiver;
use Bosta\Utils\DropOffAddress;

$bosta = new Bosta(getenv("API_KEY"), getenv("BASE_URL"));

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
