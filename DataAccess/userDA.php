<?php

include_once 'connectDB.php';
include_once 'TableRows.php';
include_once '/Class/user.php';

class userDA {
    
    private $tableName = "user";
    
    public function insertUser(user $user) {
        try {
            $sql = "INSERT INTO " . $this->tableName . " (userType, userName, userPassword, userStatus) "
                    . "VALUES ('" . $user->getUserType() . "','" . $user->getUserName() .
                    "','" . $user->getUserPassword()  . "','" . $user->getUserStatus() . "')";
            $conn = new connectDB();
            $conn->exec($sql);
            echo "New record created successfully";
        } catch (PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }
        $conn = null;
    }
    
    public function retrieveUser($userName) {
        echo "<table style='border: solid 1px black;'>";
        echo "<tr><th>User Type</th><th>User Name</th><th>User Password</th><th>User Status</th></tr>";
        try {
            $conn = new connectDB();
            $stmt = $conn->prepare("SELECT * FROM " . $this->tableName . " WHERE userName = '" . $userName . "'");
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
    
    public function updateUser(user $user) {
        try {
            $conn = new connectDB();
            $sql = "UPDATE " . $this->tableName . " SET userType = '" . $user->getUserType() .
                    "' , userPassword = '" . $user->getUserPassword() . "' , userStatus = '" . $user->getUserStatus() .                   
                    "' WHERE userName = '" . $user->getuserName() . "'";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            echo $stmt->rowCount() . " records UPDATED successfully";
        } catch (PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }
        $conn = null;
    }
    
    public function deleteUser($userName) {
        try {
            $conn = new connectDB();
            $sql = "DELETE FROM " . $this->tableName . " WHERE userName = '" . $userName . "'";
            $conn->exec($sql);
            echo "Record deleted successfully";
        } catch (PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }
        $conn = null;
    }
    
    public function showAllUser() {
        echo "<table style='border: solid 1px black;'>";
        echo "<tr><th>User Type</th><th>User Name</th><th>User Password</th><th>User Status</th></tr>";
        try {
            $conn = new connectDB();
            $stmt = $conn->prepare("SELECT * FROM " . $this->tableName ."'");
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
