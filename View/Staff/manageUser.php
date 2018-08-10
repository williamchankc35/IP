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
        <form action="../../Controller/userControl.php" method="POST">
            <table border="1">
                <thead>
                    <tr>
                        <th>User Panel</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>User ID</td>
                        <td>User ID will be auto generated</td>
                        <td>User ID</td>
                        <td><input type="text" name="userID" value="" /> For Retrieve,Update and Delete only </td>
                    </tr>
                    <tr>
                        <td>User Type</td>
                        <td>
                            <input type="radio" name="userType" value="customer" />Customer
                            <input type="radio" name="userType" value="staff" />Staff
                            <input type="radio" name="userType" value="admin" />Admin
                        </td>
                    </tr>
                    <tr>
                        <td>User Name</td>
                        <td><input type="text" name="userName" value="" /></td>
                    </tr>
                    <tr>
                        <td>Password</td>
                        <td><input type="password" name="userPassword" value="" /></td>
                    </tr>
                    <tr>
                        <td>Status</td>
                        <td><textarea name="userStatus" rows="4" cols="20">--Enter user status here--</textarea></td>
                    </tr>
                    <tr>
                        <td>
                            <input type="submit" value="Create" name="CUser" />
                            <input type="submit" value="Retrieve" name="RUser" />
                            <input type="submit" value="Update" name="UUser" />
                            <input type="submit" value="Delete" name="DUser" />
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
                    <th>User List</th>
                </tr>
                <tr>
                    <?php
                    include_once dirname(__FILE__) . '/../../DataAccess/userDA.php';
                    $showUser = new userDA();
                    $showUser->showAllUser();
                    ?>
                </tr>
            </table>
        </form>
        <form>
            
        </form>
    </body>
</html>
