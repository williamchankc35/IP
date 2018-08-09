<?php

class orderDetail {

    private $orderID;
    private $prodID;
    private $itemQty;
    private $prodPrice;
    private $subtotal;

    function __construct($orderID, $prodID, $itemQty, $prodPrice) {
        $this->orderID = $orderID;
        $this->prodID = $prodID;
        $this->itemQty = $itemQty;
        $this->prodPrice = $prodPrice;
        countSubTotal();
    }

    function getOrderID() {
        return $this->orderID;
    }

    function getProdID() {
        return $this->prodID;
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

    function setProdPrice($prodPrice) {
        $this->prodPrice = $prodPrice;
    }

    function setSubtotal($subtotal) {
        $this->subtotal = $subtotal;
    }

    function setItemQty($itemQty) {
        $this->itemQty = $itemQty;
        countSubTotal();
    }

    function setItemPrice($prodPrice) {
        $this->prodPrice = $prodPrice;
        countSubTotal();
    }

    function countSubTotal() {
        $this->subtotal = $this->itemQty * $this->prodPrice;
    }

}
