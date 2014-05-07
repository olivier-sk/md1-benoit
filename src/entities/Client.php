<?php
namespace entities;


class Client {
    private  $username ;

    public function __construct($username) {
        $this->username = $username ;
    }

    /**
     * @param mixed $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

} 