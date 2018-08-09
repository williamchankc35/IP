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
			<th>Invoice ID</th>
			<th>Invoice Date</th>
			<th>Customer Name</th>
			<th>Created Date</th>
                        <th>Total Order Amount</th>
                        <th>Total Amount</th>
		</tr>
	</thead>
	<tbody>
	<?php
		require_once('../../DataAccess/config.php');
		$result = $pdo->prepare("SELECT invID,invDate,invCustName,invCreateDate,invOrderID,invOrderDate,invTotalOrderAmount,invTotalAmount "
                        . "FROM invoice WHERE invCustName='".$_SESSION['username']."'");
		$result->execute();
		for($i=0; $row = $result->fetch(); $i++){
	?>
		<tr>
			<td><label><?php echo $row['invID']; ?></label></td>
			<td><label><?php echo $row['invDate']; ?></label></td>
			<td><label><?php echo $row['invCustName']; ?></label></td>
			<td><label><?php echo $row['invCreateDate']; ?></label></td>                                                
                        <td><label><?php echo $row['invTotalOrderAmount']; ?></label></td>
                        <td><label><?php echo $row['invTotalAmount']; ?></label></td>
                        <?php $OrderID = $row['invOrderID']?>
		</tr>              
		<?php } ?>
	</tbody>
</table>

<h1 align="center"> Order List </h1>
<table border="1" cellspacing="5" cellpadding="5" width="100%">
	<thead>
		<tr>
			<th>Order ID</th>
			<th>Order Date</th>
			<th>Product ID</th>
			<th>Product Name</th>
			<th>Quantity</th>
                        <th>Unit Price</th>
                        <th>P/D</th>
                        <th>Address</th>
                        <th>P/D Date</th>
                        <th>P/D Time</th>
                        <th>Total Amount</th>
		</tr>
	</thead>
	<tbody>
	<?php
		require_once('../../DataAccess/config.php');
		$result2 = $pdo->prepare("SELECT orderID,orderDate,orderProdID,orderProdName,orderQuantity,orderUnitPrice,orderPD,orderAddress,orderPDDate,orderPDTime,orderTotalAmount "
                        . "FROM `".order ."` WHERE orderCustName='".$_SESSION['username']."'");
		$result2->execute();
		for($i=0; $row2 = $result2->fetch(); $i++){
	?>
		<tr>
			<td><label><?php echo $row2['orderID']; ?></label></td>
			<td><label><?php echo $row2['orderDate']; ?></label></td>		
			<td><label><?php echo $row2['orderProdID']; ?></label></td>
                        <td><label><?php echo $row2['orderProdName']; ?></label></td>
                        <td><label><?php echo $row2['orderQuantity']; ?></label></td>
                        <td><label><?php echo $row2['orderUnitPrice']; ?></label></td>
                        <td><label><?php echo $row2['orderPD']; ?></label></td>
                        <td><label><?php echo $row2['orderAddress']; ?></label></td>
                        <td><label><?php echo $row2['orderPDDate']; ?></label></td>
                        <td><label><?php echo $row2['orderPDTime']; ?></label></td>
                        <td><label><?php echo $row2['orderTotalAmount']; ?></label></td>
		</tr>
		<?php } ?>
	</tbody>
</table>