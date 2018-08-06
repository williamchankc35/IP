<?php
?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" type="text/css" href="../../Css/MainPage.css">
    </head>
   
    <body>
        <div class="topBanner">
            <div class="leftBannerContent" >
                <h1 class ="lblShopName">Fiore Flower Shop</h1>
            </div>
            <div class="rightBannerContent" >
                <h3 class="lblUsername">Username</h3>
                <a href="../Login/CustomerLogin.php"><button class="btnLogout">Logout</button></a>
            </div>
        </div>

        <div>
            <div class="sidebar">
                <div class="navigation">
                    <ul>
                        <li class="no-sub"> <a href="Catalog.php" target="iframe">Catalog</a>
                        <li class="no-sub"> <a href="Invoice.php" target="iframe">Invoice</a>
                        <li class="no-sub"> <a href="ProfileMaintain.php" target="iframe">Profile maintain</a>   
                    </ul>
                </div>
            </div>

            <div class="frame" >
                <iframe frameBorder="0" height="100%" width="100%" src="" name="iframe" scrolling="no"></iframe>
            </div>
        </div>
        <?php
        // put your code here
        ?>
    </body>
</html>