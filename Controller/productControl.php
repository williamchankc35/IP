<?php
include_once dirname(__FILE__) . '/../DataAccess/productDA.php';
//include_once dirname(__FILE__) . '/../Class/product.php';

$prodDA = new productDA;
if (isset($_POST['CProd'])) {
    $prodType = $_POST["prodType"];
    $prodDesc = $_POST["prodDesc"];
    $prodAvailable = $_POST["productRB"];
    $product = new product($prodType, $prodDesc, $prodAvailable);
    $prodDA->insertProduct($product);
}
if (isset($_POST['RProd'])) {
    $prodID = $_POST["prodID"];
    $prodDA->retrieveProduct($prodID);
}
if (isset($_POST['UProd'])) {
    $prodID = $_POST["prodID"];
    $prodType = $_POST["prodType"];
    $prodDesc = $_POST["prodDesc"];
    $prodAvailable = $_POST["productRB"];
    $product = new product($prodType, $prodDesc, $prodAvailable);
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