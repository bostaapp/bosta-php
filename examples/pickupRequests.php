<?php


require __DIR__ . '/vendor/autoload.php';
use Bosta\Bosta;
use Bosta\Utils\ContactPerson;

$bosta = new Bosta(getenv("API_KEY"), getenv("BASE_URL"));

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
    $list = $bosta->pickupLocation->list();
    var_dump($list);
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
