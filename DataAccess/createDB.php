<?php

/*
 * @author William
 */



$servername = "localhost";
$username = "root";
$password = "";
$dbname = "FioreFlowershopDB";


try {
    $conn = new PDO("mysql:host=$servername", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "CREATE DATABASE $dbname ";
    // use exec() because no results are returned
    $conn->exec($sql);
    
    $conn->exec("CREATE TABLE $dbname.catalog(
        cataID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        cataPeriod DATE,
        cataPrice DOUBLE,
        cataDesc VARCHAR(200)
        )");
    $conn->exec("CREATE TABLE $dbname.customer(
        custID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        custType VARCHAR(50),
        custName VARCHAR(50),
        custEmail VARCHAR(200),
        custCredit INT(6),
        custStatus VARCHAR(200)
        )");
    $conn->exec("CREATE TABLE $dbname.invoice(
        invID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        invDate DATE,
        invCustID INT(6) UNSIGNED,
        invCustName VARCHAR(50),
        invCreateDate DATE,
        invOrderID INT(6) UNSIGNED,
        invOrderDate DATE,
        invTotalOrderAmount DOUBLE,
        invTotalAmount DOUBLE
        )");
    $conn->exec("CREATE TABLE $dbname.order(
        orderID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        orderDate DATE,
        orderCustID INT(6) UNSIGNED,
        orderCustName VARCHAR(50),
        orderProdID INT(6) UNSIGNED,
        orderProdName VARCHAR(50),
        orderQuantity INT(6),
        orderUnitPrice DOUBLE,
        orderPD VARCHAR(10),
        orderAddress VARCHAR(200),
        orderPDDate DATE,
        orderPDTime TIME,
        orderTotalAmount DOUBLE
        )");
    $conn->exec("CREATE TABLE $dbname.orderPD(
        orderPDID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        orderPDDate DATE,
        orderPDTime TIME,
        orderPDStaffID INT(6) UNSIGNED,
        orderPDStaffNam VARCHAR(50)
        )");
    $conn->exec("CREATE TABLE $dbname.payment(
        paymentOrderInvID VARCHAR(10),
        paymentDateTime DATETIME
        )");
    $conn->exec("CREATE TABLE $dbname.product(
        prodID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        prodType VARCHAR(50),
        prodDesc VARCHAR(200),
        prodAvailable VARCHAR(10)
        )");
    $conn->exec("CREATE TABLE $dbname.user(
        userType VARCHAR(50),
        userName VARCHAR(50),
        userPassword VARCHAR(50),
        userStatus VARCHAR(200)
        )");
    echo "Database and table created successfully<br>";
} catch (PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}

$conn = null;



