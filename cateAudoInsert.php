<?php require_once('Connections/conn.php'); ?>
<?php include("inc/inc_head.php"); ?>

<?php
for ($x = 1; $x <= 25; $x++) {
    $insertSQL= "INSERT INTO news_category (category, parentID, sortNum) VALUES ('".$title." - ".$x."', '".$pid."', '".$x."')";
    echo $insertSQL."<br/>";
    mysql_select_db($database_conn, $conn);
    $Result1 = mysql_query($insertSQL, $conn) or die(mysql_error());
}
?>
