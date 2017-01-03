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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO jpn_words (jpn, eng, chi, ne3ID, cid, total, status) VALUES (%s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['jpn'], "text"),
                       GetSQLValueString($_POST['eng'], "text"),
                       GetSQLValueString($_POST['chi'], "text"),
                       GetSQLValueString($_POST['ne3ID'], "int"),
                       GetSQLValueString($_POST['cid'], "int"),
                       GetSQLValueString($_POST['total'], "int"),
                       GetSQLValueString($_POST['status'], "text"));

  mysql_select_db($database_conn, $conn);
  $Result1 = mysql_query($insertSQL, $conn) or die(mysql_error());
}
?>
<!DOCTYPE html>
<html lang="en"><!-- InstanceBegin template="/Templates/template.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- InstanceBeginEditable name="doctitle" -->
<title>JPN Word Insert</title>
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
<form method="post" name="form1" action="<?php echo $editFormAction; ?>">
    <table align="center" class="table table-bordered">
        <tr valign="baseline">
            <td nowrap align="right">Jpn:</td>
            <td><input type="text" class="form-control" name="jpn" value="<?php echo $_GET['jpn'] ?>" size="32"></td>
        </tr>
        <tr valign="baseline">
            <td nowrap align="right">Eng:</td>
            <td><input type="text" class="form-control" name="eng" value="<?php echo $_GET['eng'] ?>" size="32"></td>
        </tr>
        <tr valign="baseline">
            <td nowrap align="right">Chi:</td>
            <td><input type="text" class="form-control" name="chi" value="<?php echo $_GET['chi'] ?>" size="32"></td>
        </tr>
        <tr valign="baseline">
            <td nowrap align="right">Ne3ID:</td>
            <td><input type="text" class="form-control" name="ne3ID" value="" size="32"></td>
        </tr>
        <tr valign="baseline">
            <td nowrap align="right">Cid:</td>
            <td><input type="text" class="form-control" name="cid" value="" size="32"></td>
        </tr>
        <tr valign="baseline">
            <td nowrap align="right">Total:</td>
            <td><input type="text" class="form-control" name="total" value="" size="32"></td>
        </tr>
        <tr valign="baseline">
            <td nowrap align="right">Status:</td>
            <td><input type="text" class="form-control" name="status" value="" size="32"></td>
        </tr>
        <tr valign="baseline">
            <td nowrap align="right">&nbsp;</td>
            <td><input type="submit" value="插入记录"></td>
        </tr>
    </table>
    <input type="hidden" name="MM_insert" value="form1">
</form>
<p>&nbsp;</p>
<!-- InstanceEndEditable --> </div>
<!-- Include all compiled plugins (below), or include individual files as needed --> 
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>
<!-- InstanceEnd --></html>