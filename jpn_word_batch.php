<?php
require_once('Connections/conn.php');
$updateSQL = "UPDATE jpn_words SET ne3ID=null , total=null";
mysql_select_db($database_conn, $conn);
$Result1 = mysql_query($updateSQL, $conn) or die(mysql_error());

$query_sql="SELECT * FROM jpn_sen WHERE eng LIKE %s and sum < 13 and category>=37 and category <= 48 order by len asc";
$colname_action = "-1";
if (isset($_GET['action'])) {
    $colname_action = trim($_GET['action']);
}
mysql_select_db($database_conn, $conn);
$query_Recordset1 = "SELECT * FROM jpn_words where word_type<>'专有词'
and word_type<>'连接词' and word_type<>'感叹词' and word_type<>'代词' and cate > 37";
$Recordset1 = mysql_query($query_Recordset1, $conn) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);

do {
    if($colname_action=="batch"){
        $query_rsNe3 = sprintf($query_sql, GetSQLValueString("%" . $row_Recordset1['eng'] . "%", "text"));
        $rsNe3 = mysql_query($query_rsNe3, $conn) or die(mysql_error());
        $row_rsNe3 = mysql_fetch_assoc($rsNe3);
        $totalRows_rsNe3 = mysql_num_rows($rsNe3);
        if($totalRows_rsNe3>0){
            $updateSQL = "UPDATE jpn_words SET ne3ID=".$row_rsNe3['id']." , total=".$totalRows_rsNe3." WHERE id=".$row_Recordset1['id'];
            //$updateSQL = "UPDATE jpn_words SET ne3ID=null , total=null WHERE id=".$row_Recordset1['id'];
            mysql_select_db($database_conn, $conn);
            $Result1 = mysql_query($updateSQL, $conn) or die(mysql_error());
        }
        //}
    }
} while ($row_Recordset1 = mysql_fetch_assoc($Recordset1));

mysql_free_result($Recordset1);
header("Location: jpn_word_list.php");
?>
