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
//category='d' and 
$query_Recordset1 = "SELECT * FROM jpn_splitter where len = 95 and isNull(new_eng) order by len desc";
$Recordset1 = mysql_query($query_Recordset1, $conn) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
?>
<!DOCTYPE html>
<html lang="en"><!-- InstanceBegin template="/Templates/template.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- InstanceBeginEditable name="doctitle" -->
<title>Bootstrap Template</title>
<!-- InstanceEndEditable -->
<!-- inc_head -->
<?php include("inc/inc_head.php"); ?>
<!-- InstanceBeginEditable name="head" -->
<!-- InstanceEndEditable -->
</head>
<body>
<!-- inc_nav -->
<?php include("inc/inc_nav.php"); ?>
<div class="container"><!-- InstanceBeginEditable name="EditRegion1" -->
<table class="table table-bordered">
    <tr>
        <td>ID</td>
        <td>chi</td>
        <td>eng</td>
        <td>sen_eng</td>
        <td>sen_chi</td>
        <td>audio</td>
        <td>len</td>
        <td>new_eng</td>
        <td>new_chi</td>
        <td>new_audio</td>
    </tr>
    <?php do { ?>
    <tr>
        <td><?php echo $row_Recordset1['ID']; ?></td>
        <td><?php echo $row_Recordset1['chi']; ?></td>
        <td><a href="jpn_splitter_edit.php?ID=<?php echo $row_Recordset1['ID']; ?>"><?php echo $row_Recordset1['eng']; ?></a></td>
        <td><?php echo $row_Recordset1['sen_eng']; ?></td>
        <td><?php echo $row_Recordset1['sen_chi']; ?></td>
        <td><?php echo $row_Recordset1['audio']; ?></td>
        <td><?php echo $row_Recordset1['len']; ?></td>
        <td><?php echo $row_Recordset1['new_eng']; ?></td>
        <td><?php echo $row_Recordset1['new_chi']; ?></td>
        <td><?php echo $row_Recordset1['new_audio']; ?></td>
    </tr>
    <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
</table>
<!-- InstanceEndEditable --> </div>
<!-- Include all compiled plugins (below), or include individual files as needed --> 
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>
<!-- InstanceEnd --></html>
<?php
mysql_free_result($Recordset1);
?>
