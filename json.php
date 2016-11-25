<?php require_once('Connections/conn.php'); ?>
<?php

mysql_select_db($database_conn, $conn);
$query_rsNews = "SELECT * FROM news";
$rsNews = mysql_query($query_rsNews, $conn) or die(mysql_error());
$row_rsNews = mysql_fetch_assoc($rsNews);
$totalRows_rsNews = mysql_num_rows($rsNews);
$rows_rsNews = array();
do {
    $rows_rsNews[] = $row_rsNews;
} while ($row_rsNews = mysql_fetch_assoc($rsNews));
echo("var newsJSON = ".json_encode($rows_rsNews)."; ");
mysql_free_result($rsNews);



$query_rsCate = "SELECT ID, category as title, parentID, sortNum FROM news_category";
$rsCate = mysql_query($query_rsCate, $conn) or die(mysql_error());
$row_rsCate = mysql_fetch_assoc($rsCate);
$totalRows_rsCate = mysql_num_rows($rsCate);
$rows_rsCate = array();
do {
    $rows_rsCate[] = $row_rsCate;
} while ($row_rsCate = mysql_fetch_assoc($rsCate));
echo("var cateJSON = ".json_encode($rows_rsCate)."; ");
mysql_free_result($rsCate);
?>
