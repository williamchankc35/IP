<?php
include_once dirname(__FILE__) . '/../DataAccess/userDA.php';

$userDA = new userDA;

if (isset($_POST['CUser'])) {
    $userType = $_POST["userType"];
    $userName = $_POST["userName"];
    $userPassword = sha1($_POST["userPassword"]);
    $userStatus = $_POST["userStatus"];
    $user = new user($userType, $userName, $userPassword, $userStatus);
    $userDA->insertUser($user);
}
if (isset($_POST['RUser'])) {
    $userID = $_POST["userID"];
    $userDA->retrieveUser($userID);
}
if (isset($_POST['UUser'])) {
    $userID = $_POST["userID"];
    $userType = $_POST["userType"];
    $userName = $_POST["userName"];
    $userPassword = sha1($_POST["userPassword"]);
    $userStatus = $_POST["userStatus"];
    $user = new user($userType, $userName, $userPassword, $userStatus);
    $userDA->updateUser($user, $userID);
}
if (isset($_POST['DUser'])) {
    $userID = $_POST["userID"];
    $userDA->deleteUser($userID);
}
?>
<html>
    <form action="../View/Staff/manageUser.php">
        <input type="submit" value="Back" name="Back" />
    </form>
</html>