<?php

/*
 * @author William
 */

class product {
    
    //private $prodID;
    private $prodType;
    private $prodDesc;
    private $prodAvailable;
    
    function __construct($prodType, $prodDesc, $prodAvailable) {
//        $this->prodID = $prodID;
        $this->prodType = $prodType;
        $this->prodDesc = $prodDesc;
        $this->prodAvailable = $prodAvailable;
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


}
