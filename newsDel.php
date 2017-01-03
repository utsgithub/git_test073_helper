<?php require_once('Connections/conn.php'); ?>
<?php
if ((isset($_GET['ID'])) && ($_GET['ID'] != "")) {
    $deleteSQL = sprintf("DELETE FROM news WHERE ID=%s",
                         GetSQLValueString(trim($_GET['ID']), "int"));

    mysql_select_db($database_conn, $conn);
    $Result1 = mysql_query($deleteSQL, $conn) or die(mysql_error());

    $deleteGoTo = "newsList.php?cid=".trim($_GET['cid'])."&pid=".trim($_GET['pid']);
    if (isset($_SERVER['QUERY_STRING'])) {
        $deleteGoTo .= (strpos($deleteGoTo, '?')) ? "&" : "?";
        $deleteGoTo .= $_SERVER['QUERY_STRING'];
    }
    header(sprintf("Location: %s", $deleteGoTo));
}
?>
