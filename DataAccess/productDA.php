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
    
    public function getConn() {
        try {
            $conn = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Connected successfully";
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public function insertProduct(product $product) {
        try {
            $sql = "INSERT INTO " . $this->tableName . " (prodID, prodType, prodDesc, prodAvailable) "
                    . "VALUES ('" . $product->getProdID() . "','" . $product->getProdType() . "','" . $product->getProdDesc() . "','" . $product->getProdAvailable() . "')";
            $conn = new connectDB();
            $conn->exec($sql);
            echo "New record created successfully";
        } catch (PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }
        $conn = null;
    }

    public function retrieveProduct($prodID) {
        echo "<table style='border: solid 1px black;'>";
        echo "<tr><th>ID</th><th>Type</th><th>Description</th><th>Available?</th></tr>";
        try {
            $conn = new connectDB();
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

    public function updateProduct(product $product) {
        try {
            $conn = new connectDB();
            $sql = "UPDATE " . $this->tableName . " SET prodType = '" . $catalog->getProdType() .
                    "' , prodDesc = '" . $catalog->getProdDesc() . "' , prodAvailable = '" . $catalog->getProdAvailable() .
                    "' WHERE prodID = '" . $catalog->getProdID() . "'";
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
            $conn = new connectDB();
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
        echo "<tr><th>ID</th><th>Type</th><th>Description</th><th>Available?</th></tr>";
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

$testprod = new productDA();
$testprod->showAllProduct();