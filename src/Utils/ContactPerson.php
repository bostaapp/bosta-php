<?php

declare (strict_types = 1);
namespace Bosta\Utils;

class ContactPerson
{
    /**
     * Create ContactPerson Instance
     *
     * @param string $name
     * @param string $phone
     * @param string $email
     */
    public function __construct(string $name, string  $phone, string $email)
    {
        $this->contactPerson = new \stdClass();
        if ($name) {
            $this->contactPerson->name =$name;
        }
        if ($phone) {
            $this->contactPerson->phone =$phone;
        }
        if ($email) {
            $this->contactPerson->email =$email;
        }
    }
}
