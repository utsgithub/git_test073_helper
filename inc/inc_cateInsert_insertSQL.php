<?php
if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
    $insertSQL = "INSERT INTO news_category (category, parentID) VALUES ("+ $_POST['category']+")";
    //$insertSQL = "INSERT INTO news_category (category, parentID) VALUES ("+ $_POST['category']+", '"+$_POST['parentID']+"')";
    echo $insertSQL;
    mysql_select_db($database_conn, $conn);
    //$Result1 = mysql_query($insertSQL, $conn) or die(mysql_error());
}
?>