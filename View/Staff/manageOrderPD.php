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
                        <td><input type="text" name="orderPDID" value="" /> For Retrieve,Update and Delete only </td>
                    </tr>
                    <tr>
                        <td>Type</td>
                        <td>
                            <input type="radio" name="orderPDType" value="pickup" />Pickup
                            <input type="radio" name="orderPDType" value="delivery" />Delivery
                        </td>
                    </tr>
                    <tr>
                        <td>Order ID</td>
                        <td><input type="text" name="orderID" value="" /></td>
                    </tr>
                    <tr>
                        <td>Pickup & Delivery Date</td>
                        <td><input type="date" name="orderPDDate"></td>
                    </tr>
                    <tr>
                        <td>Pickup & Delivery Time</td>
                        <td><input type="time" name="orderPDTime"></td>
                    </tr>
                    <tr>
                        <td>Staff ID</td>
                        <td><input type="text" name="orderPDStaffID" value="" /></td>
                    </tr>
                    <tr>
                        <td>Staff Name</td>
                        <td><input type="text" name="orderPDStaffName" value="" /></td>
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
                <thead>
                    <tr>
                        <th>Report Panel</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Daily order report on</td>
                        <td><input type="date" name="dailyOrder"></td>
                        <td><input type="submit" value="Generate" name="generate1" /></td>
                    </tr>
                    <tr>
                        <td>Daily pickup report on</td>
                        <td><input type="date" name="dailyPickup"></td>
                        <td><input type="submit" value="Generate" name="generate2" /></td>
                    </tr>
                    <tr>
                        <td>Pickup report from</td>
                        <td><input type="date" name="dailyPickup1"> to <input type="date" name="dailyPickup2"></td>
                        <td><input type="submit" value="Generate" name="generate3" /></td>
                    </tr>
                    <tr>
                        <td>Daily delivery report on</td>
                        <td><input type="date" name="dailyDelivery"></td>
                        <td><input type="submit" value="Generate" name="generate4" /></td>
                    </tr>
                    <tr>
                        <td>Delivery report from</td>
                        <td><input type="date" name="dailyDelivery1"> to <input type="date" name="dailyDelivery2"></td>
                        <td><input type="submit" value="Generate" name="generate5" /></td>
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
    </body>
</html>
