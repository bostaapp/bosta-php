<?php

declare (strict_types = 1);
namespace Bosta\Cities;

use Bosta\Bosta;

class CityClient
{
    /**
     * Create CityClient Instance
     *
     * @param \Bosta\Bosta $apiClient
     */
    public function __construct(Bosta $apiClient)
    {
        $this->apiClient = $apiClient;
    }

    /**
     * List Cities
     *
     * @return void
     */
    public function list()
    {
        try {
            $path = 'cities';
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
}
