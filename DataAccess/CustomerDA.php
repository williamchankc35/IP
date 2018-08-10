<?php

include_once 'LoiginDBSetting.php';
include_once dirname(__FILE__).'/../Class/Customer.php';
include_once dirname(__FILE__).'/../Controller/CustomerControl.php';
include_once 'TableRows.php';

class CustomerDA {
    
    private $tableName ="customer";
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "FioreFlowershopDB";
    
      public function RegisterUser(customer $customer) {
        $newID = new CustomerControl();        
        try {
            $sql = "INSERT INTO " . $this->tableName . " (CusID,CusType,CusName,Username,Password,Email,CreditLimit,Status) "
                     ."VALUES('".$customer->getCusID(). "','" . $customer->getCusType() .
                "','". $customer->getCusName() . "','" . $customer->getUsername(). "','"
                .$customer->getPassword() . "','" . $customer->getEmail() . "','".
                $customer->getCreditLimit() . "','" .$customer->getStatus() . "')";
            $conn = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $conn->exec($sql);
            $link_address = "../view/Customer/CustomerLogin.php";
            echo "You have registered successfully!";
            echo " <a  href=".$link_address.">" ;      
            echo "<h3>Go back login page</h3></a>";
        
      
        } catch (PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }
        $conn = null;
    }
    public function Login($username,$password){
        try {
            $pdo = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "SELECT Username, Password FROM customer WHERE Username = '".$username."'AND Password ='".$password."'";          
            if($stmt = $pdo->prepare($sql)){                 
            $stmt->bindParam($username, $param_username, PDO::PARAM_STR); 
            $param_username = trim($username);          
            
            if($stmt->execute()){              
                if($stmt->rowCount() == 1){
                    if($row = $stmt->fetch()){
                        $hashed_password = $password;
                        if($password==$hashed_password){
                            session_start();
                            $_SESSION['username'] = $username;      
                            header("location: ../View/Customer/CustomerMenu.php");
                        }else{                            
                            echo "The password you entered was not valid.";                           
                        }                  
                    }
                } else{                   
                    echo "No account found with that username.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }      
    }  
        catch (PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }
        $conn = null;
              
    }
    
     public function updateCustomer(customer $customer,$username) {
        try {
            $conn = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "UPDATE " . $this->tableName . " SET CusType = '" . $customer->getCusType() .
                    "' , CusName = '" . $customer->getCusName() . "' , Email = '" . $customer->getEmail() .
                    "' , CreditLimit = '" . $customer->getCreditLimit() . "' , Status = '" . $customer->getStatus() .
                    "' WHERE Username = '" . $username . "'";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            echo "Personal Detail records UPDATED successfully";
        } catch (PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }
        $conn = null;
        return $sql;
    }

     public function retrieveCustomer($username) {
        echo "<table style='border: solid 1px black;'>";
        echo "<tr><th>ID</th><th>Type</th><th>Name</th><th>Username</th><th>Password</th><th>Email</th><th>Credit Limit</th><th>Status</th></tr>";
        try {
            $conn = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("SELECT * FROM " . $this->tableName . " WHERE Username = '" . $username . "'");
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
    
 public function retrieveAll() {
        $sql = "SELECT * FROM " . $this->tableName;
        $conn = new LoiginDBSetting();
        $result = $conn->getConn()->query($sql);
        $i = 0;
        if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $record[$i] = new Customer($row["CusID"], $row["CusType"], $row["CusName"], 
                    $row["Username"], $row["Password"], $row["Email"],
                    $row["CreditLimit"], $row["Status"]);
            $i++;
        }               
     }
    return $record;
    }
  
  
    
}
