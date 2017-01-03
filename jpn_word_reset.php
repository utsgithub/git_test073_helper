<?php
require_once('Connections/conn.php');
//$updateSQL = "UPDATE jpn_words SET ne3ID=".$row_rsNe3['id']." , total=".$totalRows_rsNe3." WHERE id=".$row_Recordset1['id'];
$updateSQL = "UPDATE jpn_words SET ne3ID=null , total=null";
mysql_select_db($database_conn, $conn);
$Result1 = mysql_query($updateSQL, $conn) or die(mysql_error());
header("Location: jpn_word_list.php");
?>
