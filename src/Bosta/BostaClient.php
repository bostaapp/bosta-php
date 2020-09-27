<?php

declare (strict_types = 1);

namespace Bosta;

use Bosta\Deliveries\DeliveryClient;
use Bosta\PickupRequests\PickupClient;

class BostaClient
{
    /**
     * Create a new BostaClient Instance
     */
    public function __construct($API_KEY, $BASE_URL)
    {
        $this->BASE_URL = $BASE_URL;
        $this->API_KEY = $API_KEY;
        $this->pickup = new PickupClient($this);
        $this->delivery = new DeliveryClient($this);
    }

    public function send($method, $path, $body, $headers)
    {
        $url = $this->BASE_URL . $path;
        $curl = curl_init($url);
        if ($method == 'DELETE') {
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "DELETE");
        }
        if ($method == 'POST' || $method == 'PUT') {
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $method);
            curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($body));
        }
        var_dump($body);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
            "Content-Type: application/json",
            'authorization:' . $this->API_KEY,
            'X-REQUESTED-BY: PHP-SDK',
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        return $response;
    }
}
