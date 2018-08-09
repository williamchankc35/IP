
<?php

session_start();

if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
  header("location: Customerlogin.php");
  exit;
}
include_once '../../Controller/CustomerControl.php';
include_once '../../Class/Customer.php';
include_once '../../DataAccess/LoiginDBSetting.php';
include_once '../../DataAccess/CustomerDA.php';
Global $Preset1;
Global $Preset2;

if(!empty($_POST["Update-user"])) {
    
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
}

?>
<html>
  <head>
    <title>Customer Registration From</title>

        </a><h2 align="Center">Edit Information</h2>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">   
  
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
			<td>Password</td>
			<td><input type="password" class="demoInputBox" name="Password" value=""></td>
		</tr>
		<tr>
			<td>Confirm Password</td>
			<td><input type="password" class="demoInputBox" name="confirm_password" value=""></td>
		</tr>
		
		
		<tr>
			<td colspan=2>
			<input type="submit" name="Update-user" value="Update" class="btnRegister"></td>
		</tr>
	</table>
       
</form>

  </body>
</html>

