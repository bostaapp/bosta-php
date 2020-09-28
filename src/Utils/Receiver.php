<?php

declare (strict_types = 1);
namespace Bosta\Utils;

class Receiver
{
    /**
     * Create Receiver Instance
     *
     * @param string $firstName
     * @param string $lastName
     * @param string $phone
     */
    public function __construct(string $firstName, string $lastName, string $phone)
    {
        $this->receiver = new \stdClass();
        $this->receiver->firstName = $firstName;
        $this->receiver->lastName = $lastName;
        $this->receiver->phone = $phone;
    }
}
