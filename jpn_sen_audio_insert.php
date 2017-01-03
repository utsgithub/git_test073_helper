<?php require_once('Connections/conn.php'); ?>
<?php
$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO jpn_sen_audio (cid, category, `sum`, eng, eng1, chn, audio, status, pid, sum2) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['cid'], "int"),
                       GetSQLValueString($_POST['category'], "int"),
                       GetSQLValueString($_POST['sum'], "int"),
                       GetSQLValueString($_POST['eng'], "text"),
                       GetSQLValueString($_POST['eng1'], "text"),
                       GetSQLValueString($_POST['chn'], "text"),
                       GetSQLValueString($_POST['audio'], "text"),
                       GetSQLValueString($_POST['status'], "text"),
                       GetSQLValueString($_POST['pid'], "int"),
                       GetSQLValueString($_POST['sum2'], "int"));

  mysql_select_db($database_conn, $conn);
  $Result1 = mysql_query($insertSQL, $conn) or die(mysql_error());
  $updateSQL = "UPDATE jpn_sen_audio SET status='info' WHERE ID=".$_GET['ID'];
  $Result2 = mysql_query($updateSQL, $conn) or die(mysql_error());
  header ("Location: jpn_sen_audio_edit.php?ID=".$_GET['ID'] );
}

$colname_Recordset1 = "-1";
if (isset($_GET['ID'])) {
  $colname_Recordset1 = $_GET['ID'];
}
mysql_select_db($database_conn, $conn);
$query_Recordset1 = sprintf("SELECT * FROM jpn_sen_audio WHERE ID = %s", GetSQLValueString($colname_Recordset1, "int"));
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
                <td nowrap align="right">Cid:</td>
                <td><input type="text" class="form-control" name="cid" value="" size="32"></td>
            </tr>
            <tr valign="baseline">
                <td nowrap align="right">Category:</td>
                <td><input type="text" class="form-control" name="category" value="<?php echo $row_Recordset1['category']; ?>" size="32"></td>
            </tr>
            <tr valign="baseline">
                <td nowrap align="right">Sum:</td>
                <td><input type="text" class="form-control" name="sum" value="<?php echo $row_Recordset1['sum']; ?>" size="32"></td>
            </tr>
            <tr valign="baseline">
                <td nowrap align="right">Eng:</td>
                <td><input type="text" class="form-control" name="eng" value="<?php echo $row_Recordset1['eng']; ?>" size="32"></td>
            </tr>
            <tr valign="baseline">
                <td nowrap align="right">Eng1:</td>
                <td><input type="text" class="form-control" name="eng1" value="<?php echo $row_Recordset1['eng1']; ?>" size="32"></td>
            </tr>
            <tr valign="baseline">
                <td nowrap align="right">Chn:</td>
                <td><input type="text" class="form-control" name="chn" value="<?php echo $row_Recordset1['chn']; ?>" size="32"></td>
            </tr>
            <tr valign="baseline">
                <td nowrap align="right">Audio:</td>
                <td><input type="text" class="form-control" name="audio" value="<?php echo $row_Recordset1['audio']; ?>" size="32"></td>
            </tr>
            <tr valign="baseline">
                <td nowrap align="right">Status:</td>
                <td><input type="text" class="form-control" name="status" value="" size="32"></td>
            </tr>
            <tr valign="baseline">
                <td nowrap align="right">Pid:</td>
                <td><input type="text" class="form-control" name="pid" value="<?php echo $row_Recordset1['cid']; ?>" size="32"></td>
            </tr>
            <tr valign="baseline">
                <td nowrap align="right">Sum2:</td>
                <td><input type="text" class="form-control" name="sum2" value="" size="32"></td>
            </tr>
            <tr valign="baseline">
                <td nowrap align="right">&nbsp;</td>
                <td><input type="submit" value="插入记录"></td>
            </tr>
        </table>
        <input type="hidden" name="MM_insert" value="form1">
    </form>
    <!-- InstanceEndEditable --> </div>
<!-- Include all compiled plugins (below), or include individual files as needed --> 
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>
<!-- InstanceEnd -->
</html>
<?php
mysql_free_result($Recordset1);
?>
