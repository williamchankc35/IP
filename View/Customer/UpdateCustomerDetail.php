
<?php

session_start();

if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
  header("location: Customerlogin.php");
  exit;
}
?>
<html>
    <script type="text/javascript">

  if(!RegExp.escape) {
    RegExp.escape = function(s) {
      return String(s).replace(/[\\^$*+?.()|[\]{}]/g, '\\$&');
    };
  }
</script>
  
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
			<td><input type="text" class="demoInputBox" name="CusName" value="<?php if(isset($_POST['CusName'])) echo $_POST['CusName']; ?>"required></td>
		</tr>
                <tr>
			<td>Customer Type</td>
			<td><input type="radio" name="CusType" value="Consumer" <?php if(isset($_POST['CusType']) && $_POST['CusType']=="Consumer") { ?>checked<?php  } ?>> Consumer
			<input type="radio" name="CusType" value="Corporate" <?php if(isset($_POST['CusType']) && $_POST['CusType']=="Corporate") { ?>checked<?php  } ?>> Corporate
			</td>
		</tr>
                <tr>
			<td>Email</td>
                        <td><input type="text" class="demoInputBox" name="Email" value="<?php if(isset($_POST['Email'])) echo $_POST['Email']; ?>" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" title="Email should only correct format. e.g. xxx@xxmail.com" reuquired></td>
		</tr>

		<tr>
			<td>Password</td>
			<td><input type="password" class="demoInputBox" name="Password" value="" required onchange="form.confirm_password.pattern = RegExp.escape(this.value);"></td>
		</tr>
		<tr>
			<td>Confirm Password</td>
			<td><input type="password" class="demoInputBox" name="confirm_password" value="" title="confirm password must same as password"></td>
		</tr>
		
		
		<tr>
			<td></td>
                        <td colspan=2>
			<input type="submit" name="Update-user" value="Update" class="btnRegister"></td>
		</tr>
	</table>
       
</form>

  </body>
</html>

