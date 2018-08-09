<?php
include_once '../../DataAccess/CustomerDA.php';


class CustomerControl{
   
    private $CustomerDA;
    
    function __construct() {
        $this->CustomerDA = new CustomerDA();
    }
   
    public function retrieveRecordwithID($CusID) {
        if ($this->CustomerDA == NULL) {
            $this->CustomerDA = new CustomerDA();
        }
        return $this->CustomerDA->retrieveRecordwithID($CusID);
    }

    function insertRecord(Customer $Customer) {
        if ($this->CustomerDA == NULL) {
            $this->CustomerDA = new CustomerDA();
        }
        return $this->CustomerDA->insertRecord($Customer);
    }

    function updateRecord(Customer $Customer) {
        if ($this->CustomerDA == NULL) {
            $this->CustomerDA = new CustomerDA();
        }
        return $this->CustomerDA->updateRecord($Customer);
    }

   /* function searchRecord($find) {
        if ($this->studentDA == NULL) {
            $this->studentDA = new StudentDA();
        }
        return $this->studentDA->searchRecord($find);
    }*/

    function retrieveAll() {
        if ($this->CustomerDA == NULL) {
            $this->CustomerDA = new CustomerDA();
        }
        return $this->CustomerDA->retrieveAll();
    }
    
    function verifyCustomer($Username ,$Password){
        if ($this->CustomerDA == NULL) {
            $this->CustomerDA = new CustomerDA();
        }
        return $this->CustomerDA->verifyCustomer($Username ,$Password);
    }
    public function retrieveIDithName($CusName) {
       if ($this->CustomerDA  == NULL) {
            $this->CustomerDA  = new CustomerDA();
        }
        return $this->CustomerDA ->retrieveIDithName($CusName);
    
        
    }
    
    
    /*public function retrieveRecordwithProgID($progID) {
    if ($this->studentDA == NULL) {
            $this->studentDA = new StudentDA();
        }
        return $this->studentDA->retrieveRecordwithProgID($progID);
                          
    }*/
    
    public function retrieveNamewithID($CusID) {
        if ($this->CustomerDA  == NULL) {
            $this->CustomerDA  = new CustomerDA();
        }
        return $this->CustomerDA ->retrieveNamewithID($CusID);
    
    }
    
    public function retrieveIDwithName($CusName) {
        if ($this->CustomerDA  == NULL) {
            $this->CustomerDA  = new CustomerDA ();
        }
        return $this->CustomerDA ->retrieveIDwithName($CusName);
        
    }
    
    function getNewID (){
        if ($this->CustomerDA  == NULL) {
            $this->CustomerDA  = new CustomerDA();
        }
       $row = count($this->CustomerDA ->retrieveAll());
       $totalrow = $row+1;
        return "CS".$totalrow;
    }
    
}