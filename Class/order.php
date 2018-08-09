<?php

/*
 * @author William
 */

class order {

    private $orderDate;
    private $orderCustID;
    private $orderCustName;
    private $orderProdID;
    private $orderProdName;
    private $orderQuantity;
    private $orderUnitPrice;
    private $orderPD; //pick up or delivery
    private $orderAddress; //delivery address
    private $orderPDDate;
    private $orderPDTime;
    private $orderTotalAmount;

    function __construct($orderDate, $orderCustID, $orderCustName, $orderProdID, $orderProdName, $orderQuantity, $orderUnitPrice, $orderPD, $orderAddress, $orderPDDate, $orderPDTime, $orderTotalAmount) {
        $this->orderDate = $orderDate;
        $this->orderCustID = $orderCustID;
        $this->orderCustName = $orderCustName;
        $this->orderProdID = $orderProdID;
        $this->orderProdName = $orderProdName;
        $this->orderQuantity = $orderQuantity;
        $this->orderUnitPrice = $orderUnitPrice;
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

    function getOrderProdID() {
        return $this->orderProdID;
    }

    function getOrderProdName() {
        return $this->orderProdName;
    }

    function getOrderQuantity() {
        return $this->orderQuantity;
    }

    function getOrderUnitPrice() {
        return $this->orderUnitPrice;
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

    function setOrderProdID($orderProdID) {
        $this->orderProdID = $orderProdID;
    }

    function setOrderProdName($orderProdName) {
        $this->orderProdName = $orderProdName;
    }

    function setOrderQuantity($orderQuantity) {
        $this->orderQuantity = $orderQuantity;
    }

    function setOrderUnitPrice($orderUnitPrice) {
        $this->orderUnitPrice = $orderUnitPrice;
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

}
