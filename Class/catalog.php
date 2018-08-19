<?php

/*
 * @author Ng Choon Yik
 */

class catalog {

    private $cataID;
    private $cataDate;
    private $cataDesc;
    private $cataProducts;
    
    function __construct($cataID, $cataDate, $cataDesc, $cataProducts) {
        $this->cataID = $cataID;
        $this->cataDate = $cataDate;
        $this->cataDesc = $cataDesc;
        $this->cataProducts = $cataProducts;
    }

    function getCataID() {
        return $this->cataID;
    }

    function getCataDate() {
        return $this->cataDate;
    }

    function getCataDesc() {
        return $this->cataDesc;
    }

    function getCataProducts() {
        return $this->cataProducts;
    }

    function setCataID($cataID) {
        $this->cataID = $cataID;
    }

    function setCataDate($cataDate) {
        $this->cataDate = $cataDate;
    }

    function setCataDesc($cataDesc) {
        $this->cataDesc = $cataDesc;
    }

    function setCataProducts($cataProducts) {
        $this->cataProducts = $cataProducts;
    }
}
