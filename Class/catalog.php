<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class catalog {

    private $cataID;
    private $cataDate;
    private $cataDesc;

    function __construct($cataID, $cataDate, $cataDesc) {
        $this->cataID = $cataID;
        $this->cataDate = $cataDate;
        $this->cataDesc = $cataDesc;
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

    function setCataID($cataID) {
        $this->cataID = $cataID;
    }

    function setCataDate($cataDate) {
        $this->cataDate = $cataDate;
    }

    function setCataDesc($cataDesc) {
        $this->cataDesc = $cataDesc;
    }

}
