<?php

include_once 'connectDB.php';
include_once 'TableRows.php';
include_once dirname(__FILE__).'/../Class/orderPD.php';

class orderPDDA {
    
    private $tableName = "orderPD";
    
    public function insertOrderPD(orderPD $orderPD) {
        try {
            $sql = "INSERT INTO " . $this->tableName . " (orderPDID, orderPDDate, orderPDTime, orderPDStaffID, orderPDStaffName) "
                    . "VALUES ('" . $orderPD->getOrderPDID() . "','" . $orderPD->getOrderPDDate() 
                    . "','" . $orderPD->getOrderPDTime() . "','" . $orderPD->getOrderPDStaffID() . "','" . $orderPD->getOrderPDStaffName() . "')";
            $conn = new connectDB();
            $conn->exec($sql);
            echo "New record created successfully";
        } catch (PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }
        $conn = null;
    }

    public function retrieveOrderPD($orderPDID) {
        echo "<table style='border: solid 1px black;'>";
        echo "<tr><th>ID</th><th>Date</th><th>Time</th><th>Staff ID</th><th>Staff Name</th></tr>";
        try {
            $conn = new connectDB();
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

    public function updateOrderPD(orderPD $orderPD) {
        try {
            $conn = new connectDB();
            $sql = "UPDATE " . $this->tableName . " SET orderPDDate = '" . $catalog->getOrderPDDate() .
                    "' , orderPDTime = '" . $catalog->getOrderPDTime() . "' , orderPDStaffID = '" . $catalog->getOrderPDStaffID() . 
                    "' , orderPDStaffName = '" . $catalog->getOrderPDStaffName() .
                    "' WHERE orderPDID = '" . $catalog->getOrderPDID() . "'";
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
            $conn = new connectDB();
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
        echo "<tr><th>ID</th><th>Date</th><th>Time</th><th>Staff ID</th><th>Staff Name</th></tr>";
        try {
            $conn = new connectDB();
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
