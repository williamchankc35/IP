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
        <form action="../../Controller/paymentControl.php" method="POST">
            <table border="1">
                <thead>
                    <tr>
                        <th>Payment Panel</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Payment ID</td>
                        <td>Payment ID will be auto generated</td>
                        <td>Payment ID</td>
                        <td><input type="text" name="paymentID" value="" /> For Retrieve,Update and Delete only </td>
                    </tr>
                    <tr>
                        <td>Order/Invoice ID</td>
                        <td><input type="text" name="paymentOrderInvID" value="" /></td>
                    </tr>
                    <tr>
                        <td>Payment Date</td>
                        <td><input type="datetime-local" name="paymentDateTime"></td>
                    </tr>
                    <tr>
                        <td>
                            <input type="submit" value="Create" name="CPayment" />
                            <input type="submit" value="Retrieve" name="RPayment" />
                            <input type="submit" value="Update" name="UPayment" />
                            <input type="submit" value="Delete" name="DPayment" />
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
                    <th>Payment List</th>
                </tr>
                <tr>
                    <?php
                    include_once dirname(__FILE__) . '/../../DataAccess/paymentDA.php';
                    $showPayment = new paymentDA();
                    $showPayment->showAllPayment();
                    ?>
                </tr>
            </table>
        </form>
        <form>
            
        </form>
    </body>
</html>
