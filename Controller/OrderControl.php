<?php

/* @author Chuckie
 */
include_once '../DataAccess/orderDA.php';
include_once '../DataAccess/productDA.php';
include_once '../class/orderDetail.php';

$oDA = new orderDA();
$pDA = new productDA();
if (!isset($_SESSION)) {
    session_start();
}
if (!isset($_SESSION['ordDet'])) {
    $_SESSION['ordDet'] = array();
}
if (isset($_POST["add_to_cart"])) {
    $orderid = $oDA->getLastOrderID();
    $pid = $_POST["prodid"];
    $qty = $_POST["quantity"];
    //$prodname = $pDA->retrieveProductData($pid)->getProdName();
    $prodPrice = $pDA->retrieveProductData($pid)->getProdPrice();
    //$_SESSION['ordDet'][] = new orderDetail($orderid, $pid, $prodname, $qty, $prodPrice);
    $_SESSION['ordDet'][] = new orderDetail($orderid, $pid, "abc", $qty, $prodPrice);
    foreach ($_SESSION['ordDet'] as $e) {
        echo $e->toString();
    }
    header("Location:../View/Customer/CustomerOrder.php");
}


if (isset($_POST["remove"])) {
    $num = (int) $_POST["removeNo"] - 1;
    unset($_SESSION['ordDet'][$num]);
    $_SESSION['ordDet'] = array_values($_SESSION['ordDet']);
    header("Location:../View/Customer/CustomerOrder.php");
}

if(isset($_POST["ordernow"])){
    
}

class OrderControl {
    
    private $orderDA;
    public function __construct() {
        $orderDA = new orderDA();
    }
    
    function retrieveAllOrder() {
        if ($this->orderDA == NULL) {
            $this->orderDA = new orderDA();
        }
        return $this->orderDA->showAllOrder();
    }
    
    function retrieveAllOrderDetail($ordID) {
        if ($this->orderDA == NULL) {
            $this->orderDA = new orderDA();
        }
        return $this->orderDA->retrieveOrderDetail($ordID);
    }
    
    function retrieveOrder($ordID){
        if ($this->orderDA == NULL) {
            $this->orderDA = new orderDA();
        }
        return $this->orderDA->retrieveOrder($orderID);        
    }
    
    function makeOrder(){
        
    }
}
