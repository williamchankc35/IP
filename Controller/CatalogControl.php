<?php

    include_once dirname(__FILE__) . '/../DataAccess/catalogDA.php';
    
    $cataDA = new catalogDA;
    if (isset($_POST['CCatalog'])) {
    $cataMonth = $_POST["cataMonth"];
    $cataYear = $_POST["cataYear"];
    $cataProducts = $_POST["cataProducts"];
    $cataPrice = $_POST["cataPrice"];
    $catalog = new catalog($cataMonth, $cataYear, $cataProducts, $cataPrice);
    $cataDA->insertCatalog($catalog);
}

if (isset($_POST['RCatalog'])) {
    $cataID = $_POST["cataID"];
    $cataDA->retrieveCatalog($cataID);
}

    if (isset($_POST['UCatalog'])) {
    $cataMonth = $_POST["cataMonth"];
    $cataYear = $_POST["cataYear"];
    $cataProducts = $_POST["cataProducts"];
    $cataPrice = $_POST["cataPrice"];
    $catalog = new catalog($cataMonth, $cataYear, $cataProducts, $cataPrice);
    $cataDA->updateCatalog($catalog);
}


if (isset($_POST['DCatalog'])) {
    $cataID = $_POST["cataID"];
    $cataDA->deleteCatalog($cataID);
}

if (isset($_POST['SCatalog'])){
    $cataName = $_POST["prodCategory"];
    $cataDA->retrieveProductbyCatalog($cataName);
}
?>
<html>
        <form action="../View/Staff/manageCatalog.php">
        <input type="submit" value="Back" name="Back" />
        </form>
</html>