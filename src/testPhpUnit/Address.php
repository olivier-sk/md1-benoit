<?php

namespace testPhpUnit ;

class Address
{
    public $address, $postalCode, $city ;
    public function __construct($address, $postalCode, $city) {
        $this->address    = $address ;
        $this->postalCode = $postalCode ;
        $this->city       = $city ;
    }
}
