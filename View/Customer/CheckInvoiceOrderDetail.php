<?php

?>
  <h1 align="center"> Order Detail </h1>
<table border="1" cellspacing="5" cellpadding="5" width="100%">
   
	<thead>
		<tr>
			<th>Order ID</th>
			<th>Product ID</th>
                        <th>Item Qty</th>
                        <th>Product Price</th>
                        <th>Sub Total</th>                      
		</tr>
	</thead>
	<tbody>
	<?php
                $oid = $_POST["oid"];
		require_once('../../DataAccess/config.php');
		$result3 = $pdo->prepare("SELECT * "
                        . "FROM orderdetail  WHERE orderID = '" .$oid."'");
		$result3->execute();
		for($i=0; $row3 = $result3->fetch(); $i++){
	?>
          
            <tr>
			<td><label><?php echo $row3['orderID']; ?></label></td>
			<td><label><?php echo $row3['prodID'];  ?></label></td>                       	
			<td><label><?php echo $row3['itemQty']; ?></label></td>
                        <td><label><?php echo $row3['prodPrice']; ?></label></td>
                        <td><label><?php echo $row3['subTotal']; ?></label></td>                       
                        
		</tr>
		<?php } ?>
                   
	</tbody>
</table>   
  
  <form name="frmRegistration" method="post" action="CheckInvoiceProductDetail.php">
                <td>Search Product Detail</td>
                <td><input type="text" name="pid" required pattern="[1-9999]" Title="Please enter number between 1-9999"> </td>
                <td><input type="submit" value="search" name="search" /></td>
               
                </form>
                </tbody>
  
                