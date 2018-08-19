<?php

/*
 * @author Ng Choon Yik
 */

class product {
    
    //private $prodID;
    private $prodName;
    private $prodAvailable;
    private $prodPrice;
    private $prodCategory;
    private $cataID;
   
    function __construct($prodName, $prodAvailable, $prodPrice, $prodCategory, $cataID) {
        $this->prodName = $prodName;
        $this->prodAvailable = $prodAvailable;
        $this->prodPrice = $prodPrice;
        $this->prodCategory = $prodCategory;
        $this->cataID = $cataID;
    }
    function getProdName() {
        return $this->prodName;
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

    function getCataID() {
        return $this->cataID;
    }

    function setProdName($prodName) {
        $this->prodName = $prodName;
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

    function setCataID($cataID) {
        $this->cataID = $cataID;
    }
}
