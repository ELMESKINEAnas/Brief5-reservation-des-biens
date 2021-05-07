<?php

include '../Controller/connect.php';

class Model extends connect
{
    public $conn;
    public function __construct()
    {
        parent::__construct();
        $this->conn = $this->getConn();
    }

    public function insertReservation()
    {
    }

    public  function getsingelReseravtion()
    {
    }
}