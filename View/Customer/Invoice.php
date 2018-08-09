<?php
session_start();
 
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
  header("location: Customerlogin.php");
  exit;
}
?>
<table border="1" cellspacing="5" cellpadding="5" width="100%">
	<thead>
		<tr>
			<th>Invoice ID</th>
			<th>Invoice Date</th>
			<th>Customer Name</th>
			<th>Created Date</th>
			<th>Order ID</th>
                        <th>Order Date</th>
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
			<td><label><?php echo $row['invOrderID']; ?></label></td>
                        <td><label><?php echo $row['invOrderDate']; ?></label></td>
                        <td><label><?php echo $row['invTotalOrderAmount']; ?></label></td>
                        <td><label><?php echo $row['invTotalAmount']; ?></label></td>
		</tr>
		<?php } ?>
	</tbody>
</table>