<?php
include_once dirname(__FILE__).'/../DataAccess/CustomerDA.php';

$da = new CustomerDA();
$new = new CustomerControl();

if(isset($_POST["register-user"])){
        
    if($_POST['CusType'] = 'Corporate'){ 
    $Preset1 = 1000.00;
    $Preset2 ='Good';
}
   else if($_POST['CusType'] = 'Consumer'){ 
    $Preset1 = 0.00;
    $Preset2='Consumer';
}
    $CusID = $new->getNewID();
    $CusType = $_POST["CusType"];
    $CusName = $_POST["CusName"];
    $Username =  $_POST["Username"];
    $Password = $_POST["Password"];
    $Email =  $_POST["Email"];
    $CreditLimit = $Preset1;
    $Status = $Preset2;
    $customer = new Customer($CusID,$CusType,$CusName,$Username,$Password, $Email, $CreditLimit,$Status);
    $da->RegisterUser($customer);
    }
if(isset($_POST["add_to_cart"])){
    
}

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
?>

   <html>
    <form action="../View/Customer/CustomerLogin.php">
        <input type="submit" value="Back" name="Back" />
    </form>
</html>