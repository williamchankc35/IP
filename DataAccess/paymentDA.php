<?php

include_once 'connectDB.php';
include_once 'TableRows.php';
include_once '/Class/payment.php';

class customerDA {
    
    private $tableName = "payment";
    
    public function insertPayment(payment $payment) {
        try {
            $sql = "INSERT INTO " . $this->tableName . " (paymentOrderInvID, paymentDateTime) "
                    . "VALUES ('" . $payment->getPaymentOrderInvID() . "','" . $payment->getPaymentDateTime()  . "')";
            $conn = new connectDB();
            $conn->exec($sql);
            echo "New record created successfully";
        } catch (PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }
        $conn = null;
    }
    
    public function retrievePayment($paymentOrderInvID) {
        echo "<table style='border: solid 1px black;'>";
        echo "<tr><th>ID</th><th>DATE and Time</th></tr>";
        try {
            $conn = new connectDB();
            $stmt = $conn->prepare("SELECT * FROM " . $this->tableName . " WHERE paymentOrderInvID = '" . $paymentOrderInvID . "'");
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
    
    public function updatePayment(payment $payment) {
        try {
            $conn = new connectDB();
            $sql = "UPDATE " . $this->tableName . " SET paymentOrderInvID = '" . $payment->getPaymentOrderInvID() .
                    "' , paymentDateTime = '" . $payment->getPaymentDateTime() . 
                    "' WHERE paymentOrderInvID = '" . $payment->getpaymentOrderInvID() . "'";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            echo $stmt->rowCount() . " records UPDATED successfully";
        } catch (PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }
        $conn = null;
    }
    
    public function deletePayment($paymentOrderInvID) {
        try {
            $conn = new connectDB();
            $sql = "DELETE FROM " . $this->tableName . " WHERE paymentOrderInvID = '" . $paymentOrderInvID. "'";
            $conn->exec($sql);
            echo "Record deleted successfully";
        } catch (PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }
        $conn = null;
    }
    
    public function showAllPayment() {
          echo "<table style='border: solid 1px black;'>";
        echo "<tr><th>ID</th><th>DATE and Time</th></tr>";
        try {
            $conn = new connectDB();
            $stmt = $conn->prepare("SELECT * FROM " . $this->tableName );
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
