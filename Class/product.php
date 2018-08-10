<?php

/*
 * @author William
 */

class product {
    
    //private $prodID;
    private $prodName;
    private $prodQuantity;
    private $prodAvailable;
    private $prodPrice;
    private $prodCategory;
    
    function __construct($prodName, $prodQuantity, $prodAvailable, $prodPrice, $prodCategory) {
//        $this->prodID = $prodID;
        $this->prodName = $prodName;
        $this->prodQuantity = $prodQuantity;
        $this->prodAvailable = $prodAvailable;
        $this->prodPrice = $prodPrice;
        $this->prodCategory = $prodCategory;
    }

//    function getProdID() {
//        return $this->prodID;
//    }

    function getProdName() {
        return $this->prodName;
    }

    function getProdQuantity() {
        return $this->prodQuantity;
    }

    function getProdAvailable() {
        return $this->prodAvailable;
    }
    
    function getProdPrice() {
        return $this->prodPrice;
    }
    
    function getProdCategory() {
        return $this->prodCategory;
    }

//    function setProdID($prodID) {
//        $this->prodID = $prodID;
//    }

    function setProdName($prodName) {
        $this->prodName = $prodName;
    }

    function setProdQuantity($prodQuantity) {
        $this->prodQuantity = $prodQuantity;
    }

    function setProdAvailable($prodAvailable) {
        $this->prodAvailable = $prodAvailable;
    }
    
    function setProdPrice($prodPrice) {
        $this->prodPrice = $prodPrice;
    }
    
    function setProdCategory($prodCategory) {
        $this->prodCategory = $prodCategory;
    }
}
