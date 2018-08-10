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
        <form action="../../Controller/orderPDControl.php" method="POST">
            <table border="1">
                <thead>
                    <tr>
                        <th>Order Pickup and Delivery Panel</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>OrderPD ID</td>
                        <td>OrderPD ID will be auto generated</td>
                        <td>OrderPD ID</td>
                        <td><input type="text" name="orderPDID" value="" /> Only for Retrieve,Update and Delete</td>
                    </tr>
                    <tr>
                        <td>Order ID</td>
                        <td><input type="text" name="orderID" value="" /></td>
                        <td>Order ID</td>
                        <td><input type="text" name="orderID1" value="" readonly="readonly" /></td>
                    </tr>
                    <tr>
                        <td>Pickup & Delivery Date</td>
                        <td><input type="date" name="orderPDDate"></td>
                        <td>Pickup & Delivery Date</td>
                        <td><input type="text" name="orderPDDate1" value="" readonly="readonly" /></td>
                    </tr>
                    <tr>
                        <td>Pickup & Delivery Time</td>
                        <td><input type="time" name="orderPDTime"></td>
                        <td>Pickup & Delivery Time</td>
                        <td><input type="text" name="orderPDTime1" value="" readonly="readonly" /></td>
                    </tr>
                    <tr>
                        <td>Staff ID</td>
                        <td><input type="text" name="orderPDStaffID" value="" /></td>
                        <td>Staff ID</td>
                        <td><input type="text" name="orderPDStaffID1" value="" readonly="readonly" /></td>
                    </tr>
                    <tr>
                        <td>Staff Name</td>
                        <td><input type="text" name="orderPDStaffName" value="" /></td>
                        <td>Staff Name</td>
                        <td><input type="text" name="orderPDStaffName1" value="" readonly="readonly" /></td>
                    </tr>
                    <tr>
                        <td>
                            <input type="submit" value="Create" name="COrderPD" />
                            <input type="submit" value="Retrieve" name="ROrderPD" />
                            <input type="submit" value="Update" name="UOrderPD" />
                            <input type="submit" value="Delete" name="DOrderPD" />
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
                    <th>Order Pickup and Delivery List</th>
                </tr>
                <tr>
                    <?php
                    include_once dirname(__FILE__) . '/../../DataAccess/orderPDDA.php';
                    $showOrderPDDA = new orderPDDA();
                    $showOrderPDDA->showAllOrderPD();
                    ?>
                </tr>
            </table>

        </form>
        <?php
        // put your code here
        ?>
    </body>
</html>
