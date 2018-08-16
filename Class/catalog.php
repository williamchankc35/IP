<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class catalog{
    private $cataMonth;
    private $cataYear;
    private $cataProducts;
    private $cataPrice;
    
    function __construct($cataMonth, $cataYear, $cataProducts, $cataPrice) {
        $this->cataMonth = $cataMonth;
        $this->cataYear = $cataYear;
        $this->cataProducts = $cataProducts;
        $this->cataPrice = $cataPrice;
    }
    
    function getCataMonth() {
        return $this->cataMonth;
    }

    function getCataYear() {
        return $this->cataYear;
    }

    function getCataProducts() {
        return $this->cataProducts;
    }

    function getCataPrice() {
        return $this->cataPrice;
    }

    function setCataMonth($cataMonth) {
        $this->cataMonth = $cataMonth;
    }

    function setCataYear($cataYear) {
        $this->cataYear = $cataYear;
    }

    function setCataProducts($cataProducts) {
        $this->cataProducts = $cataProducts;
    }

    function setCataPrice($cataPrice) {
        $this->cataPrice = $cataPrice;
    }
}