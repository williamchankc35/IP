<?php
include_once dirname(__FILE__) . '/../DataAccess/orderPDDA.php';

$orderPDDA = new orderPDDA;

if (isset($_POST['COrderPD'])) {
    $orderID = $_POST["orderID"];
    $orderPDDate = $_POST["orderPDDate"];
    $orderPDTime = $_POST["orderPDTime"];
    $orderPDStaffID = $_POST["orderPDStaffID"];
    $orderPDStaffName = $_POST["orderPDStaffName"];
    $orderPD = new orderPD($orderID, $orderPDDate, $orderPDTime, $orderPDStaffID, $orderPDStaffName);
    $orderPDDA->insertOrderPD($orderPD);
}
if (isset($_POST['ROrderPD'])) {
    $orderPDID = $_POST["orderPDID"];
    $orderPDDA->retrieveOrderPD($orderPDID);
}
if (isset($_POST['UOrderPD'])) {
    $orderPDID = $_POST["orderPDID"];
     $orderID = $_POST["orderID"];
    $orderPDDate = $_POST["orderPDDate"];
    $orderPDTime = $_POST["orderPDTime"];
    $orderPDStaffID = $_POST["orderPDStaffID"];
    $orderPDStaffName = $_POST["orderPDStaffName"];
    $orderPD = new orderPD($orderID, $orderPDDate, $orderPDTime, $orderPDStaffID, $orderPDStaffName);
    $orderPDDA->updateOrderPD($orderPD, $orderPDID);
}
if (isset($_POST['DOrderPD'])) {
    $orderPDID = $_POST["orderPDID"];
    $orderPDDA->deleteOrderPD($orderPDID);
}
?>
<html>
    <form action="../View/Staff/manageOrderPD.php">
        <input type="submit" value="Back" name="Back" />
    </form>
</html>

