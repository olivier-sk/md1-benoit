<?php

namespace testPhpUnit;

class Person
{
    public $name, $surname, $address;

    public function __construct($name, $surname, $address)
    {
        $this->name = $name;
        $this->surname = $surname;
        if (!($address[0] == $address[1] && $address[1] == $address[2])) {
            $this->address = new Address($address[0], $address[1], $address[2]);
        }
    }

}

