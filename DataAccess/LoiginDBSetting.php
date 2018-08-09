<?php

class LoiginDBSetting {
 
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "fioreflowershopdb";

    public function getConn() {
        $conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
          if ($conn->connect_error) {
                return false;
            }  
        return $conn;
    }

    public function checkConn() {
        try {
            $conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
            if ($conn->connect_error) {
                return false;
            }
        } catch (Exception $e) {
            return false;
        }
        return TRUE;
    }
}
