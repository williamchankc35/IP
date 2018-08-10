<?php
include_once dirname(__FILE__).'/../DataAccess/CustomerDA.php';
$da = new CustomerDA();
$new = new CustomerControl();
$Preset1 = $Preset2= "";

if(isset($_POST["register-user"])){
        
    if($_POST["CusType"] == "Corporate"){ 
    $Preset1 = 1000.00;
    $Preset2 ="Good";
}
   else if($_POST["CusType"] == "Consumer"){ 
    $Preset1 = 0.00;
    $Preset2="Consumer";
}
  else{ $Preset1 = 0.00;
        $Preset2= null;}
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
if(isset($_POST["Login"])){
    
    $username = $_POST["username"];
    $password = $_POST["password"];
  
    $da->Login($username,$password);
    
}

if(isset($_POST["Update-user"])&&empty($error_message)){
          
    if($_POST["CusType"] == "Corporate"){ 
    $Preset1 = 1000.00;
    $Preset2 ="Good";
}
   else if($_POST["CusType"] == "Consumer"){ 
    $Preset1 = 0.00;
    $Preset2="Consumer";
}
  else{ $Preset1 = 0.00;
        $Preset2= null;}
    $CusID = null;
    $CusType = $_POST["CusType"];
    $CusName = $_POST["CusName"];
    $username =  $_SESSION['username'];
    $Password = null;
    $Email =  $_POST["Email"];
    $CreditLimit = $Preset1;
    $Status = $Preset2;
    $customer = new Customer($CusID,$CusType,$CusName,$username, $Password,$Email, $CreditLimit,$Status);
    $da->updateCustomer($customer,$username);
    
    }    


class CustomerControl{
   
    private $CustomerDA;    
    
    function __construct() {
        $this->CustomerDA = new CustomerDA();
    }
    
    public function register(){
        
    }
    function retrieveAll() {
        if ($this->CustomerDA == NULL) {
            $this->CustomerDA = new CustomerDA();
        }
        return $this->CustomerDA->retrieveAll();
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


