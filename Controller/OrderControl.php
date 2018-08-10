<?php

/* @author Chuckie
 */
include_once '../DataAccess/orderDA.php';

$od = array();
$orderDA = new orderDA();
if (!isset($_SESSION)) {
    echo "session is off <br/>";
    session_start();
    $_SESSION['ordDet'] = $od;
    echo "session is on now <br/>";
}

if (isset($_POST["add_to_cart"])) {
    $prodid = $_POST["prodid"];
    $qty = $_POST["quantity"];
    $orderDA->addOrderDetSession($prodid, $qty);
    $order = $orderDA->retrieveOrderData("2");

    echo $order->toString();
}

class OrderControl {
    
}
