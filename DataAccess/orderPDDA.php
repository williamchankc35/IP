<?php

//include_once 'connectDB.php';
include_once 'TableRows.php';
include_once dirname(__FILE__).'/../Class/orderPD.php';

class orderPDDA {
    
    private $tableName = "orderPD";
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "FioreFlowershopDB";
    
    public function insertOrderPD(orderPD $orderPD) {
        try {
            $sql = "INSERT INTO " . $this->tableName . " (orderID, orderPDDate, orderPDTime, orderPDStaffID, orderPDStaffName) "
                    . "VALUES ('" . $orderPD->getOrderID() . "','" . $orderPD->getOrderPDDate() 
                    . "','" . $orderPD->getOrderPDTime() . "','" . $orderPD->getOrderPDStaffID() . "','" . $orderPD->getOrderPDStaffName() . "')";
            $conn = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $conn->exec($sql);
            echo "New record created successfully";
        } catch (PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }
        $conn = null;
    }

    public function retrieveOrderPD($orderPDID) {
        echo "<table style='border: solid 1px black;'>";
        echo "<tr><th>OrderPD ID</th><th>Order ID</th><th>Date</th><th>Time</th><th>Staff ID</th><th>Staff Name</th></tr>";
        try {
            $conn = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("SELECT * FROM " . $this->tableName . " WHERE orderPDID = '" . $orderPDID . "'");
            $stmt->execute();
            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
            foreach (new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k => $v) {
                echo $v;
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        $conn = null;
        echo "</table>";
    }

    public function updateOrderPD(orderPD $orderPD, $orderPDID) {
        try {
            $conn = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "UPDATE " . $this->tableName . 
                    " SET orderID = '" . $orderPD->getOrderID() . 
                    "' , orderPDDate = '" . $orderPD->getOrderPDDate() .
                    "' , orderPDTime = '" . $orderPD->getOrderPDTime() . 
                    "' , orderPDStaffID = '" . $orderPD->getOrderPDStaffID() . 
                    "' , orderPDStaffName = '" . $orderPD->getOrderPDStaffName() .
                    "' WHERE orderPDID = '" . $orderPDID . "'";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            echo $stmt->rowCount() . " records UPDATED successfully";
        } catch (PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }
        $conn = null;
    }

    public function deleteOrderPD($orderPDID) {
        try {
            $conn = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "DELETE FROM " . $this->tableName . " WHERE orderPDID = '" . $orderPDID . "'";
            $conn->exec($sql);
            echo "Record deleted successfully";
        } catch (PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }

        $conn = null;
    }

    public function showAllOrderPD() {
        echo "<table style='border: solid 1px black;'>";
        echo "<tr><th>OrderPD ID</th><th>ID</th><th>Date</th><th>Time</th><th>Staff ID</th><th>Staff Name</th></tr>";
        try {
            $conn = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("SELECT * FROM " . $this->tableName);
            $stmt->execute();
            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
            foreach (new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k => $v) {
                echo $v;
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        $conn = null;
        echo "</table>";
    }
}
