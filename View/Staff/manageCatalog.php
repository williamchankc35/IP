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
        <form action="../../Controller/catalogControl.php" method="POST">
            <table border="1">
                <thead>
                    <tr>
                        <th>Catalog Panel</th>
                    </tr>
                </thead><tbody>
                    <tr>
                        <td>Catalog ID</td>
                        <td>Catalog ID will be auto generated</td>
                        <td>Catalog ID</td>
                        <td><input type="text" name="cataID" value="" /> Only for Retrieve,Update and Delete</td>
                    </tr>
                    <tr>
                        <td>Catalog Period</td>
                        <td><input type="text" name="cataPeriod" value="" /></td>
                        <td>Catalog Period</td>
                        <td><input type="text" name="cataPeriod1" value="" readonly="readonly" /></td>
                    </tr>
                    <tr>
                        <td>Catalog Description</td>
                        <td><textarea name="cataDesc" rows="4" cols="20">--Enter catalog description here--</textarea></td>
                        <td>Catalog Description</td>
                        <td><textarea name="cataDesc1" rows="4" cols="20" readonly="readonly"></textarea></td>
                    </tr>
                    <tr>
                        <td>Catalog Price</td>
                        <td><textarea name="cataPrice" rows="4" cols="20"></textarea></td>
                        <td>Catalog Price</td>
                        <td><textarea name="cataPrice1" rows="4" cols="20" readonly="readonly"></textarea></td>
                    </tr>
                    <tr>
                        <td>
                        </td>
                        <td>
                        <select name="cars">
                            <option value="volvo">Volvo</option>
                        </select>
                        </td>
                        <td>
                        </td>
                        <td>
                        <select name="cars">
                            <option value="volvo">Volvo</option>
                        </select>
                        </td>
                    </tr>
                    <tr>
                        <td><input type="submit" value="Create" name="CCatalog" />
                            <input type="submit" value="Retrieve" name="RCatalog" />
                            <input type="submit" value="Update" name="UCatalog" />
                            <input type="submit" value="Delete" name="DCatalog" /></td>
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
                    <th>Catalog List</th>
                </tr>
                <tr>
                    <?php
                    include_once dirname(__FILE__) . '/../../DataAccess/catalogDA.php';
                    $show = new catalogDA();
                    $show->showAllCatalog();
                    ?>
                </tr>
            </table>
        </form>
    </body>
</html>
