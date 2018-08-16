<?php

//include_once 'connectDB.php';
include_once 'TableRows.php';
include_once dirname(__FILE__).'/../Class/catalog.php';

$aa= new catalogDA();
$aa-> retrieveCatalogProducts(1);

class catalogDA {

    private $tableName = "catalog";
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "FioreFlowershopDB";
    
    
    public function insertCatalog(catalog $catalog) {
        try {
            $sql = "INSERT INTO " . $this->tableName . " (cataMonth, cataYear, cataProducts, cataPrice) "
                    . "VALUES ('" . $catalog->getCataMonth() . "','" . $catalog->getCataYear() . "','" . $catalog->getCataProducts() . "','" . $catalog->getCataPrice() . "')";
            
            $conn = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $conn->exec($sql);
            echo "New record created successfully";
        } catch (PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }
        $conn = null;
    }

    public function retrieveCatalog($cataID) {
        echo "<table style='border: solid 1px black;'>";
        echo "<tr><th>ID</th><th>Period</th><th>Price</th><th>Description</th></tr>";
        try {
            
            $conn = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("SELECT * FROM " . $this->tableName . " WHERE cataID = '" . $cataID . "'");
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
    
    public function retrieveCatalogProducts($cataID) {
        echo "<table style='border: solid 1px black;'>";
        echo "<tr><th>ID</th><th>Name</th><th>Available</th><th>Price</th><th>Category</th></tr>";
        try {
            
            $conn = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("SELECT prodID, prodName, prodAvailable, prodPrice, prodCategory FROM product WHERE cataID = ?");
            $stmt->execute([$cataID]);
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
    

    public function updateCatalog(catalog $catalog) {
        try {
            $conn = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "UPDATE " . $this->tableName . " SET cataMonth =? , cataYear = '" . 
                    $catalog->getCataYear() . "' , cataProducts = '" . $catalog->getCataProducts() . "' , cataPrice = '" . $catalog->getCataPrice() . 
                    "' WHERE cataID = '" . $catalog->getCataID() . "'";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$catalog->getCataDate(),$catalog->getCataDesc()]);
            echo $stmt->rowCount() . " records UPDATED successfully";
        } catch (PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }
        $conn = null;
    }

    public function deleteCatalog($cataID) {
        try {
            
            $conn = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "DELETE FROM " . $this->tableName . " WHERE cataID = '" . $cataID . "'";
            $conn->exec($sql);
            echo "Record deleted successfully";
        } catch (PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }

        $conn = null;
    }

    public function showAllCatalog() {
        echo "<table style='border: solid 1px black;'>";
        echo "<tr><th>ID</th><th>Period</th><th>Price</th><th>Description</th></tr>";
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
    
    public function retrieveProductbyCatalog($cataName) {
        echo "<table style='border: solid 1px black;'>";
        echo "<tr><th>ID</th><th>Name</th><th>Quantity</th><th>Available</th><th>Price</th><th>Category</th></tr>";
        try {
            
            $conn = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("SELECT * FROM PRODUCT WHERE prodCategory = '" . $cataName . "'");
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
