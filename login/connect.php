<?php

class Connect
{
    protected $connect;

    public function __construct()
    {
        $this->connect = new mysqli('localhost', 'root', '', 'site');
    }
}


?>