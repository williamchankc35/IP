<?php

session_start();
 
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
  header("location: Customerlogin.php");
  exit;
}

include_once dirname(__FILE__) . '/../DataAccess/InvoiceDA.php';

$InvoiceDA = new invoiceDA;

if (isset($_POST['generate'])) {
    $time1 = $_POST["time1"];
    $time2 = $_POST["time2"];
    $username = $_SESSION['username'];
    $InvoiceDA->OrderReport($username,$time1,$time2);
}