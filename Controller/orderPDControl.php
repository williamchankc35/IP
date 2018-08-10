<?php
include_once dirname(__FILE__) . '/../DataAccess/orderPDDA.php';

$orderPDDA = new orderPDDA;

if (isset($_POST['COrderPD'])) {
    $orderPDType = $_POST["orderPDType"];
    $orderID = $_POST["orderID"];
    $orderPDDate = $_POST["orderPDDate"];
    $orderPDTime = $_POST["orderPDTime"];
    $orderPDStaffID = $_POST["orderPDStaffID"];
    $orderPDStaffName = $_POST["orderPDStaffName"];
    $orderPD = new orderPD($orderPDType, $orderID, $orderPDDate, $orderPDTime, $orderPDStaffID, $orderPDStaffName);
    $orderPDDA->insertOrderPD($orderPD);
}
if (isset($_POST['ROrderPD'])) {
    $orderPDID = $_POST["orderPDID"];
    $orderPDDA->retrieveOrderPD($orderPDID);
}
if (isset($_POST['UOrderPD'])) {
    $orderPDType = $_POST["orderPDType"];
    $orderPDID = $_POST["orderPDID"];
    $orderID = $_POST["orderID"];
    $orderPDDate = $_POST["orderPDDate"];
    $orderPDTime = $_POST["orderPDTime"];
    $orderPDStaffID = $_POST["orderPDStaffID"];
    $orderPDStaffName = $_POST["orderPDStaffName"];
    $orderPD = new orderPD($orderPDType, $orderID, $orderPDDate, $orderPDTime, $orderPDStaffID, $orderPDStaffName);
    $orderPDDA->updateOrderPD($orderPD, $orderPDID);
}
if (isset($_POST['DOrderPD'])) {
    $orderPDID = $_POST["orderPDID"];
    $orderPDDA->deleteOrderPD($orderPDID);
}
if (isset($_POST['generate1'])) {
    $dailyOrder = $_POST["dailyOrder"];
    $orderPDDA->dailyOrderReport($dailyOrder);
}
if (isset($_POST['generate2'])) {
    $dailyPickup = $_POST["dailyPickup"];
    $orderPDDA->dailyPickupReport($dailyPickup);
}
if (isset($_POST['generate3'])) {
    $dailyPickup1 = $_POST["dailyPickup1"];
    $dailyPickup2 = $_POST["dailyPickup2"];
    $orderPDDA->pickupReport($dailyPickup1, $dailyPickup2);
}
if (isset($_POST['generate4'])) {
    $dailyPickup = $_POST["dailyDelivery"];
    $orderPDDA->dailyPickupReport($dailyPickup);
}
if (isset($_POST['generate5'])) {
    $dailyDelivery1 = $_POST["dailyDelivery1"];
    $dailyDelivery2 = $_POST["dailyDelivery2"];
    $orderPDDA->deliveryReport($dailyDelivery1, $dailyDelivery2);
}
?>
<html>
    <form action="../View/Staff/manageOrderPD.php">
        <input type="submit" value="Back" name="Back" />
    </form>
</html>

