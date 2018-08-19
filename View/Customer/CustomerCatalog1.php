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
            Catalog Categorize: 

            <select name="prodCategory">
                <option value="Spring" selected>Spring</option>
                <option value="Summer">Summer</option>
                <option value="Autumn">Autumn</option>
                <option value="Winter">Winter</option>
                <option value="Valentine">Valentine</option>
                <option value="Graduation Bouquet">Graduation Bouquet</option>
            </select>   
            <input type="submit" value="Categorized" name="SCatalog"/>

            <br/><br/>

            <?php
            include_once dirname(__FILE__) . '/../../DataAccess/catalogDA.php';
            $show = new catalogDA();
            $show->showAllCatalog();
            ?>

        </body>
    </form>
</html>