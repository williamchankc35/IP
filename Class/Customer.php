<?php

class Customer{
    private $CusID;
    private $CusType;
    private $CusName;
    private $Username;
    private $Password;
    private $Email;
    private $CreditLimit;
    private $Status;
    
    function __construct($CusID, $CusType, $CusName, $Username, $Password, $Email, $CreditLimit, $Status) {
        $this->CusID = $CusID;
        $this->CusType = $CusType;
        $this->CusName = $CusName;
        $this->UserName = $Username;
        $this->Password = $Password;
        $this->Email = $Email;
        $this->CreditLimit = $CreditLimit;
        $this->Status = $Status;
    }
    function getCusID() {
        return $this->CusID;
    }

    function getCusType() {
        return $this->CusType;
    }

    function getCusName() {
        return $this->CusName;
    }

    function getUsername() {
        return $this->Username;
    }

    function getPassword() {
        return $this->Password;
    }

    function getEmail() {
        return $this->Email;
    }

    function getCreditLimit() {
        return $this->CreditLimit;
    }

    function getStatus() {
        return $this->Status;
    }

    function setCusID($CusID) {
        $this->CusID = $CusID;
    }

    function setCusType($CusType) {
        $this->CusType = $CusType;
    }

    function setCusName($CusName) {
        $this->CusName = $CusName;
    }

    function setUsername($Username) {
        $this->Username = $Username;
    }

    function setPassword($Password) {
        $this->Password = $Password;
    }

    function setEmail($Email) {
        $this->Email = $Email;
    }

    function setCreditLimit($CreditLimit) {
        $this->CreditLimit = $CreditLimit;
    }

    function setStatus($Status) {
        $this->Status = $Status;
    }


    
}