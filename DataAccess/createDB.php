<?php

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
        cataDate DATE,
        cataDesc VARCHAR(200)
        )");
    $conn->exec("CREATE TABLE $dbname.customer(
        CusID VARCHAR(8) PRIMARY KEY,
        CusType VARCHAR(10),
        CusName VARCHAR(50),
        Username VARCHAR(50),
        Password VARCHAR(50),      
        Email VARCHAR(200),
        CreditLimit DOUBLE(6,2),
        Status VARCHAR(200)
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
        orderPD VARCHAR(10),
        orderAddress VARCHAR(200),
        orderPDDate DATE,
        orderPDTime TIME,
        orderTotalAmount DOUBLE
        )");
    $conn->exec("CREATE TABLE $dbname.orderDetail(
        orderID INT(6),
        prodID INT(6),
        prodName VARCHAR(40),
        itemQty INT(6),
        prodPrice DOUBLE,
        subTotal DOUBLE
    )");

    $conn->exec("CREATE TABLE $dbname.orderPD(
        orderPDID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        orderPDType VARCHAR(20),
        orderID INT(6) UNSIGNED,
        orderPDDate DATE,
        orderPDTime TIME,
        orderPDStaffID INT(6) UNSIGNED,
        orderPDStaffName VARCHAR(50)
        )");
    $conn->exec("CREATE TABLE $dbname.payment(
        paymentID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        paymentOrderInvID INT(6) UNSIGNED,
        paymentDateTime DATETIME
        )");
    $conn->exec("CREATE TABLE $dbname.product(
        prodID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        prodName VARCHAR(50),
        prodAvailable VARCHAR(10),
        prodPrice DOUBLE,
        prodCategory VARCHAR(200),
        cataID INT(6)
        )");
    $conn->exec("CREATE TABLE $dbname.user(
        userID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
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



