<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <form action="../../Controller/CatalogControl.php"  method="POST">
    <body>
        Catalog Category: 
        <select name="prodCategory">
            <option value="Spring" selected>Spring</option>
            <option value="Summer">Summer</option>
            <option value="Autumn">Autumn</option>
            <option value="Winter">Winter</option>
            <option value="Valentine">Valentine</option>
            <option value="Graduation Bouquet">Graduation Bouquet</option>
        </select>
        
        <input type="submit" value="Refresh" name="SCatalog" />
        
        </br/></br/>
        
        <?php        
        include_once dirname(__FILE__) . '/../../DataAccess/catalogDA.php';
        $show = new catalogDA();
        $show->showAllCatalog();
        ?>
        
    </body>
    </form>
</html>