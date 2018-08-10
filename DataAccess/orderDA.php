<?php

//include_once 'connectDB.php';
include_once 'TableRows.php';
include_once dirname(__FILE__) . '/../Class/order.php';

class orderDA {

    private $tableName = "order";
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "FioreFlowershopDB";
    
    public function insertOrder(order $order) {
        try {
            $sql = "INSERT INTO" . $this->tableName .
                    "(orderDate, "
                    . "orderCustID, orderCustName,"
                    . "orderPD, orderAddress, orderPDDate, orderPDTime, "
                    . "orderTotalAmount)"
                    . "VALUES('" . $order->getOrderDate() . "','"
                    . $order->getOrderCustID() . "','" . $order->getOrderCustName() . "','"
                    . $order->getOrderPD() . "','" . $order->getOrderAddress() . "','"
                    . $order->getOrderPDDATE() . "','" . $order->getOrderPDTime() . "','"
                    . $order->getOrderTotalAmount() . "')";

            $conn = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $conn->exec($sql);
            echo "New record created successfully";
        } catch (PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }
        $conn = null;
    }

    public function insertOrderDetail(orderDetail $od) {
        try {
            $conn = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("SELECT MAX(orderid) FROM " . $this->tableName);
            $stmt->execute();
            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $lastid= $stmt->fetch();
            $sql = "INSERT INTO orderdetail" .
                    "(orderid, prodid, itemqty, prodprice, subtotal) "
                    . "VALUES('" . $order->getOrderDate() . "','"
                    . $od->getOrderID() . "','" . $order->getOrderCustName() . "','"
                    . $order->getOrderPD() . "','" . $order->getOrderAddress() . "','"
                    . $order->getOrderPDDATE() . "','" . $order->getOrderPDTime() . "','"
                    . $order->getOrderTotalAmount() . "')";

            $conn->exec($sql);
            echo "New record created successfully";
        } catch (PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }
        $conn = null;
    }

    public function retrieveOrder($orderID) {
        echo "<table style='border: solid 1px black;'>";
        echo "<tr><th>Order ID</th><th>Order Date</th><th>Customer ID</th>"
        . "<th>Customer Name</th><th>Product ID</th><th>PD</th>"
        . "<th>Address</th><th>PD Date</th><th>PD Time</th>";
        try {
            $conn = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
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
        
    }
    
    public function retrieveOrderDetail($orderID){
        echo "</table><br/>";
        echo "<table style='border: solid 1px black;'>";
        echo "<tr><th>Product ID</th><th>Item Quantity</th>"
        . "<th>Unit Price</th><th>Sub-total</th></tr>";
        try {
            $conn = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("SELECT prodid, itemqty, prodprice, subtotal FROM OrderDetail WHERE orderID = '" . $orderID . "'");
            $stmt->execute();
            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
            foreach (new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k => $v) {
                echo $v;
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        $conn = null;
    }

    public function updateOrder(order $order) {
        try {
            $conn = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "UPDATE " . $this->tableName . " SET orderDate = '" . $order->getOrderDate() .
                    "' , orderCustID = '" . $order->getOrderCustID() . "' ,orderCustName = '" . $order->getOrderCustName() .
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

    public function updateOrderDetail(orderDetail $od) {
        try {
            $conn = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "UPDATE orderDetail SET itemqty = '" . $od->getItemQty() .
                    "', subtotal = '" . $od->getSubtotal() .
                    "' WHERE orderID = '" . $od->getOrderID() . "' AND prodid = '" . $od->getProdID() . "'";
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
            $conn = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "DELETE FROM " . $this->tableName . " WHERE orderID = '" . $orderID . "'";
            $conn->exec($sql);
            echo "Record deleted successfully";
        } catch (PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }
        $conn = null;
    }

    public function showAllOrder() {
        echo "<table style='border: solid 1px black;'>";
        echo "<tr><th>Order ID</th><th>Order Date</th><th>Customer ID</th>"
        . "<th>Customer Name</th><th>PD</th>"
        . "<th>Address</th><th>PD Date</th><th>PD Time</th>"
        . "<th>Address</th></tr>";
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

    public function showOrderDetail(){
        
    }
}
