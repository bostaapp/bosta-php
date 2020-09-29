<?php

declare (strict_types = 1);
namespace Bosta\Zones;

use Bosta\Bosta;

class ZoneClient
{
    /**
     * Create ZoneClient Instance
     *
     * @param \Bosta\Bosta $apiClient
     */
    public function __construct(Bosta $apiClient)
    {
        $this->apiClient = $apiClient;
    }

    /**
     * List Zones of the City
     *
     * @param string $cityId
     * @return \stdClass
     */
    public function list(string $cityId): \stdClass
    {
        try {
            $path = 'cities/'.$cityId.'/zones';
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
