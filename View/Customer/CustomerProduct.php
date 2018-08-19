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
    <body>
        
        <?php
        include_once dirname(__FILE__) . '/../../DataAccess/productDA.php';
        $show = new productDA();
        $show->showAllProduct();
        ?>
        
    </body>
</html>