<?php
session_start();
 
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
  header("location: Customerlogin.php");
  exit;
}
?>

<html>
    <body>
    <h1 align="center"> Generate Invoice </h1>
    <form name="frmRegistration" method="post" action="../../Controller/CustomerControl.php">
    Month:<input type="text" class="demoInputBox" name="Month" value="" pattern="[0-12]" title="Month must between 1-12" required>  
    Year :<input type="text" class="demoInputBox" name="Year" value="" pattern="[2000-2999]" title="Year must between 1-2999" required>
    <input type="submit" name="generateInv"  value="Generate">
    </form>
    </body>
</html>