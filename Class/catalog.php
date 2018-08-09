<?php

/*
 * @author William
 */

class catalog {
    
    private $cataID;
    private $cataPeriod;
    private $cataPrice;
    private $cataDesc;
    
    function __construct($cataID, $cataPeriod, $cataPrice, $cataDesc) {
        $this->cataID = $cataID;
        $this->cataPeriod = $cataPeriod;
        $this->cataPrice = $cataPrice;
        $this->cataDesc = $cataDesc;
    }
    
    function getCataID() {
        return $this->cataID;
    }

    function getCataPeriod() {
        return $this->cataPeriod;
    }

    function getCataPrice() {
        return $this->cataPrice;
    }

    function getCataDesc() {
        return $this->cataDesc;
    }

    function setCataID($cataID) {
        $this->cataID = $cataID;
    }

    function setCataPeriod($cataPeriod) {
        $this->cataPeriod = $cataPeriod;
    }

    function setCataPrice($cataPrice) {
        $this->cataPrice = $cataPrice;
    }

    function setCataDesc($cataDesc) {
        $this->cataDesc = $cataDesc;
    }


}
