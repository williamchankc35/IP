<?php

/*
 * @author William
 */

class customer {
    
    private $custID;
    private $custType;
    private $custName;
    private $custEmail;
    private $custCredit;
    private $custStatus;
    
    function __construct($custID, $custType, $custName, $custEmail, $custCredit, $custStatus) {
        $this->custID = $custID;
        $this->custType = $custType;
        $this->custName = $custName;
        $this->custEmail = $custEmail;
        $this->custCredit = $custCredit;
        $this->custStatus = $custStatus;
    }

    function getCustID() {
        return $this->custID;
    }

    function getCustType() {
        return $this->custType;
    }

    function getCustName() {
        return $this->custName;
    }

    function getCustEmail() {
        return $this->custEmail;
    }

    function getCustCredit() {
        return $this->custCredit;
    }

    function getCustStatus() {
        return $this->custStatus;
    }

    function setCustID($custID) {
        $this->custID = $custID;
    }

    function setCustType($custType) {
        $this->custType = $custType;
    }

    function setCustName($custName) {
        $this->custName = $custName;
    }

    function setCustEmail($custEmail) {
        $this->custEmail = $custEmail;
    }

    function setCustCredit($custCredit) {
        $this->custCredit = $custCredit;
    }

    function setCustStatus($custStatus) {
        $this->custStatus = $custStatus;
    }

}
