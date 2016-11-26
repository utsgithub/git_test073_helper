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
$JSON_rsNews="var newsJSON = ".json_encode($rows_rsNews)."; ";
mysql_free_result($rsNews);



$query_rsCate = "SELECT ID, category as title, parentID, sortNum FROM news_category";
$rsCate = mysql_query($query_rsCate, $conn) or die(mysql_error());
$row_rsCate = mysql_fetch_assoc($rsCate);
$totalRows_rsCate = mysql_num_rows($rsCate);
$rows_rsCate = array();
do {
    $rows_rsCate[] = $row_rsCate;
} while ($row_rsCate = mysql_fetch_assoc($rsCate));
$JSON_rsCate="var cateJSON = ".json_encode($rows_rsCate)."; ";
mysql_free_result($rsCate);
?>

<?php
$path = "C:/Users/leeke/OneDrive/output/js/";
if (!is_dir($path)){
    mkdir($path,0777);  // ?????test,??777?????????
}
$content = $JSON_rsNews."\n".$JSON_rsCate;  // ?????
$file = $path."WholeJson.js";    // ?????
rename($path."WholeJson.js", $path."WholeJson.js.".date("Y-m-d H-i-s"));
file_put_contents($file,$content,FILE_APPEND);  // ????????????????????
//$file = $path."WholeJson_".date("Y-m-d H-i-s").".js";    // ?????
//file_put_contents($file,$content,FILE_APPEND);  // ????????????????????
?>

OK