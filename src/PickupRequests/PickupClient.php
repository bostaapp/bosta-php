<?php

declare (strict_types = 1);
namespace Bosta\PickupRequests;

use Bosta\Bosta;
use Bosta\Utils\ContactPerson;

class PickupClient
{
    /**
     * Create PickupClient Instance
     *
     * @param \Bosta\Bosta $apiClient
     */
    public function __construct(Bosta $apiClient)
    {
        $this->apiClient = $apiClient;
    }

    /**
     * Create Pickup Request
     *
     * @param string $scheduledDate
     * @param string $scheduledTimeSlot
     * @param \Bosta\Utils\ContactPerson $contactPerson
     * @param string $businessLocationId
     * @param string $notes
     * @param int $noOfPackages
     * @return void
     */
    public function create(
        string $scheduledDate,
        string $scheduledTimeSlot,
        ContactPerson $contactPerson,
        string $businessLocationId,
        string $notes,
        int $noOfPackages
    ) {
        try {
            $path = 'pickups';
            $body = new \stdClass;
            $body->scheduledDate = $scheduledDate;
            $body->scheduledTimeSlot = $scheduledTimeSlot;
            if ($contactPerson->contactPerson) {
                $body->contactPerson = $contactPerson->contactPerson;
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
            if ($response->success === null || $response->success === true) {
                if ($response->data) {
                    return $response->data;
                } elseif ($response->message) {
                    return  $response->message;
                }
            } elseif ($response->success === false) {
                throw new \Exception($response->message);
            }
        } catch (Exception $e) {
            return $e;
        }
    }

    /**
     * Update Pickup Request
     *
     * @param string $pickupRequestId
     * @param string $scheduledDate
     * @param string $scheduledTimeSlot
     * @param \Bosta\Utils\ContactPerson $contactPerson
     * @param string $businessLocationId
     * @param string $notes
     * @param int $noOfPackages
     * @return void
     */
    public function update(
        string $pickupRequestId,
        string $scheduledDate,
        string $scheduledTimeSlot,
        ContactPerson $contactPerson,
        string $businessLocationId,
        string $notes,
        int $noOfPackages
    ) {
        try {
            $path = 'pickups/'.$pickupRequestId;
            $body = new \stdClass;
            $body->scheduledDate = $scheduledDate;
            $body->scheduledTimeSlot = $scheduledTimeSlot;
            if ($contactPerson->contactPerson) {
                $body->contactPerson = $contactPerson->contactPerson;
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
            $response = $this->apiClient->send('PUT', $path, $body, '');
            var_dump($response);
            if ($response->success === null || $response->success === true) {
                if ($response->data) {
                    return $response->data;
                } elseif ($response->message) {
                    return  $response->message;
                }
            } elseif ($response->success === false) {
                throw new \Exception($response->message);
            }
        } catch (Exception $e) {
            return $e;
        }
    }

    /**
     * Delete Pickup Request
     *
     * @param string $pickupRequestId
     * @return void
     */
    public function delete(string $pickupRequestId)
    {
        try {
            $path = 'pickups/' . $pickupRequestId;
            $response = $this->apiClient->send('DELETE', $path, new \stdClass, '');
            if ($response->success === null || $response->success === true) {
                if ($response->data) {
                    return $response->data;
                } elseif ($response->message) {
                    return  $response->message;
                }
            } elseif ($response->success === false) {
                throw new \Exception($response->message);
            }
        } catch (Exception $e) {
            return $e;
        }
    }

    /**
     * List Pickup Request
     *
     * @param int $pageId
     * @return void
     */
    public function list(int $pageId = 0)
    {
        try {
            $path = 'pickups?pageId=' . $pageId;
            $response = $this->apiClient->send('GET', $path, new \stdClass, '');
            if ($response->success === null || $response->success === true) {
                return $response;
            } elseif ($response->success === false) {
                throw new \Exception($response->message);
            }
        } catch (Exception $e) {
            return $e;
        }
    }

    /**
     * Get Pickup Request
     *
     * @param string $pickupRequestId
     * @return void
     */
    public function get(string $pickupRequestId)
    {
        try {
            $path = 'pickups/' . $pickupRequestId;
            $response = $this->apiClient->send('GET', $path, new \stdClass, '');
            if ($response->success === null || $response->success === true) {
                if ($response->data) {
                    return $response->data;
                } elseif ($response->message) {
                    return  $response->message;
                }
            } elseif ($response->success === false) {
                throw new \Exception($response->message);
            }
        } catch (Exception $e) {
            return $e;
        }
    }
}
