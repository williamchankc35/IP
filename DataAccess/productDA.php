/*
 * @author Ng Choon Yik
 */

<?php
//include_once 'connectDB.php';
include_once 'TableRows.php';
include_once dirname(__FILE__) . '/../Class/product.php';

class productDA {

    private $tableName = "product";
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "FioreFlowershopDB";

    public function insertProduct(product $product) {
        try {
            $sql = "INSERT INTO " . $this->tableName . " (prodName, prodAvailable, prodPrice, prodCategory, cataID) "
                    . "VALUES (?,?,?,?,?)";
            
            
            $conn = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare($sql);
            $stmt->execute([$product->getProdName(), $product->getProdAvailable(),$product->getProdPrice(),$product->getProdCategory(),$product->getCataID()]);
            echo "New record created successfully";
        } catch (PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }
        $conn = null;
    }

    public function retrieveProduct($prodID) {
        echo "<table style='border: solid 1px black;'>";
        echo "<tr><th>ID</th><th>Name</th><th>Available</th><th>Price</th></tr>";
        try {
            $conn = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("SELECT * FROM " . $this->tableName . " WHERE prodID = '" . $prodID . "'");
            $stmt->execute();
            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
            foreach (new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k => $v) {
                echo $v;
                $product = new product($result['prodName'], $result['prodAvailable'], $result['prodPrice'], $result['prodCategory'], $result['cataID']);
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            $product = null;
        }
        $conn = null;
        echo "</table>";
        return $product;
    }

    public function updateProduct(product $product, $prodID) {
        try {
            $conn = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "UPDATE " . $this->tableName . " SET prodName = '" . $product->getProdName() .
                    "' , prodAvailable = '" . $product->getProdAvailable() .
                    "' , prodPrice = '" . $product->getProdPrice() .
                    "' , prodCategory = '" . $product->getProdCategory() .
                    "' , cataID = '" . $product->getCataID() .
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
        echo "<tr><th>ID</th><th>Name</th><th>Available</th><th>Price</th><th>Category</th><th>Catalog ID</th></tr>";
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

//$testprod = new productDA();
//$testprod->showAllProduct();