<?php
include_once dirname(__FILE__) . '/../DataAccess/productDA.php';
//include_once dirname(__FILE__) . '/../Class/product.php';

$prodDA = new productDA;
if (isset($_POST['CProd'])) {
    $prodName = $_POST["prodName"];
    $prodQuantity = $_POST["prodQuantity"];
    $prodAvailable = $_POST["productRB"];
    $prodPrice = $_POST["prodPrice"];
    $prodCategory = $_POST["prodCategory"];
    $product = new product($prodName, $prodQuantity, $prodAvailable, $prodPrice, $prodCategory);
    $prodDA->insertProduct($product);
}
if (isset($_POST['RProd'])) {
    $prodID = $_POST["prodID"];
    $prodDA->retrieveProduct($prodID);
}
if (isset($_POST['UProd'])) {
    $prodID = $_POST["prodID"];
    $prodName = $_POST["prodName"];
    $prodQuantity = $_POST["prodQuantity"];
    $prodAvailable = $_POST["productRB"];
    $prodPrice = $_POST["productPrice"];
    $prodCategory = $_POST["prodCategory"];
    $product = new product($prodName, $prodQuantity, $prodAvailable, $prodPrice, $prodCategory);
    $prodDA->updateProduct($product, $prodID);
}
if (isset($_POST['DProd'])) {
    $prodID = $_POST["prodID"];
    $prodDA->deleteProduct($prodID);
}
?>
<html>
    <form action="../View/Staff/manageProduct.php">
        <input type="submit" value="Back" name="Back" />
    </form>
</html>