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

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
  $updateSQL = sprintf("UPDATE jpn_splitter SET chi=%s, eng=%s, sen_chi=%s, sen_eng=%s, audio=%s, new_chi=%s, new_eng=%s, new_audio=%s, len=%s, category=%s, new_len=%s WHERE ID=%s",
                       GetSQLValueString($_POST['chi'], "text"),
                       GetSQLValueString($_POST['eng'], "text"),
                       GetSQLValueString($_POST['sen_chi'], "text"),
                       GetSQLValueString($_POST['sen_eng'], "text"),
                       GetSQLValueString($_POST['audio'], "text"),
                       GetSQLValueString($_POST['new_chi'], "text"),
                       GetSQLValueString($_POST['new_eng'], "text"),
                       GetSQLValueString($_POST['new_audio'], "text"),
                       GetSQLValueString($_POST['len'], "int"),
                       GetSQLValueString($_POST['category'], "text"),
					   GetSQLValueString(strlen($_POST['new_eng']), "int"),
                       GetSQLValueString($_POST['ID'], "int"));
					   
					   
//echo $updateSQL;
//echo strlen($_POST['new_eng']);
  mysql_select_db($database_conn, $conn);
  $Result1 = mysql_query($updateSQL, $conn) or die(mysql_error());

  $updateGoTo = "jpn_splitter_list.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  //header(sprintf("Location: %s", $updateGoTo));
}

$colname_Recordset1 = "-1";
if (isset($_GET['ID'])) {
  $colname_Recordset1 = $_GET['ID'];
}
mysql_select_db($database_conn, $conn);
$query_Recordset1 = sprintf("SELECT * FROM jpn_splitter WHERE ID = %s", GetSQLValueString($colname_Recordset1, "int"));
$Recordset1 = mysql_query($query_Recordset1, $conn) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
?>
<!DOCTYPE html>
<html lang="en">
<!-- InstanceBegin template="/Templates/template.dwt.php" codeOutsideHTMLIsLocked="false" -->
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
    <form method="post" name="form1" action="<?php echo $editFormAction; ?>">
        <table align="center" class="table table-bordered">
            <tr valign="baseline">
                <td nowrap align="right">ID:</td>
                <td><?php echo $row_Recordset1['ID']; ?></td>
            </tr>
            <tr valign="baseline">
                <td nowrap align="right">Chi:</td>
                <td><input type="text" class="form-control"name="chi" value="<?php echo htmlentities($row_Recordset1['chi'], ENT_COMPAT, 'utf-8'); ?>" size="32"></td>
            </tr>
            <tr valign="baseline">
                <td nowrap align="right">Eng:</td>
                <td>
                <input type="type" class="form-control"name="eng" value="<?php echo htmlentities($row_Recordset1['eng'], ENT_COMPAT, 'utf-8'); ?>" size="32"></td>
            </tr>
            <tr valign="baseline">
                <td nowrap align="right">Sen_chi:</td>
                <td><input type="text" class="form-control"name="sen_chi" value="<?php echo htmlentities($row_Recordset1['sen_chi'], ENT_COMPAT, 'utf-8'); ?>" size="32"></td>
            </tr>
            <tr valign="baseline">
                <td nowrap align="right">Sen_eng:</td>
                <td>
                <div><?php echo str_replace($row_Recordset1['eng'], "<b style='color:red'>".$row_Recordset1['eng']."</b>", $row_Recordset1['sen_eng']) ?></div>
                <input type="text" class="form-control"name="sen_eng" value="<?php echo htmlentities($row_Recordset1['sen_eng'], ENT_COMPAT, 'utf-8'); ?>" size="32"></td>
            </tr>
            <tr valign="baseline">
                <td nowrap align="right">Audio:</td>
                <td><input type="text" class="form-control"name="audio" value="<?php echo htmlentities($row_Recordset1['audio'], ENT_COMPAT, 'utf-8'); ?>" size="32"></td>
            </tr>
            <tr valign="baseline">
                <td nowrap align="right">New_chi:</td>
                <td><input type="text" class="form-control"name="new_chi" value="<?php echo htmlentities($row_Recordset1['new_chi'], ENT_COMPAT, 'utf-8'); ?>" size="32"></td>
            </tr>
            <tr valign="baseline">
                <td nowrap align="right">New_eng:</td>
                <td><input type="text" class="form-control"name="new_eng" value="<?php echo htmlentities($row_Recordset1['new_eng'], ENT_COMPAT, 'utf-8'); ?>" size="32"></td>
            </tr>
            <tr valign="baseline">
                <td nowrap align="right">New_audio:</td>
                <td><input type="text" class="form-control"name="new_audio" value="<?php echo htmlentities($row_Recordset1['new_audio'], ENT_COMPAT, 'utf-8'); ?>" size="32"></td>
            </tr>
            <tr valign="baseline">
                <td nowrap align="right">Len:</td>
                <td><input type="text" class="form-control"name="len" value="<?php echo htmlentities($row_Recordset1['len'], ENT_COMPAT, 'utf-8'); ?>" size="32"></td>
            </tr>
            <tr valign="baseline">
                <td nowrap align="right">Category:</td>
                <td><input type="text" class="form-control"name="category" value="<?php echo htmlentities($row_Recordset1['category'], ENT_COMPAT, 'utf-8'); ?>" size="32"></td>
            </tr>
            <tr valign="baseline">
                <td nowrap align="right">&nbsp;</td>
                <td><input type="submit" value="更新记录"></td>
            </tr>
        </table>
        <input type="hidden" name="MM_update" value="form1">
        <input type="hidden" name="ID" value="<?php echo $row_Recordset1['ID']; ?>">
    </form>
    <p>&nbsp;</p>
    <!-- InstanceEndEditable --> </div>
<!-- Include all compiled plugins (below), or include individual files as needed --> 
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>
<!-- InstanceEnd -->
</html>
<?php
mysql_free_result($Recordset1);
?>
