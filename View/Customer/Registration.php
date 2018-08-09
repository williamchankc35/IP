<?Php
include_once '../../Controller/CustomerControl.php';
include_once '../../Class/Customer.php';
include_once '../../DataAccess/LoiginDBSetting.php';
include_once '../../DataAccess/CustomerDA.php';
/* Form Required Field Validation */
Global $Preset1;
Global $Preset2;

if(!empty($_POST["register-user"])) {
    
    if($_POST['CusType'] = 'Corporate'){ 
    $Preset1 = 1000.00;
    $Preset2 ='Good';
}
   else if($_POST['CusType'] = 'Consumer'){ 
    $Preset1 = 0.00;
    $Preset2='Consumer';
}
else{ $error_message ="Please select Customer type";}
    
foreach($_POST as $key=>$value) {
	if(empty($_POST[$key])) {
	$error_message = "All Fields are required";
	break;
	}
}
/* Password Matching Validation */
if($_POST['Password'] != $_POST['confirm_password']){ 
$error_message = 'Passwords should be same<br>'; 
}

/* Email Validation */
if(!isset($error_message)) {
	if (!filter_var($_POST["Email"], FILTER_VALIDATE_EMAIL)) {
	$error_message = "Invalid Email Address";
	}
}


/* Validation to check if Terms and Conditions are accepted */
if(!isset($error_message)) {
	if(!isset($_POST["terms"])) {
	$error_message = "Accept Terms and Conditions to Register";
	}
}

if(!isset($error_message)) {
    $mysql_hostname = "localhost";
    $mysql_user = "root";
    $mysql_password = "";
    $mysql_database = "fioreflowershopdb";
    
    $Customer = new CustomerControl();
    
    $dbh = new PDO("mysql:dbname={$mysql_database};host={$mysql_hostname};port=3306", $mysql_user, $mysql_password);
    $CusID = $Customer->getNewID();
    $CusType = $_POST["CusType"];
    $CusName = $_POST["CusName"];
    $Username =  $_POST["Username"];
    $Password = $_POST["Password"];
    $Email =  $_POST["Email"];
    $CreditLimit = $Preset1;
    $Status = $Preset2;
                               
   $sql = $dbh->prepare("INSERT INTO customer (CusID,CusType,CusName,Username,Password,Email,CreditLimit,Status) VALUES (?,?,?,?,?,?,?,?)");  
    if ($sql->execute(array(
                                            $CusID,
                                            $CusType,
                                            $CusName,
                                            $Username,
                                            $Password,
                                            $Email,
                                            $CreditLimit,
                                            $Status,
                                        ))){                           
                           $error_message = "";
                            $success_message = "You have registered successfully!";	
                            unset($_POST);
                           
                        } else {
                            $error_message = "Problem in registration. Try Again!";	
                            
}
}                      
}

?>

<html>
  <head>
    <title>Customer Registration From</title>
     <a  href="CustomerLogin.php">
         <h3>Go back login page</h3>
        </a><h2 align="Center">Customer Registration Form</h2>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">   
  
  <style type = "text/css">
           And the styles are,
.error-message {
	padding: 7px 10px;
	background: #fff1f2;
	border: #ffd5da 1px solid;
	color: #d6001c;
	border-radius: 4px;
}
.success-message {
	padding: 7px 10px;
	background: #cae0c4;
	border: #c3d0b5 1px solid;
	color: #027506;
	border-radius: 4px;
}
.demo-table {
	background: #d9eeff;
	width: 100%;
	border-spacing: initial;
	margin: 2px 0px;
	word-break: break-word;
	table-layout: auto;
	line-height: 1.8em;
	color: #333;
	border-radius: 4px;
	padding: 20px 40px;
}
.demo-table td {
	padding: 15px 0px;
}
.demoInputBox {
	padding: 10px 30px;
	border: #a9a9a9 1px solid;
	border-radius: 4px;
}
.btnRegister {
	padding: 10px 30px;
	background-color: #3367b2;
	border: 0;
	color: #FFF;
	cursor: pointer;
	border-radius: 4px;
	margin-left: 10px;
}
        </style>
        </head>
  <body>
   
    <form name="frmRegistration" method="post" action="">
	<table border="0" width="500" align="center" class="demo-table">
		<?php if(!empty($success_message)) { ?>	
		<div class="success-message"><?php if(isset($success_message)) echo $success_message; ?></div>
		<?php } ?>
		<?php if(!empty($error_message)) { ?>	
		<div class="error-message"><?php if(isset($error_message)) echo $error_message; ?></div>
		<?php } ?>
		<tr>
			<td>Customer Name</td>
			<td><input type="text" class="demoInputBox" name="CusName" value="<?php if(isset($_POST['CusName'])) echo $_POST['CusName']; ?>"></td>
		</tr>
                <tr>
			<td>Customer Type</td>
			<td><input type="radio" name="CusType" value="Consumer" <?php if(isset($_POST['CusType']) && $_POST['CusType']=="Consumer") { ?>checked<?php  } ?>> Consumer
			<input type="radio" name="CusType" value="Corporate" <?php if(isset($_POST['CusType']) && $_POST['CusType']=="Corporate") { ?>checked<?php  } ?>> Corporate
			</td>
		</tr>
                <tr>
			<td>Email</td>
                        <td><input type="text" class="demoInputBox" name="Email" value="<?php if(isset($_POST['Email'])) echo $_POST['Email']; ?>"></td>
		</tr>

		<tr>
			<td>Username</td>
			<td><input type="text" class="demoInputBox" name="Username" value="<?php if(isset($_POST['Username'])) echo $_POST['Username']; ?>"></td>
		</tr>
		<tr>
			<td>Password</td>
			<td><input type="password" class="demoInputBox" name="Password" value=""></td>
		</tr>
		<tr>
			<td>Confirm Password</td>
			<td><input type="password" class="demoInputBox" name="confirm_password" value=""></td>
		</tr>
		
		
		<tr>
			<td colspan=2>
			<input type="checkbox" name="terms"> I accept Terms and Conditions <input type="submit" name="register-user" value="Register" class="btnRegister"></td>
		</tr>
	</table>
       
</form>

  </body>
</html>

