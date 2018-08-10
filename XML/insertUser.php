<html>
    <body>
        <form method="post" action="" enctype="multipart/form-data">
            <input type="file" name="file" id="file" /><br /><br />
            <input type="submit" value="Insert Data" name="submit" />
        </form> 

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST['submit'])) { {
                    //error_reporting(0);
                    $filename = $_FILES['file']['name'];
                    $ext = pathinfo($filename, PATHINFO_EXTENSION);
                    if ($ext != "xml") {
                        echo "that is not xml file..";
                    } else {
                        $xmlDoc = new DOMDocument();
                        if ($xmlDoc->load($filename) != false) {
                            $mysql_hostname = "localhost";
                            $mysql_user = "root";
                            $mysql_password = "";
                            $mysql_database = "FioreFlowershopDB";
                            $dbh = new PDO("mysql:dbname={$mysql_database};host={$mysql_hostname};port=3306", $mysql_user, $mysql_password);
                            $xmlObject = $xmlDoc->getElementsByTagName('user');
                            $itemCount = $xmlObject->length;
                            for ($i = 0; $i < $itemCount; $i++) {
                                $userType = $xmlObject->item($i)->getElementsByTagName('userType')->item(0)->childNodes->item(0)->nodeValue;
                                $userName = $xmlObject->item($i)->getElementsByTagName('userName')->item(0)->childNodes->item(0)->nodeValue;
                                $userPassword  = $xmlObject->item($i)->getElementsByTagName('userPassword')->item(0)->childNodes->item(0)->nodeValue;
                                $userStatus  = $xmlObject->item($i)->getElementsByTagName('userStatus')->item(0)->childNodes->item(0)->nodeValue;

                                $sql = $dbh->prepare("INSERT INTO user (userType, userName, userPassword, userStatus) VALUES (?,?,?,?)");
                                if ($sql->execute(array(
                                            $userType,
                                            $userName,
                                            $userPassword,
                                            $userStatus,
                                        ))) {
                                    
                                }
                            }
                            echo "inserted";
                        } else {
                            echo "Please place the file inside the the Admin file";
                        }
                    }
                }
            }
        }
        ?>
    </body>
</html>
