<?php

declare (strict_types = 1);
namespace Bosta\Utils;

class DropOffAddress
{
    /**
     * Create DropOffAddress Instance
     *
     * @param int $buildingNumber
     * @param string $firstLine
     * @param string $city
     * @param string $zone
     */
    public function __construct(int $buildingNumber, string $firstLine, string  $city, string $zone)
    {
        $this->dropOffAddress = new \stdClass();
        $this->dropOffAddress->buildingNumber = $buildingNumber;
        $this->dropOffAddress->firstLine = $firstLine;
        $this->dropOffAddress->city = $city;
        $this->dropOffAddress->zone = $zone;
    }
}
