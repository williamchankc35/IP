<?php

/*
 * @author William
 */

class catalog {
    
    private $cataPeriod;
    private $cataPrice;
    private $cataDesc;
    
    function __construct($cataPeriod, $cataPrice, $cataDesc) {
        $this->cataPeriod = $cataPeriod;
        $this->cataPrice = $cataPrice;
        $this->cataDesc = $cataDesc;
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
