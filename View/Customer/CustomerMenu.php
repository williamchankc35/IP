<?php

session_start();
 
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
  header("location: Customerlogin.php");
  exit;
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
     
 body{ 
     font: 14px sans-serif; text-align: center; 
 }
        
.li.no-sub  {
  position: absolute;
  right: 1em;
}
.frame {
    height: 81vh;
    width: 1300px;
    display: inline-block;
}

    </style>
</head>
<body>
    <div class="page-header">
        <h1>Hi, <b ><font color="red"><?php echo htmlspecialchars($_SESSION['username']); ?></font></b>. Welcome to our site.</h1>
        <p><a href="logout.php" class="btn btn-danger">Sign Out of Your Account</a></p>
        <table align="center" border="1">
            
        <tr>
            <td><li class="no-sub"><a href="CustomerDetail.php" target="iframe">Profile</a></li></td>
            <td><li class="no-sub"><a href="UpdateCustomerDetail.php" target="iframe">Maintain</a></li></td>
            <td><li class="no-sub"> <a href="Invoice.php" target="iframe">invoice</a></li></td>
        </tr>
        </table>
    </div>
     <div class="frame" >
                <iframe frameBorder="0" height="100%" width="100%" src="" name="iframe" scrolling="no"></iframe>
            </div>
    
</body>
</html>