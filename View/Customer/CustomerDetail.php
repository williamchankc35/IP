<?php
session_start();
 
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
  header("location: Customerlogin.php");
  exit;
}
?>
 
  <?php
        include_once dirname(__FILE__) . '/../../DataAccess/CustomerDA.php';
        ?>

<table border="1">
            <tr>
                <th>Profile</th>
            </tr>
            <tr>
            <?php
            $show = new CustomerDA();           
            $show->retrieveCustomer($_SESSION['username']);
            ?>
            </tr>
        </table>
