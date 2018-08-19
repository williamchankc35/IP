<!DOCTYPE html>
<!--
<!--
/*
 * @author Ng Choon Yik
 */
-->
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
                        <td>Product Name</td>
                        <td><input type="text" name="prodName" value="" /></td>
                    </tr>
                    <tr>
                        <td>Product Available?</td>
                        <td><input type="radio" name="prodAvailable" value="Yes" />Yes<input type="radio" name="prodAvailable" value="No" />No</td>
                    </tr>
                    <tr>
                        <td>Product Price</td>
                        <td><textarea name="prodPrice" rows="4" cols="20"></textarea></td>
                    </tr>
                    <tr>
                        <td>Product Category</td>
                        <td>
                        <select name="prodCategory">
                            <option value="Spring" selected>Spring</option>
                            <option value="Summer">Summer</option>
                            <option value="Autumn">Autumn</option>
                            <option value="Winter">Winter</option>
                            <option value="Valentine">Valentine</option>
                            <option value="Graduation Bouquet">Graduation Bouquet</option>
                        </select>                         
                        </td>
                    </tr>
                    <tr>
                        <td>Category ID</td>
                        <td><textarea name="cataID"  rows="4" cols="20"></textarea></td>
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