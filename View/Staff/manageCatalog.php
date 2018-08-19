<!DOCTYPE html>
<!--
/*
 * @author Ng Choon Yik
 */
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
                    <tr>
                        <td>Catalog ID</td>
                        <td>Catalog ID will be auto generated</td>
                        <td>Catalog ID</td>
                        <td><input type="text" name="cataID" value="" /> Only for Retrieve,Update and Delete</td>
                    </tr>

                </thead><tbody>
                    <tr>
                        <td>Catalog Date</td>
                        <td>
                            <input type="month" id="start" name="cataDate"
                                   min="2018-08-18" value="2018-08-17" />
                        </td>

                    </tr>
                    <tr>
                        <td>Catalog Description</td>
                        <td><textarea name="cataDesc" rows="4" cols="20"></textarea></td>
                    </tr>
                    <tr>
                        <td>Catalog Products</td>
                        <td><textarea name="cataProducts" rows="4" cols="20"></textarea></td>
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
</head>
</html>