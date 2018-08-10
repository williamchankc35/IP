<?php

/*
 * @author William
 * order pick up & delivery 
 */

class orderPD {
    
    private $orderPDType;
    private $orderID;
    private $orderPDDate;
    private $orderPDTime;
    private $orderPDStaffID;
    private $orderPDStaffName;
    
    function __construct($orderPDType, $orderID, $orderPDDate, $orderPDTime, $orderPDStaffID, $orderPDStaffName) {
        $this->orderPDType = $orderPDType;
        $this->orderID = $orderID;
        $this->orderPDDate = $orderPDDate;
        $this->orderPDTime = $orderPDTime;
        $this->orderPDStaffID = $orderPDStaffID;
        $this->orderPDStaffName = $orderPDStaffName;
    }

    function getOrderPDType() {
        return $this->orderPDType;
    }

    function getOrderID() {
        return $this->orderID;
    }

    function getOrderPDDate() {
        return $this->orderPDDate;
    }

    function getOrderPDTime() {
        return $this->orderPDTime;
    }

    function getOrderPDStaffID() {
        return $this->orderPDStaffID;
    }

    function getOrderPDStaffName() {
        return $this->orderPDStaffName;
    }

    function setOrderPDType($orderPDType) {
        $this->orderPDType = $orderPDType;
    }

    function setOrderID($orderID) {
        $this->orderID = $orderID;
    }

    function setOrderPDDate($orderPDDate) {
        $this->orderPDDate = $orderPDDate;
    }

    function setOrderPDTime($orderPDTime) {
        $this->orderPDTime = $orderPDTime;
    }

    function setOrderPDStaffID($orderPDStaffID) {
        $this->orderPDStaffID = $orderPDStaffID;
    }

    function setOrderPDStaffName($orderPDStaffName) {
        $this->orderPDStaffName = $orderPDStaffName;
    }
}