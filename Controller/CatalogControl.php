<?php

    include_once dirname(__FILE__) . '/../DataAccess/catalogDA.php';
    
    $da = new catalogDA;
    if (isset($_POST['CCatalog'])) {
    $cataPeriod = $_POST["cataPeriod"];
    $cataPrice = $_POST["cataPrice"];
    $cataDesc = $_POST["cataDesc"];
    $catalog = new catalog($cataPeriod, $cataPrice, $cataDesc);
    $da->insertCatalog($catalog);
}

if (isset($_POST['RCatalog'])) {
    $cataID = $_POST["cataID"];
    $da->retrieveCatalog($cataID);
}

    if (isset($_POST['UCatalog'])) {
    $cataPeriod = $_POST["cataPeriod"];
    $cataPrice = $_POST["cataPrice"];
    $cataDesc = $_POST["cataDesc"];
    $catalog = new catalog($cataPeriod, $cataPrice, $cataDesc);
    $da->updateCatalog($catalog);
}


if (isset($_POST['DCatalog'])) {
    $cataID = $_POST["cataID"];
    $da->deleteCatalog($cataID);
}
?>
<html>
    <form action="../View/Staff/manageCatalog.php">
        <input type="submit" value="Back" name="Back" />
    </form>
</html>