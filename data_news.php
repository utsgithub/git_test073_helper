<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php require_once('Connections/conn.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$colname_Recordset1 = "-1";
if (isset($_GET['cid'])) {
  $colname_Recordset1 = $_GET['cid'];
}
mysql_select_db($database_conn, $conn);
$query_Recordset1 = sprintf("SELECT * FROM news WHERE categoryId = %s", GetSQLValueString($colname_Recordset1, "int"));
$Recordset1 = mysql_query($query_Recordset1, $conn) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
?>

<table border="1" cellpadding="1" cellspacing="1" id="news">
    <tr>
        <td>ID</td>
        <td>categoryId</td>
        <td>subTitle</td>
        <td>subject</td>
        <td>tempCate</td>
        <td>sortNum</td>
        <td>times</td>
        <td>sen</td>
        <td>image</td>
        <td>hint</td>
    </tr>
    <?php do { ?>
        <tr>
            <td><?php echo $row_Recordset1['ID']; ?></td>
            <td><?php echo $row_Recordset1['categoryId']; ?></td>
            <td><?php echo $row_Recordset1['subTitle']; ?></td>
            <td><?php echo $row_Recordset1['subject']; ?></td>
            <td><?php echo $row_Recordset1['tempCate']; ?></td>
            <td><?php echo $row_Recordset1['sortNum']; ?></td>
            <td><?php echo $row_Recordset1['times']; ?></td>
            <td><?php echo $row_Recordset1['sen']; ?></td>
            <td><?php echo $row_Recordset1['image']; ?></td>
            <td><?php echo $row_Recordset1['hint']; ?></td>
        </tr>
        <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
</table>
<?
mysql_free_result($Recordset1);
?>
