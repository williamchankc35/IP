<?php

//include_once 'connectDB.php';
include_once 'TableRows.php';
include_once dirname(__FILE__) . '/../Class/orderPD.php';

class orderPDDA {

    private $tableName = "orderPD";
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "FioreFlowershopDB";

    public function insertOrderPD(orderPD $orderPD) {
        try {
            $sql = "INSERT INTO " . $this->tableName . " (orderPDType, orderID, orderPDDate, orderPDTime, orderPDStaffID, orderPDStaffName) "
                    . "VALUES ('" . $orderPD->getOrderPDType() . "','" . $orderPD->getOrderID() . "','" . $orderPD->getOrderPDDate()
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
        echo "<tr><th>OrderPD ID</th><th>Type</th><th>Order ID</th><th>Date</th><th>Time</th><th>Staff ID</th><th>Staff Name</th></tr>";
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
                    " SET orderPDType = '" . $orderPD->getOrderPDTime() .
                    "' , orderID = '" . $orderPD->getOrderID() .
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
        echo "<tr><th>OrderPD ID</th><th>Type</th><th>ID</th><th>Date</th><th>Time</th><th>Staff ID</th><th>Staff Name</th></tr>";
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

    public function dailyOrderReport($dailyOrder) {
        echo "<table style='border: solid 1px black;'>";
        echo "<tr><th>Daily order report on $dailyOrder</th></tr>";
        echo "<tr><th>OrderPD ID</th><th>Type</th><th>ID</th><th>Date</th><th>Time</th><th>Staff ID</th><th>Staff Name</th></tr>";
        try {
            $conn = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("SELECT * FROM " . $this->tableName . " WHERE orderPDDate = '" . $dailyOrder . "'");
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

    public function dailyPickupReport($dailyPickup) {
        echo "<table style='border: solid 1px black;'>";
        echo "<tr><th>Daily pickup report on $dailyPickup</th></tr>";
        echo "<tr><th>OrderPD ID</th><th>Type</th><th>ID</th><th>Date</th><th>Time</th><th>Staff ID</th><th>Staff Name</th></tr>";
        try {
            $conn = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("SELECT * FROM " . $this->tableName . " WHERE orderPDDate = '" . $dailyPickup . "'" . "AND orderPDType = 'pickup'");
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
    
    public function pickupReport($dailyPickup1, $dailyPickup2) {
        echo "<table style='border: solid 1px black;'>";
        echo "<tr><th>Pickup report from $dailyPickup1 to $dailyPickup2</th></tr>";
        echo "<tr><th>OrderPD ID</th><th>Type</th><th>ID</th><th>Date</th><th>Time</th><th>Staff ID</th><th>Staff Name</th></tr>";
        try {
            $conn = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("SELECT * FROM " . $this->tableName . " WHERE orderPDDate BETWEEN '" . $dailyPickup1 . "' AND '" . $dailyPickup2 . "' AND orderPDType = 'pickup'");
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
    
    public function dailyDeliveryReport($dailyDelivery) {
        echo "<table style='border: solid 1px black;'>";
        echo "<tr><th>Daily delivery report on $dailyDelivery</th></tr>";
        echo "<tr><th>OrderPD ID</th><th>Type</th><th>ID</th><th>Date</th><th>Time</th><th>Staff ID</th><th>Staff Name</th></tr>";
        try {
            $conn = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("SELECT * FROM " . $this->tableName . " WHERE orderPDDate = '" . $dailyDelivery . "'" . "AND orderPDType = 'delivery'");
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
    
    public function deliveryReport($dailyDelivery1, $dailyDelivery2) {
        echo "<table style='border: solid 1px black;'>";
        echo "<tr><th>Pickup report from $dailyDelivery1 to $dailyDelivery2</th></tr>";
        echo "<tr><th>OrderPD ID</th><th>Type</th><th>ID</th><th>Date</th><th>Time</th><th>Staff ID</th><th>Staff Name</th></tr>";
        try {
            $conn = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("SELECT * FROM " . $this->tableName . " WHERE orderPDDate BETWEEN '" . $dailyDelivery1 . "' AND '" . $dailyDelivery2 . "' AND orderPDType = 'delivery'");
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
