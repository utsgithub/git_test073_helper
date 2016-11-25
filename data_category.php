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

$colname_Recordset1 = "0";
if (isset($_GET['pid'])) {
  $colname_Recordset1 = $_GET['pid'];
}
mysql_select_db($database_conn, $conn);
$query_Recordset1 = sprintf("SELECT * FROM news_category WHERE parentId = %s ORDER BY sortNum ASC", GetSQLValueString($colname_Recordset1, "int"));
$Recordset1 = mysql_query($query_Recordset1, $conn) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
?>
<?php 
if ($colname_Recordset1=="") {
  $colname_Recordset1 = "0";
}
?>

<table border="1" cellpadding="1" cellspacing="1" id="category_news">
    <tr>
        <td>ID</td>
        <td>category</td>
        <td>main</td>
        <td>date</td>
        <td>temp</td>
        <td>parentId</td>
        <td>image</td>
        <td>isUploadedImage</td>
        <td>type</td>
        <td>sortNum</td>
        <td>password</td>
        <td>content</td>
        <td>display</td>
        <td>linkURL</td>
        <td>linkType</td>
        <td>template</td>
        <td>detailsTemplate</td>
        <td>program</td>
        <td>adminLinkURL</td>
        <td>defaulttemplate</td>
        <td>toFirstSub</td>
        <td>userAccess</td>
        <td>pageSize</td>
        <td>indexPageSize</td>
        <td>formId</td>
        <td>sidecate</td>
    </tr>
    <?php do { ?>
        <tr>
            <td><?php echo $row_Recordset1['ID']; ?></td>
            <td><?php echo $row_Recordset1['category']; ?></td>
            <td><?php echo $row_Recordset1['main']; ?></td>
            <td><?php echo $row_Recordset1['date']; ?></td>
            <td><?php echo $row_Recordset1['temp']; ?></td>
            <td><?php echo $row_Recordset1['parentId']; ?></td>
            <td><?php echo $row_Recordset1['image']; ?></td>
            <td><?php echo $row_Recordset1['isUploadedImage']; ?></td>
            <td><?php echo $row_Recordset1['type']; ?></td>
            <td><?php echo $row_Recordset1['sortNum']; ?></td>
            <td><?php echo $row_Recordset1['password']; ?></td>
            <td><?php echo $row_Recordset1['content']; ?></td>
            <td><?php echo $row_Recordset1['display']; ?></td>
            <td><?php echo $row_Recordset1['linkURL']; ?></td>
            <td><?php echo $row_Recordset1['linkType']; ?></td>
            <td><?php echo $row_Recordset1['template']; ?></td>
            <td><?php echo $row_Recordset1['detailsTemplate']; ?></td>
            <td><?php echo $row_Recordset1['program']; ?></td>
            <td><?php echo $row_Recordset1['adminLinkURL']; ?></td>
            <td><?php echo $row_Recordset1['defaulttemplate']; ?></td>
            <td><?php echo $row_Recordset1['toFirstSub']; ?></td>
            <td><?php echo $row_Recordset1['userAccess']; ?></td>
            <td><?php echo $row_Recordset1['pageSize']; ?></td>
            <td><?php echo $row_Recordset1['indexPageSize']; ?></td>
            <td><?php echo $row_Recordset1['formId']; ?></td>
            <td><?php echo $row_Recordset1['sidecate']; ?></td>
        </tr>
        <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
</table>
<?
mysql_free_result($Recordset1);
?>