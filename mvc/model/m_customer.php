<?php

class m_customer{
    protected $conn;

    public function __construct() {
        require 'mvc/config/database.php';
        require 'mvc/model/e_customer.php';
        $this->conn = connect();
    }


}