<?php

include_once dirname(__FILE__) . '/../DataAccess/productDA.php';
include_once dirname(__FILE__) . '/../Class/product.php';

if (isset($_POST['CProd'])) {
    $da = new productDA;
    $prodType = $_POST["prodType"];
    $prodDesc = $_POST["prodDesc"];
    $prodAvailable = $_POST["productRB"];
    $product = new product($prodType, $prodDesc, $prodAvailable);
    $da->insertProduct($product);
}

