<?php

/*
 * @author William
 * order pick up & delivery 
 */

class orderPD {
    
    private $orderPDDate;
    private $orderPDTime;
    private $orderPDStaffID;
    private $orderPDStaffName;
    
    function __construct($orderPDDate, $orderPDTime, $orderPDStaffID, $orderPDStaffName) {
        $this->orderPDDate = $orderPDDate;
        $this->orderPDTime = $orderPDTime;
        $this->orderPDStaffID = $orderPDStaffID;
        $this->orderPDStaffName = $orderPDStaffName;
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
