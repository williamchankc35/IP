<?php
include '../../class/orderDetail.php';
session_start();
?>

<html>  
    <head>  
        <title>Order</title>
    </head>  
    <body>  
        <br /> 
        <form method="post" action="../../Controller/OrderControl.php"> 
            <div class="container" style="width:700px;">  
                <h3 align="center">Order</h3><br />  

                <div class="col-md-4">  

                    <div style="border:1px solid #333; background-color:#f1f1f1; 
                         border-radius:5px; padding:16px;" align="center">  
                         <?php
                         require_once '../../DataAccess/catalogDA.php';
                         $catalog = new catalogDA();
                         $catalog->showAllCatalog();
                         ?>
                        <input type="text" name="prodid" placeholder="Enter base on product ID provided" />  
                        <input type="text" name="quantity" value="1" />  
                        <input type="submit" name="add_to_cart" style="margin-top:5px;" value="Add to Cart" />  
                    </div>  
                </div>
                <div style="clear:both"></div>  
                <br />  
                <?php
                if (isset($_SESSION['ordDet'])) {
                    $ttl=0;
                    ?>
                    <h3>Order Details</h3>  
                    <div class="table-responsive">  
                        <table border="1">  
                            <tr> 
                                <th width="8%"> No.</th>
                                <th width="40%">Item Name</th>  
                                <th width="10%">Quantity</th>  
                                <th width="20%">Price</th>  
                                <th width="15%">Total</th>  
                            </tr>
                            <?php
                            for ($i = 0; $i < sizeof($_SESSION['ordDet']); $i++) {
                                $ttl+=(double)$_SESSION['ordDet'][$i]->getSubTotal();
                                ?>

                                <tr>
                                    <td><?php echo (int) $i + 1; ?></td>
                                    <td><?php echo $_SESSION['ordDet'][$i]->getProdName(); ?></td>  
                                    <td><?php echo $_SESSION['ordDet'][$i]->getItemQty(); ?></td>  
                                    <td><?php echo $_SESSION['ordDet'][$i]->getProdPrice(); ?></td>  
                                    <td><?php echo $_SESSION['ordDet'][$i]->getSubTotal(); ?></td>  
                                </tr>  
                            <?php } ?>
                            <tr>  
                                <td colspan="4" align="right">Total</td>  
                                <td align="right">$ <?php echo $ttl;?></td>  
                                <td><input type="submit" value="Order now!" name="ordernow"</td>  
                            </tr>  
                        </table>  
                        <?php echo "Enter the number you wish to remove" ?>
                        <input type="text" name="removeNo" />
                        <input type="submit" name="remove" value="Remove"/> 
                    </div>  
                    <?php
                } else
                    echo "Add new item to cart to display order detail.";
                ?>
            </div>  
            <br />  

        </form>  
    </body>  
</html>
