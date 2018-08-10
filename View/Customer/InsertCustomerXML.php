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
                            $mysql_database = "fioreflowerdb";
                            $dbh = new PDO("mysql:dbname={$mysql_database};host={$mysql_hostname};port=3306", $mysql_user, $mysql_password);
                            $xmlObject = $xmlDoc->getElementsByTagName('CustomerRow');
                            $itemCount = $xmlObject->length;
                            for ($i = 0; $i < $itemCount; $i++) {
                                $CusID = $xmlObject->item($i)->getElementsByTagName('CusID')->item(0)->childNodes->item(0)->nodeValue;
                                $CusType = $xmlObject->item($i)->getElementsByTagName('CusType')->item(0)->childNodes->item(0)->nodeValue;
                                $CusName = $xmlObject->item($i)->getElementsByTagName('CusName')->item(0)->childNodes->item(0)->nodeValue;
                                $Username = $xmlObject->item($i)->getElementsByTagName('Username')->item(0)->childNodes->item(0)->nodeValue;
                                $Password = $xmlObject->item($i)->getElementsByTagName('Password')->item(0)->childNodes->item(0)->nodeValue;
                                $Email = $xmlObject->item($i)->getElementsByTagName('Email')->item(0)->childNodes->item(0)->nodeValue;
                                $CreditLimit = $xmlObject->item($i)->getElementsByTagName('CreditLimit')->item(0)->childNodes->item(0)->nodeValue;
                      
                                $Status = $xmlObject->item($i)->getElementsByTagName('Status')->item(0)->childNodes->item(0)->nodeValue;
                               
                                $sql = $dbh->prepare("INSERT INTO customer (CusID,CusType,CusName,Username,Password,Email,CreditLimit,Status) VALUES (?,?,?,?,?,?,?,?)");
                                if ($sql->execute(array(
                                            $CusID,
                                            $CusType,
                                            $CusName,
                                            $Username,
                                            $Password,
                                            $Email,
                                            $CreditLimit,
                                            $Status,
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
