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

mysql_select_db($database_conn, $conn);
$query_Recordset1 = "select n.ID, c.category, n.`subject`, n.subTitle, n.categoryId from news_category as c, news as n where c.parentId='".$_GET['pid']."' and n.categoryId=c.ID order by c.sortNum asc, id asc;";
$Recordset1 = mysql_query($query_Recordset1, $conn) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<table border="1" cellpadding="1" cellspacing="1" id="ds_NewsByTopCategory">
    <tr>
        <td>ID</td>
        <td>CID</td>
        <td>category</td>
        <td>subject</td>
        <td>subTitle</td>
    </tr>
    <?php do { ?>
        <tr>
            <td><?php echo $row_Recordset1['ID']; ?></td>
            <td><?php echo $row_Recordset1['categoryId']; ?></td>
            <td><?php echo $row_Recordset1['category']; ?></td>
            <td><?php echo $row_Recordset1['subject']; ?></td>
            <td><?php echo $row_Recordset1['subTitle']; ?></td>
        </tr>
        <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
</table>
<?php
mysql_free_result($Recordset1);
?>
