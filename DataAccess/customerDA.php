<?php

include_once 'connectDB.php';
include_once 'TableRows.php';
include_once '/Class/customer.php';

class customerDA {
    
    private $tableName = "customer";
    
    public function insertCustomer(customer $customer) {
        try {
            $sql = "INSERT INTO " . $this->tableName . " (custID, custType, custName, custEmail, custCredit, custStatus) "
                    . "VALUES ('" . $customer->getCustID() . "','" . $customer->getCustType() . "','" . $customer->getCustName() 
                    . "','" . $customer->getCustEmail() . "','" . $customer->getCustCredit() . "','" . $customer->getCustStatus() . "')";
            $conn = new connectDB();
            $conn->exec($sql);
            echo "New record created successfully";
        } catch (PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }
        $conn = null;
    }
    
    public function retrieveCustomer($custID) {
        echo "<table style='border: solid 1px black;'>";
        echo "<tr><th>ID</th><th>Type</th><th>Name</th><th>Email</th><th>Credit</th><th>Status</th></tr>";
        try {
            $conn = new connectDB();
            $stmt = $conn->prepare("SELECT * FROM " . $this->tableName . " WHERE custID = '" . $custID . "'");
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
    
    public function updateCustomer(customer $customer) {
        try {
            $conn = new connectDB();
            $sql = "UPDATE " . $this->tableName . " SET custType = '" . $customer->getCustType() .
                    "' , custName = '" . $customer->getCustName() . "' , custEmail = '" . $customer->getCustEmail() .
                    "' , custCredit = '" . $customer->getCustCredit() . "', custStatus = '" . $customer->getCustStatus() .
                    "' WHERE custID = '" . $customer->getCustID() . "'";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            echo $stmt->rowCount() . " records UPDATED successfully";
        } catch (PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }
        $conn = null;
    }
    
    public function deleteCustomer($custID) {
        try {
            $conn = new connectDB();
            $sql = "DELETE FROM " . $this->tableName . " WHERE custID = '" . $custID . "'";
            $conn->exec($sql);
            echo "Record deleted successfully";
        } catch (PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }
        $conn = null;
    }
    
    public function showAllCustomer() {
        echo "<table style='border: solid 1px black;'>";
        echo "<tr><th>ID</th><th>Type</th><th>Name</th><th>Email</th><th>Credit</th><th>Status</th></tr>";
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
