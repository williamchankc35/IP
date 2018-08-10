<?php

include_once dirname(__FILE__) . '/../DataAccess/paymentDA.php';

$paymentDA = new paymentDA;

if (isset($_POST['CPayment'])) {
    $paymentOrderInvID = $_POST["paymentOrderInvID"];
    $paymentDateTime = $_POST["paymentDateTime"];
    $payment = new payment($paymentOrderInvID, $paymentDateTime);
    $paymentDA->insertPayment($payment);
}
if (isset($_POST['RPayment'])) {
    $paymentID = $_POST["paymentID"];
    $paymentDA->retrievePayment($paymentID);
}
if (isset($_POST['UPayment'])) {
    $paymentID = $_POST["paymentID"];
    $paymentOrderInvID = $_POST["paymentOrderInvID"];
    $paymentDateTime = $_POST["paymentDateTime"];
    $payment = new payment($paymentOrderInvID, $paymentDateTime);
    $paymentDA->updatePayment($payment, $paymentID);
}
if (isset($_POST['DPayment'])) {
    $paymentID = $_POST["paymentID"];
    $paymentDA->deletePayment($paymentID);
}
?>
<html>
    <form action="../View/Staff/managePayment.php">
        <input type="submit" value="Back" name="Back" />
    </form>
</html>
