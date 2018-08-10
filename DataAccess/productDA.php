<?php

//include_once 'connectDB.php';
include_once 'TableRows.php';
include_once dirname(__FILE__).'/../Class/product.php';

class productDA {
    
    private $tableName = "product";
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "FioreFlowershopDB";
    

    public function insertProduct(product $product) {
        try {
            $sql = "INSERT INTO " . $this->tableName . " (prodName, prodQuantity, prodAvailable, prodPrice, prodCategory) "
                    . "VALUES ('" . $product->getProdName() . "','" . $product->getProdQuantity() . "','" . $product->getProdAvailable()
                    . "','" . $product->getProdPrice() . "','" . $product->getProdCategory() . "')";
            $conn = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $conn->exec($sql);
            echo "New record created successfully";
        } catch (PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }
        $conn = null;
    }

    public function retrieveProduct($prodID) {
        echo "<table style='border: solid 1px black;'>";
        echo "<tr><th>ID</th><th>Name</th><th>Quantity</th><th>Available?</th></tr>";
        try {
            $conn = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("SELECT * FROM " . $this->tableName . " WHERE prodID = '" . $prodID . "'");
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

    public function updateProduct(product $product, $prodID) {
        try {
            $conn = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "UPDATE " . $this->tableName . " SET prodName = '" . $product->getProdName() .
                    "' , prodQuantity = '" . $product->getProdQuantity() . "' , prodAvailable = '" . $product->getProdAvailable() . $product->getProdPrice() . $product->getProdCategory() .
                    "' WHERE prodID = '" . $prodID . "'";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            echo $stmt->rowCount() . " records UPDATED successfully";
        } catch (PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }
        $conn = null;
    }

    public function deleteProduct($prodID) {
        try {
            $conn = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "DELETE FROM " . $this->tableName . " WHERE prodID = '" . $prodID . "'";
            $conn->exec($sql);
            echo "Record deleted successfully";
        } catch (PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }

        $conn = null;
    }

    public function showAllProduct() {
        echo "<table style='border: solid 1px black;'>";
        echo "<tr><th>ID</th><th>Name</th><th>Quantity</th><th>Available?</th><th>Price</th><th>Category</th></tr>";
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
    
    public function retrieveProductData($prodID) {
        try {
            $conn = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("SELECT prodName, prodQuantity, prodAvailable, prodPrice, prodCategory FROM `" . $this->tableName . "` WHERE prodID='" . $prodID . "'");
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            $product = new product($result['prodName'], $result['prodQuantity'], $result['prodAvailable'], $result['prodPrice'], $result['prodCategory']);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            $product = null;
        }
        return $product;
    }
}

//$testprod = new productDA();
//$testprod->showAllProduct();