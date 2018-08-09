 <html>  
      <head>  
           <title>Order</title>
      </head>  
      <body>  
           <br />  
           <div class="container" style="width:700px;">  
                <h3 align="center">Order</h3><br />  
 
                <div class="col-md-4">  
                     <form method="post" action="index.php?action=add&id=<?php echo $row["id"]; ?>">  
                          <div style="border:1px solid #333; background-color:#f1f1f1; 
                               border-radius:5px; padding:16px;" align="center">  
                                
                               <h4 class="text-info">name</h4>  
                               <h4 class="text-danger">$ price</h4>  
                               <input type="text" name="quantity" class="form-control" value="1" />  
                               <input type="hidden" name="hidden_name" value="<?php echo $row["name"]; ?>" />  
                               <input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>" />  
                               <input type="submit" name="add_to_cart" style="margin-top:5px;" value="Add to Cart" />  
                          </div>  
                     </form>  
                </div>
                <div style="clear:both"></div>  
                <br />  
                <h3>Order Details</h3>  
                <div class="table-responsive">  
                     <table border="1">  
                          <tr>  
                               <th width="40%">Item Name</th>  
                               <th width="10%">Quantity</th>  
                               <th width="20%">Price</th>  
                               <th width="15%">Total</th>  
                               <th width="5%">Action</th>  
                          </tr>
                          <tr>  
                               <td>item name</td>  
                               <td>item qty</td>  
                               <td>$ item price</td>  
                               <td>$ total item price<?php /*echo number_format($values["item_quantity"] * $values["item_price"], 2); */?></td>  
                               <td><a href=""><span class="text-danger">Remove</span></a></td>
                               
                          </tr>  
                    
                          <tr>  
                               <td colspan="3" align="right">Total</td>  
                               <td align="right">$ total price</td>  
                               <td><a href="Payment"><span class="text-danger">Payment</span></a></td>  
                          </tr>  
                         
                 
                     </table>  
                </div>  
           </div>  
           <br />  
      </body>  
 </html>
   