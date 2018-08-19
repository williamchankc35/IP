/*
 * @author Ng Choon Yik
 */

<?php
include_once dirname(__FILE__) . '/../DataAccess/catalogDA.php';

$cataDA = new catalogDA;
if (isset($_POST['CCatalog'])) {
    $cataID = $_POST["cataID"];
    $cataDate = $_POST["cataDate"];
    $cataDesc = $_POST["cataDesc"];
    $cataProducts = $_POST["cataProducts"];

    $catalog = new catalog($cataID, $cataDate, $cataDesc, $cataProducts);
    $cataDA->insertCatalog($catalog);
}

if (isset($_POST['RCatalog'])) {
    $cataID = $_POST["cataID"];
    $cataDA->retrieveCatalog($cataID);
}

if (isset($_POST['UCatalog'])) {
    $cataID = $_POST["cataID"];
    $cataDate = $_POST["cataDate"];
    $cataDesc = $_POST["cataDesc"];
    $cataProducts = $_POST["cataProducts"];
    $catalog = new catalog($cataID, $cataDate, $cataDesc, $cataProducts);
    $cataDA->updateCatalog($catalog);
}


if (isset($_POST['DCatalog'])) {
    $cataID = $_POST["cataID"];
    $cataDA->deleteCatalog($cataID);
}

if (isset($_POST['SCatalog'])) {
    $cataName = $_POST["prodCategory"];
    $cataDA->retrieveProductbyCatalog($cataName);
}

if (isset($_POST['SDCatalog'])) {
    $cataName = $_POST["cataDate"];
    $cataDA->retrieveCatalogByDate($cataName);
}

?>
<html>
<!--    <form action="../View/Staff/manageCatalog.php">
        <input type="submit" value="Back" name="Back" />
    </form>-->
    
    <form action="../View/Customer/CustomerCatalog1.php">
        <input type="submit" value="Back" name="Back" />
    </form>
</html>