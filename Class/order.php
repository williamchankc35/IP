<?php

/*
 * @author William
 */

class order {

    private $orderDate;
    private $orderCustID;
    private $orderCustName;
    private $orderPD; //pick up or delivery
    private $orderAddress; //delivery address
    private $orderPDDate;
    private $orderPDTime;
    private $orderTotalAmount;

    function __construct($orderDate, $orderCustID, $orderCustName, $orderPD,
            $orderAddress, $orderPDDate, $orderPDTime, $orderTotalAmount) {
        $this->orderDate = $orderDate;
        $this->orderCustID = $orderCustID;
        $this->orderCustName = $orderCustName;
        $this->orderPD = $orderPD;
        $this->orderAddress = $orderAddress;
        $this->orderPDDate = $orderPDDate;
        $this->orderPDTime = $orderPDTime;
        $this->orderTotalAmount = $orderTotalAmount;
    }

    function getOrderDate() {
        return $this->orderDate;
    }

    function getOrderCustID() {
        return $this->orderCustID;
    }

    function getOrderCustName() {
        return $this->orderCustName;
    }

    function getOrderPD() {
        return $this->orderPD;
    }

    function getOrderAddress() {
        return $this->orderAddress;
    }

    function getOrderPDDate() {
        return $this->orderPDDate;
    }

    function getOrderPDTime() {
        return $this->orderPDTime;
    }

    function getOrderTotalAmount() {
        return $this->orderTotalAmount;
    }

    function setOrderDate($orderDate) {
        $this->orderDate = $orderDate;
    }

    function setOrderCustID($orderCustID) {
        $this->orderCustID = $orderCustID;
    }

    function setOrderCustName($orderCustName) {
        $this->orderCustName = $orderCustName;
    }

    function setOrderPD($orderPD) {
        $this->orderPD = $orderPD;
    }

    function setOrderAddress($orderAddress) {
        $this->orderAddress = $orderAddress;
    }

    function setOrderPDDate($orderPDDate) {
        $this->orderPDDate = $orderPDDate;
    }

    function setOrderPDTime($orderPDTime) {
        $this->orderPDTime = $orderPDTime;
    }

    function setOrderTotalAmount($orderTotalAmount) {
        $this->orderTotalAmount = $orderTotalAmount;
    }

    function toString(){
        return    $this->orderDate." ".$this->orderCustID." ".$this->orderCustName." ".
                $this->orderPD." ".$this->orderAddress." ".$this->orderPDDate." ".
                $this->orderPDTime." ".$this->orderTotalAmount;
    }
}
