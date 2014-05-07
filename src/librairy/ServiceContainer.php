<?php

namespace librairy;


class ServiceContainer {

    private $services = [] ;
    public function setService ($serviceName, $class) {
        $this->services[$serviceName] = $class ;
    }
    public function getService ($serviceName) {
        return $this->services[$serviceName] ;
    }
}