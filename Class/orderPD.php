<?php

/*
 * @author William
 * order pick up & delivery 
 */

class orderPD {
    
    private $orderPDID;
    private $orderPDDate;
    private $orderPDTime;
    private $orderPDStaffID;
    private $orderPDStaffName;
    
    function __construct($orderPDID, $orderPDDate, $orderPDTime, $orderPDStaffID, $orderPDStaffName) {
        $this->orderPDID = $orderPDID;
        $this->orderPDDate = $orderPDDate;
        $this->orderPDTime = $orderPDTime;
        $this->orderPDStaffID = $orderPDStaffID;
        $this->orderPDStaffName = $orderPDStaffName;
    }

    function getOrderPDID() {
        return $this->orderPDID;
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

    function setOrderPDID($orderPDID) {
        $this->orderPDID = $orderPDID;
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
