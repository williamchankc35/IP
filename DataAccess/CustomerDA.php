<?php

include_once 'LoiginDBSetting.php';
include_once '../../Model/Customer.php';

class CustomerDA {
    
    private $tableName ="customer";
    
    public function verifyCustomer($Username,$Password){
        $sql = "SELECT *FROM " . $this->tableName. "WHERE Username='"
              . $Username . "' AND Password ='" . $Password . "'";
       
        $conn = new LoiginDBSetting();
        $result = $conn->getConn()->query($sql);
        if($result->num_rows>0){
            $res = $result ->fetch_assoc();
            $record = new Customer($res["CusID"],$res["CusType"],$res["CusName"],
                    $res["Username"],$res["Password"],$res["Email"],
                    $res["CreditLimit"],$res["Status"]);
        }
        return $record;
    }
    
    public function retrieveRecordwithID($CusID){
        $sql = "SELECT * FROM " . $this->tableName . " WHERE CusID = " . $CusID;
        $conn = new LoiginDBSetting();
        $result = $conn->getConn()->query($sql);
        if ($result->num_rows > 0) {
            $res = $result->fetch_assoc();
             $record = new Customer($res["CusID"],$res["CusType"],$res["CusName"],
                    $res["Username"],$res["Password"],$res["Email"],
                    $res["CreditLimit"],$res["Status"]);
        }
        return $record;
    }
    
    public function insertRecord(Customer $Customer){
        $sql ="INSERT INTO " . $this->tableName."CusID,CusType,CusName,Username,Password,Email,CreditLimit,Status"
                ."VALUES('".$Customer->getCusID() . "','" . $Customer->getCusType() .
                "','". $Customer->getCusName() . "," . $Customer->getUsername(). "','"
                .$Customer->getPassword() . "','" . $Customer->getEmail() . "','".
                $Customer->getCreditLimit() . "','" .$Customer->getCreditLimit() . "')";
        $conn = new LoiginDBSetting();
        if ($result = $conn->getConn()->query($sql)) {
            return true;
        } else {
            return false;
        }        
    }
    
    public function UpdateRecord(Customer $Customer){
       $sql ="UPDATE " . $this->tableName . " SET CusType='" . $Customer->getCusType() .
            "',CusName='" .$Customer->getCusName() . "',Username='".$Customer->getUsername() .
            "',Password='" .$Customer->getPassword() . "',Email='" .$Customer->getEmail() .
             "',CreditLimit='" .$Customer->getCreditLimit() . "',Status='" . $Customer->getStatus().
            "'WHERE CusID='" . $Customer->getCusID() . "'";
        
       $conn = new LoiginDBSetting();
        if ($result = $conn->getConn()->query($sql)) {
            return true;
        } else {
            return false;
        }
    } 

    public function retrieveAll() {
        $sql = "SELECT * FROM " . $this->tableName;
        $conn = new LoiginDBSetting();
        $result = $conn->getConn()->query($sql);
        $i = 0;
        if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $record[$i] = new Customer($row["CusID"], $row["CusType"], $row["CusName"], 
                    $row["Username"], $row["Password"], $row["Email"],
                    $row["CreditLimit"], $row["Status"]);
            $i++;
        }               
     }
    return $record;
    }
    public function retrieveIDithName($CusName) {
        $sql = "SELECT * FROM " . $this->tableName . " WHERE CusName = '" . $CusName . "'";
        $conn = new LoiginDBSetting();
        $result = $conn->getConn()->query($sql);
                $i = 0;
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $record[$i] = new Customer($row["CusID"], $row["CusType"], $row["CusName"], 
                    $row["Username"], $row["Password"], $row["Email"],
                    $row["CreditLimit"], $row["Status"]);
                $i++;
            }
        }
        return $record;
    }
    
    public function retrieveNameithID($CusID) {
        $sql = "SELECT * FROM " . $this->tableName . " WHERE CusID = '" . $CusID . "'";
        $conn = new LoiginDBSetting();
        $result = $conn->getConn()->query($sql);
                $i = 0;
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
              $record[$i] = new Customer($row["CusID"], $row["CusType"], $row["CusName"], 
                    $row["Username"], $row["Password"], $row["Email"],
                    $row["CreditLimit"], $row["Status"]);
                $i++;
            }
        }
        else{
            return false;
            
        }
        return $record;
    }
    
     public function retrieveIDwithName($CusName) {
        $sql = "SELECT * FROM " . $this->tableName . " WHERE CusName = '" . $CusName . "'";
        $conn = new LoiginDBSetting();
        $result = $conn->getConn()->query($sql);
                $i = 0;
        if ($result->num_rows > 0) {
            $res = $result->fetch_assoc();
            return  $res["CusID"];
           
        }else {
            return null;
            
        }
    }
    
}