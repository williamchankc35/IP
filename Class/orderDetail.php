<?php

class orderDetail {

    private $orderID;
    private $prodID;
    private $prodName;
    private $itemQty;
    private $prodPrice;
    private $subtotal;

    function __construct($orderID, $prodID, $prodName, $itemQty, $prodPrice) {
        $this->orderID = $orderID;
        $this->prodID = $prodID;
        $this->prodName = $prodName;
        $this->itemQty = $itemQty;
        $this->prodPrice = $prodPrice;
        $this->countSubTotal();
    }

    function getOrderID() {
        return $this->orderID;
    }

    function getProdID() {
        return $this->prodID;
    }

    function getProdName() {
        return $this->prodName;
    }

    function getItemQty() {
        return $this->itemQty;
    }

    function getProdPrice() {
        return $this->prodPrice;
    }

    function getSubtotal() {
        return $this->subtotal;
    }

    function setOrderID($orderID) {
        $this->orderID = $orderID;
    }

    function setProdID($prodID) {
        $this->prodID = $prodID;
    }

    function setProdName($prodName) {
        $this->prodName = $prodName;
    }

    function setProdPrice($prodPrice) {
        $this->prodPrice = $prodPrice;
    }

    function setSubtotal($subtotal) {
        $this->subtotal = $subtotal;
    }

    function setItemQty($itemQty) {
        $this->itemQty = $itemQty;
        $this->countSubTotal();
    }

    function setItemPrice($prodPrice) {
        $this->prodPrice = $prodPrice;
        $this->countSubTotal();
    }

    function countSubTotal() {
        $this->subtotal = (double) $this->itemQty * (double) $this->prodPrice;
    }

    function toString() {
        return $this->orderID . " " . $this->prodID . " " . $this->prodName . " " . $this->itemQty 
                . " " . $this->prodPrice . " " . $this->subtotal;
    }

}
