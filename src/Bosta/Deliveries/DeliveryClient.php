<?php

declare (strict_types = 1);
namespace Bosta\Deliveries;

class DeliveryClient
{
    /**
     * Create a new DeliveryClient Instance
     */
    public function __construct($apiClient)
    {
        $this->apiClient = $apiClient;
    }

    public function create(
        int $type,
        int $buildingNumber,
        string $firstLine,
        string $city,
        string $zone,
        string $firstName,
        string $lastName,
        string $phone,
        string $notes,
        int $cod
    ) {
        $path = 'deliveries';

        $body = new stdClass();
        $body->type = $type;
        $body->notes = $notes;

        $body->dropOffAddress = new stdClass();
        $body->dropOffAddress->buildingNumber = $buildingNumber;
        $body->dropOffAddress->firstLine = $firstLine;
        $body->dropOffAddress->city = $city;
        $body->dropOffAddress->zone = $zone;

        $body->receiver = new stdClass();
        $body->receiver->firstName = $firstName;
        $body->receiver->lastName = $lastName;
        $body->receiver->phone = $phone;

        if ($cod && $cod != 0) {
            $body->cod = $cod;
        }
        $response = $this->apiClient->send('POST', $path, $body, '');
        return $response;
    }

    public function update(
        string $deliveryId,
        int $buildingNumber,
        string $firstLine,
        string $city,
        string $zone,
        string $firstName,
        string $lastName,
        string $phone,
        string $notes,
        int $cod
    ) {
        $path = 'deliveries/' . $deliveryId;

        $body = new stdClass();
        $body->notes = $notes;

        $body->dropOffAddress = new stdClass();
        $body->dropOffAddress->buildingNumber = $buildingNumber;
        $body->dropOffAddress->firstLine = $firstLine;
        $body->dropOffAddress->city = $city;
        $body->dropOffAddress->zone = $zone;

        $body->receiver = new stdClass();
        $body->receiver->firstName = $firstName;
        $body->receiver->lastName = $lastName;
        $body->receiver->phone = $phone;

        if ($cod && $cod != 0) {
            $body->cod = $cod;
        }
        $response = $this->apiClient->send('PUT', $path, $body, '');
        return $response;
    }
    
    public function delete(string $deliveryId)
    {
        $path = 'deliveries/' . $deliveryId;
        $response = $this->apiClient->send('DELETE', $path, '', '');
        return $response;
    }

    function list(int $pageNumber = 0, int $pageLimit = 50): string {
        $path = 'deliveries?pageNumber=' . $pageNumber . '&pageLimit=' . $pageLimit;
        $response = $this->apiClient->send('GET', $path, '', '');
        return $response;
    }

    public function get(string $deliveryId)
    {
        $path = 'deliveries/' . $deliveryId;
        $response = $this->apiClient->send('GET', $path, '', '');
        return $response;
    }
}
