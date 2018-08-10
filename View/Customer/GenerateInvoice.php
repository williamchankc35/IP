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
    <form name="frmRegistration" method="post" action="Invoice.php" align="center">
    <td>Generate Invoice</td>
    <td><input type="date" name="time1"> to <input type="date" name="time2"></td>
    <td><input type="submit" value="Generate" name="generate" /></td>

    </form>
    </body>
</html>