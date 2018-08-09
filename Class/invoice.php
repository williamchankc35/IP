<?php

/*
 * @author William
 */

class invoice {
    
    private $invID;
    private $invDate;
    private $invCustID;
    private $invCustName;
    private $invCreateDate;
    private $invOrderID;
    private $invOrderDate;
    private $invTotalOrderAmount;
    private $invTotalAmount;
    
    function __construct($invID, $invDate, $invCustID, $invCustName, $invCreateDate, $invOrderID, $invOrderDate, $invTotalOrderAmount, $invTotalAmount) {
        $this->invID = $invID;
        $this->invDate = $invDate;
        $this->invCustID = $invCustID;
        $this->invCustName = $invCustName;
        $this->invCreateDate = $invCreateDate;
        $this->invOrderID = $invOrderID;
        $this->invOrderDate = $invOrderDate;
        $this->invTotalOrderAmount = $invTotalOrderAmount;
        $this->invTotalAmount = $invTotalAmount;
    }

    function getInvID() {
        return $this->invID;
    }

    function getInvDate() {
        return $this->invDate;
    }

    function getInvCustID() {
        return $this->invCustID;
    }

    function getInvCustName() {
        return $this->invCustName;
    }

    function getInvCreateDate() {
        return $this->invCreateDate;
    }

    function getInvOrderID() {
        return $this->invOrderID;
    }

    function getInvOrderDate() {
        return $this->invOrderDate;
    }

    function getInvTotalOrderAmount() {
        return $this->invTotalOrderAmount;
    }

    function getInvTotalAmount() {
        return $this->invTotalAmount;
    }

    function setInvID($invID) {
        $this->invID = $invID;
    }

    function setInvDate($invDate) {
        $this->invDate = $invDate;
    }

    function setInvCustID($invCustID) {
        $this->invCustID = $invCustID;
    }

    function setInvCustName($invCustName) {
        $this->invCustName = $invCustName;
    }

    function setInvCreateDate($invCreateDate) {
        $this->invCreateDate = $invCreateDate;
    }

    function setInvOrderID($invOrderID) {
        $this->invOrderID = $invOrderID;
    }

    function setInvOrderDate($invOrderDate) {
        $this->invOrderDate = $invOrderDate;
    }

    function setInvTotalOrderAmount($invTotalOrderAmount) {
        $this->invTotalOrderAmount = $invTotalOrderAmount;
    }

    function setInvTotalAmount($invTotalAmount) {
        $this->invTotalAmount = $invTotalAmount;
    }


}
