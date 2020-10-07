<?php

declare (strict_types = 1);
namespace Bosta\PickupLocations;

use Bosta\Bosta;

class PickupLocationClient
{
    /**
     * Create PickupLocationClient Instance
     *
     * @param \Bosta\Bosta $apiClient
     */
    public function __construct(Bosta $apiClient)
    {
        $this->apiClient = $apiClient;
    }

    /**
     * List PickupLocations
     *
     * @return \stdClass
     */
    public function list(): \stdClass
    {
        try {
            $path = 'pickup-locations';
            $response = $this->apiClient->send('GET', $path, new \stdClass, '');

            if ($response->success === true) {
                return $response->data;
            } elseif ($response->success === false) {
                throw new \Exception($response->message);
            }
        } catch (Exception $e) {
            return $e;
        }
    }
}
