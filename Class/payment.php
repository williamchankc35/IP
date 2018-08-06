<?php

/*
 * @author William
 */

class payment {

    private $paymentOrderInvID;//order or invoice id
    private $paymentDateTime;
    
    function __construct($paymentOrderInvID, $paymentDateTime) {
        $this->paymentOrderInvID = $paymentOrderInvID;
        $this->paymentDateTime = $paymentDateTime;
    }

    function getPaymentOrderInvID() {
        return $this->paymentOrderInvID;
    }

    function getPaymentDateTime() {
        return $this->paymentDateTime;
    }

    function setPaymentOrderInvID($paymentOrderInvID) {
        $this->paymentOrderInvID = $paymentOrderInvID;
    }

    function setPaymentDateTime($paymentDateTime) {
        $this->paymentDateTime = $paymentDateTime;
    }

}
