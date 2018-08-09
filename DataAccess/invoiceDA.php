<?php

//include_once 'connectDB.php';
include_once 'TableRows.php';
include_once dirname(__FILE__).'/../Class/invoice.php';

class invoiceDA {
    
    private $tableName = "invoice";
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "FioreFlowershopDB";
    public function insertInvoice(invoice $invoice) {
        try {
            $sql = "INSERT INTO " . $this->tableName . " (invID, invDate, invCustID, invCustName, invCreateDate, invOrderID, invOrderDate, invTotalOrderAmount, invTotalAmount) "
                    . "VALUES ('" . $invoice->getInvID() . "','" . $invoice->getInvDate() . "','" . $invoice->getInvCustID()
                    . "','" . $invoice->getInvCustName() . "','" . $invoice->getInvCreateDate(). "','" . $invoice->getInvOrderID()
                    . "','" . $invoice->getInvOrderDate() . "','" . $invoice->getInvTotalOrderAmount(). "','" . $invoice->getInvTotalAmount() . "')";
            $conn = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $conn->exec($sql);
            echo "New record created successfully";
        } catch (PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }
        $conn = null;
    }
    
    public function retrieveInvoice($invoiceID) {
        echo "<table style='border: solid 1px black;'>";
        echo "<tr><th>ID</th><th>Date</th><th>Customer ID</th><th>Customer Name</th>Create Date<th></th><th>Order ID</th><th>Order Date</th><th>Total Order Amount</th><th>Total Amount</th></tr>";
        try {
            $conn = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("SELECT * FROM " . $this->tableName . " WHERE invoiceID = '" . $invoiceID . "'");
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
    
    public function updateInvoice(invoice $invoice) {
        try {
            $conn = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "UPDATE " . $this->tableName . " SET invDate = '" . $invoice->getInvDate() .
                    "' , invCustID = '" . $invoice->getInvCustID() . "' , invCustName = '" . $invoice->getInvCustName() .
                    "' , invCreateDate = '" . $invoice->getInvCreateDate() . "', invOrderID = '" . $invoice->getInvOrderID() .
                    "' , invOrderDate = '" . $invoice->getInvOrderDate() . "', invTotalOrderAmount = '" . $invoice->getInvTotalOrderAmount() .
                    "' , invTotalAmount = '" . $invoice->getInvTotalAmount() .
                    "' WHERE invID = '" . $invoice->getInvID() . "'";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            echo $stmt->rowCount() . " records UPDATED successfully";
        } catch (PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }
        $conn = null;
    }
    
    public function deleteInvoice($invoiceID) {
        try {
            $conn = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "DELETE FROM " . $this->tableName . " WHERE invoiceID = '" . $invoiceID . "'";
            $conn->exec($sql);
            echo "Record deleted successfully";
        } catch (PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }
        $conn = null;
    }
    
    public function showAllInvoice() {
        echo "<table style='border: solid 1px black;'>";
        echo "<tr><th>ID</th><th>Date</th><th>Customer ID</th><th>Customer Name</th>Create Date<th></th><th>Order ID</th><th>Order Date</th><th>Total Order Amount</th><th>Total Amount</th></tr>";
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
