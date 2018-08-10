<?php

/*
 * @author William
 */

class catalog {
    
    private $cataPeriod;
    private $cataPrice;
    private $cataDesc;
    private $cataCategory;
    
    function __construct($cataPeriod, $cataPrice, $cataDesc, $cataCategory) {
        $this->cataPeriod = $cataPeriod;
        $this->cataPrice = $cataPrice;
        $this->cataDesc = $cataDesc;
        $this->cataCategory = $cataCategory;
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
    
    function getCataCategory() {
        return $this->cataCategory;
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
    
    function setCataCategory($cataCategory) {
        $this->cataCategory = $cataCategory;
    }
}