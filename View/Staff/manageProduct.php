<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form action="../../Controller/productControl.php" method="POST">
            <table border="1">
                <thead>
                    <tr>
                        <th>Product Panel</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Product ID</td>
                        <td>Product ID will be auto generated</td>
                        <td>Product ID</td>
                        <td><input type="text" name="prodID" value="" /> Only for Retrieve,Update and Delete</td>
                    </tr>
                    <tr>
                        <td>Product Type</td>
                        <td><input type="text" name="prodType" value="" /></td>
                        <td>Product Type</td>
                        <td><input type="text" name="prodType1" value="" readonly="readonly" /></td>
                    </tr>
                    <tr>
                        <td>Product Description</td>
                        <td><textarea name="prodDesc" rows="4" cols="20">--Enter product description here--</textarea></td>
                        <td>Product Description</td>
                        <td><textarea name="prodDesc1" rows="4" cols="20" readonly="readonly"></textarea></td>
                    </tr>
                    <tr>
                        <td>Product Available?</td>
                        <td><input type="radio" name="productRB" value="Yes" />Yes<input type="radio" name="productRB" value="No" />No</td>
                        <td>Product Available?</td>
                        <td><input type="text" name="prodAvailable" value="" readonly="readonly" /></td>
                    </tr>
                    <tr>
                        <td>
                            <input type="submit" value="Create" name="CProd" />
                            <input type="submit" value="Retrieve" name="RProd" />
                            <input type="submit" value="Update" name="UProd" />
                            <input type="submit" value="Delete" name="DProd" />
                        </td>
                    </tr>
                    <tr>
                        <td><input type="reset" value="Reset" name="Reset" />
                            <input type="submit" value="Back" name="Back" /></td>
                    </tr>
                </tbody>
            </table>
            <br/>
            <table border="1">
                <tr>
                    <th>Product List</th>
                </tr>
                <tr>
                    <?php
                    include_once dirname(__FILE__) . '/../../DataAccess/productDA.php';
                    $showProd = new productDA();
                    $showProd->showAllProduct();
                    ?>
                </tr>
            </table>
        </form>
    </body>
</html>
