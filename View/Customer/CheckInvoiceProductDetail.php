<?php

?>
  <h1 align="center"> Product Detail </h1>
<table border="1" cellspacing="5" cellpadding="5" width="100%">
   
	<thead>
		<tr>
			<th>Product ID</th>
			<th>Product Name</th>
                        <th>Product Category</th>
                        <th>Product Price</th>                                        
		</tr>
	</thead>
	<tbody>
	<?php
                $pid = $_POST["pid"];
		require_once('../../DataAccess/config.php');
		$result3 = $pdo->prepare("SELECT * "
                        . "FROM product  WHERE prodID = '" .$pid."'");
		$result3->execute();
		for($i=0; $row3 = $result3->fetch(); $i++){
	?>
          
            <tr>
			<td><label><?php echo $row3['prodID']; ?></label></td>
			<td><label><?php echo $row3['prodName'];  ?></label></td>                       	
			<td><label><?php echo $row3['prodCategory']; ?></label></td>
                        <td><label><?php echo $row3['prodPrice']; ?></label></td>                 
                        
		</tr>
		<?php } ?>
                   
	</tbody>
</table>   
 
  
                