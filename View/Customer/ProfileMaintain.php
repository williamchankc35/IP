<?php
?>
<html>
<head>
<style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}
</style>

</head>
<body>
<h1>Customer Profile Maintain</h1>
<table border="1">
    <thead>
        <tr>
            <th>Customer ID</th>
            <th><input type="text" name="CustID" disabled="disabled"></th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Customer Type</td>
            <td><input type="radio" name="CustType" Value="consumer">Consumer<br>
                <input type="radio" name="CustType" Value="corporate">Corporate
                </td>
        </tr>
        <tr>
            <td>Customer Name</td>
            <td><input type="text" name="CustName" ></td>
        </tr>
        <tr>
            <td>Customer Email</td>
            <td><input type="text" name="CustEmail" ></td>
        </tr>
        <tr>
            <td>Password</td>
            <td><input type="password" name="Password" ></td>
        </tr>
        <tr>
            <td>Confirm Password</td>
            <td><input type="password" name="Password" ></td>
        </tr>
        <tr>
            <td></td>
            <td><button name="Submit" value="Submit">Save</button>
            <button name="Cancel" value="Cancel">Cancel</button></td>
</td>
        </tr>
    </tbody>
</table>


</body>
</html>
 