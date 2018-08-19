<!DOCTYPE html>
<!--
/*
 * @author Ng Choon Yik
 */
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <form action="../../Controller/CatalogControl.php"  method="POST">
        <body>
            Catalog Date: 

            <select name="cataDate">
                <option value="2018-08" selected>2018-08</option>
                <option value="2018-09">2018-09</option>
                <option value="2018-10">2018-10</option>
                <option value="2018-11">2018-11</option>
                <option value="2018-12">2018-12</option>
            </select>
            <input type="submit" value="Refresh" name="SDCatalog" />

            <br/><br/>

            <?php
            include_once dirname(__FILE__) . '/../../DataAccess/catalogDA.php';
            $show = new catalogDA();
            $show->showAllCatalog();
            ?>

        </body>
    </form>
</html>