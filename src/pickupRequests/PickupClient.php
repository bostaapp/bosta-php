<?php

declare (strict_types = 1);

class PickupClient
{
    /**
     * Create a new PickupRequest Instance
     */
    public function __construct($apiClient)
    {
        $this->apiClient = $apiClient;
    }

    public function create(
        string $scheduledDate,
        string $scheduledTimeSlot,
        stdClass $contactPerson,
        string $businessLocationId,
        string $notes,
        int $noOfPackages) {
        $path = 'pickups';
        $body = new stdClass();
        $body->scheduledDate = $scheduledDate;
        $body->scheduledTimeSlot = $scheduledTimeSlot;
        if ($contactPerson) {
            $body->contactPerson = $contactPerson;
        }
        
        if ($businessLocationId) {
            $body->businessLocationId = $businessLocationId;
        }

        if ($notes) {
            $body->notes = $notes;
        }

        if ($noOfPackages) {
            $body->noOfPackages = $noOfPackages;
        }

        $response = $this->apiClient->send('POST', $path, $body, '');
        return $response;
    }

    public function update(
        string $pickupRequestId,
        string $scheduledDate,
        string $scheduledTimeSlot,
        string $businessLocationId,
        string $notes,
        int $noOfPackages) {
        $path = 'pickups/' . $pickupRequestId;
        $body = new stdClass();
        $body->scheduledDate = $scheduledDate;
        $body->scheduledTimeSlot = $scheduledTimeSlot;
        if ($businessLocationId) {
            $body->businessLocationId = $businessLocationId;
        }

        if ($notes) {
            $body->notes = $notes;
        }

        if ($noOfPackages) {
            $body->noOfPackages = $noOfPackages;
        }

        $response = $this->apiClient->send('PUT', $path, $body, '');
        return $response;
    }

    public function delete(string $pickupRequestId)
    {
        $path = 'pickups/' . $pickupRequestId;
        $response = $this->apiClient->send('DELETE', $path, '', '');
        return $response;
    }

    function list(int $pageId = 0): string {
        $path = 'pickups?pageId=' . $pageId;
        $response = $this->apiClient->send('GET', $path, '', '');
        return $response;
    }

    public function get(string $pickupRequestId)
    {
        $path = 'pickups/' . $pickupRequestId;
        $response = $this->apiClient->send('GET', $path, '', '');
        return $response;
    }
}
