<?php
session_start();
 
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
  header("location: Customerlogin.php");
  exit;
}
?>

<h1 align="center"> Order List </h1>
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
			<td><label><?php echo $row2['orderID']; ?></label></td>
			<td><label><?php echo $row2['orderDate']; ?></label></td>		
			<td><label><?php echo $row2['orderCustID']; ?></label></td>
                        <td><label><?php echo $row2['orderCustName']; ?></label></td>
                        <td><label><?php echo $row2['orderPD']; ?></label></td>
                        <td><label><?php echo $row2['orderAddress']; ?></label></td>
                        <td><label><?php echo $row2['orderPDDate']; ?></label></td>
                        <td><label><?php echo $row2['orderPDTime']; ?></label></td>
                        <td><label><?php echo $row2['orderTotalAmount']; ?></label></td>
                        
		</tr>
                </tbody>
</table>
                <h1 align="center"> Product Lit </h1>
<table border="1" cellspacing="5" cellpadding="5" width="100%">
	<thead>
		<tr>
			<th>Order ID</th>
			<th>Product ID</th>
			<th>Product Type</th>
			<th>Product Description</th>
			<th>Item Qty</th>
                        <th>Product Price</th>
                        <th>Sub Total</th>                      
		</tr>
	</thead>
	<tbody>
	<?php

		require_once('../../DataAccess/config.php');
		$result3 = $pdo->prepare("SELECT * "
                        . "FROM `".orderdetail ."` WHERE orderDate '" . $row2['orderID']."'");
		$result3->execute();
		for($i=0; $row3 = $result3->fetch(); $j++){
	?>
            <?php

		require_once('../../DataAccess/config.php');
		$result4 = $pdo->prepare("SELECT * "
                        . "FROM `".product."` WHERE orderDate '" . $row3['ProdID']."'");
		$result4->execute();
		for($i=0; $row4 = $result4->fetch(); $k++){
	?>
            <tr>
			<td><label><?php echo $row3['orderID']; ?></label></td>
			<td><label><?php echo $row3['ProdID']; ?></label></td>
                        <td><label><?php echo $row4['ProdType']; ?></label></td>
                         <td><label><?php echo $row4['ProdDesc']; ?></label></td>	
			<td><label><?php echo $row3['itemQty']; ?></label></td>
                        <td><label><?php echo $row3['prodPrice']; ?></label></td>
                        <td><label><?php echo $row3['subTotal']; ?></label></td>                       
                        
		</tr>
		<?php } ?>
                    <?php } ?>
	</tbody>
</table>               
		<?php } ?>

	

                       
