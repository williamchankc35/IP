<?php

include_once 'connectDB.php';
include_once 'TableRows.php';
include_once '/Class/order.php';

class orderDA{
    
    private $tableName ="order";
    
    public function insertOrder(order $order){
        try{
            $sql = "INSERT INTO" . $this->tableName . 
                    "(orderID, orderDate, "
                    . "orderCustID, orderCustName, orderProdID, "
                    . "orderProdName, orderQuantity, orderUnitPrice, "
                    . "orderPD, orderAddress, orderPDDate, orderPDTime, "
                    . "orderTotalAmount)"
            ."VALUES('" .$order->getOrderID() . "','" .$order->getOrderDate() . "','" 
                    .$order->getOrderCustID() . "','" .$order->getOrderCustName() . "','" 
                    .$order->getProdID() . "','" .$order->getOrderProdName() . "','" 
                    .$order->getOrderQuantity() . "','" .$order->getOrderUnitPrice() . "','" 
                    .$order->getOrderPD() . "','" .$order->getOrderAddress() . "','" 
                    .$order->getOrderPDDATE() . "','" .$order->getOrderPDTime() . "','" 
                    .$order->getOrderTotalAmount()  . "')";
                                                       
            $conn = new connectDB();
            $conn->exec($sql);
            echo "New record created successfully";
        } catch (PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }
        $conn = null;
        
    }
    
    public function retrieveOrder($orderID){
       echo "<table style='border: solid 1px black;'>";
        echo "<tr><th>Order ID</th><th>Order Date</th><th>Customer ID</th>"
       . "<th>Customer Name</th><th>Product ID</th><th>Product Name</th>"
       . "<th>Quantity</th><th>Unit Price</th><th>PD</th>"
       . "<th>Address</th><th>PD Date</th><th>PD Time</th>"
       . "<th>Address</th></tr>";
        try {
            $conn = new connectDB();
            $stmt = $conn->prepare("SELECT * FROM " . $this->tableName . " WHERE orderID = '" . $orderID . "'");
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
    
    public function updateOrder(order $order) {
        try {
            $conn = new connectDB();
            $sql = "UPDATE " . $this->tableName . " SET orderDate = '" . $order->getOrderDate() .
                    "' , orderCustID = '" . $order->getOrderCustID() . "' ,orderCustName = '" . $order->getOrderCustName() .
                    "' , orderProdID = '" . $order->getOrderProdID() . "', orderProdName = '" . $order->getOrderProdName() .
                    "' , orderQuantity = '" . $order->getOrderQuantity() . "', orderUnitPrice = '" . $order->getOrderUnitPrice() .
                    "' , orderPD = '" . $order->getOrderPD() . "', orderAddress = '" . $order->getOrderAddress() .
                    "' , orderPDDATE = '" . $order->getOrderPDDate() . "', orderPDTime = '" . $order->getOrderPDTime() .
                    "' , orderTotalAmount = '" . $order->getOrderTotalAmount() .
                    "' WHERE orderID = '" . $order->getOrderID() . "'";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            echo $stmt->rowCount() . " records UPDATED successfully";
        } catch (PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }
        $conn = null;
    } 
    public function deleteOrder($orderID) {
        try {
            $conn = new connectDB();
            $sql = "DELETE FROM " . $this->tableName . " WHERE orderID = '" . $orderID . "'";
            $conn->exec($sql);
            echo "Record deleted successfully";
        } catch (PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }
        $conn = null;
    }
     public function showAllOrder(){
       echo "<table style='border: solid 1px black;'>";
        echo "<tr><th>Order ID</th><th>Order Date</th><th>Customer ID</th>"
       . "<th>Customer Name</th><th>Product ID</th><th>Product Name</th>"
       . "<th>Quantity</th><th>Unit Price</th><th>PD</th>"
       . "<th>Address</th><th>PD Date</th><th>PD Time</th>"
       . "<th>Address</th></tr>";
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
