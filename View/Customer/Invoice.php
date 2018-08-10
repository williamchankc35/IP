<?php
session_start();
 
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
  header("location: Customerlogin.php");
  exit;
}

?>


<h1 align="center"> Invoice </h1>
<table border="1" cellspacing="5" cellpadding="5" width="100%">
	<thead>
		<tr>
			<th>Order ID</th>
			<th>Order Date</th>
			<th>Customer ID</th>
			<th>Customer Name</th>
			<th>order P/D</th>
                        <th>Address</th>
                        <th>P/D Date</th>
                        <th>P/D Time</th>
                        <th>Total Amount</th>
		</tr>
	</thead>
	<tbody>
	<?php
                $time1 = $_POST["time1"];
                $time2 = $_POST["time2"];
		require_once('../../DataAccess/config.php');
		$result2 = $pdo->prepare("SELECT orderID,orderDate,orderCustID,orderCustName,orderPD,orderAddress,orderPDDate,orderPDTime,orderTotalAmount "
                        . "FROM `".order ."` WHERE orderDate BETWEEN '" . $time1 . "' AND '" . $time2 . "' AND orderCustName = '".$_SESSION['username']."'");
		$result2->execute();
		for($i=0; $row2 = $result2->fetch(); $i++){
	?>
		<tr>
			<td><label><?php echo $row2['orderID'];  $oID=$row2['orderID'];?></label></td>
			<td><label><?php echo $row2['orderDate']; ?></label></td>		
			<td><label><?php echo $row2['orderCustID']; ?></label></td>
                        <td><label><?php echo $row2['orderCustName']; ?></label></td>
                        <td><label><?php echo $row2['orderPD']; ?></label></td>
                        <td><label><?php echo $row2['orderAddress']; ?></label></td>
                        <td><label><?php echo $row2['orderPDDate']; ?></label></td>
                        <td><label><?php echo $row2['orderPDTime']; ?></label></td>
                        <td><label><?php echo $row2['orderTotalAmount']; ?></label></td>
                                   <?php  $Total =+ $row2['orderTotalAmount']   ?>
                                    
              
		</tr>
              
</table>
  <h3 align="right"><?php   echo "Total Amount($time1 to $time2) : $Total" ;}  ?></h3>
  <form name="frmRegistration" method="post" action="CheckInvoiceOrderDetail.php">
                <td>Search Order Detail</td>
                <td><input type="text" name="oid" required pattern="[1-9999]" Title="Please enter number between 1-9999"> </td>
                <td><input type="submit" value="search" name="search" /></td>
               
                </form>
                </tbody>
                          
             
		

	

                       
