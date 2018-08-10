<?php

/*
 * @author William
 */

class product {
    
    //private $prodID;
    private $prodType;
    private $prodDesc;
    private $prodAvailable;
    private $prodPrice;
    
    function __construct($prodType, $prodDesc, $prodAvailable, $prodPrice) {
//        $this->prodID = $prodID;
        $this->prodType = $prodType;
        $this->prodDesc = $prodDesc;
        $this->prodAvailable = $prodAvailable;
        $this->prodPrice = $prodPrice;
    }

//    function getProdID() {
//        return $this->prodID;
//    }

    function getProdType() {
        return $this->prodType;
    }

    function getProdDesc() {
        return $this->prodDesc;
    }

    function getProdAvailable() {
        return $this->prodAvailable;
    }
    
    function getProdPrice() {
        return $this->prodPrice;
    }

//    function setProdID($prodID) {
//        $this->prodID = $prodID;
//    }

    function setProdType($prodType) {
        $this->prodType = $prodType;
    }

    function setProdDesc($prodDesc) {
        $this->prodDesc = $prodDesc;
    }

    function setProdAvailable($prodAvailable) {
        $this->prodAvailable = $prodAvailable;
    }
    
    function setProdPrice($prodPrice) {
        $this->prodPrice = $prodPrice;
    }


}
