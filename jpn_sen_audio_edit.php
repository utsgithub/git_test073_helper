<?php require_once('Connections/conn.php'); ?>
<?php
$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
    $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
    $updateSQL = sprintf("UPDATE jpn_sen_audio SET cid=%s, category=%s, `sum`=%s, eng=%s, eng1=%s, chn=%s, audio=%s, status=%s WHERE ID=%s",
                         GetSQLValueString($_POST['cid'], "int"),
                         GetSQLValueString($_POST['category'], "int"),
                         GetSQLValueString($_POST['sum'], "int"),
                         GetSQLValueString($_POST['eng'], "text"),
                         GetSQLValueString($_POST['eng1'], "text"),
                         GetSQLValueString($_POST['chn'], "text"),
                         GetSQLValueString($_POST['audio'], "text"),
                         GetSQLValueString($_POST['status'], "text"),
                         GetSQLValueString($_POST['ID'], "int"));

    mysql_select_db($database_conn, $conn);
    $Result1 = mysql_query($updateSQL, $conn) or die(mysql_error());
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
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
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
    <div class="container">
        <!-- InstanceBeginEditable name="EditRegion1" -->
        <form method="post" name="form1" action="<?php echo $editFormAction; ?>">
            <table align="center" class="table table-bordered">
                <tr valign="baseline">
                    <td nowrap align="right">ID:</td>
                    <td>
                        <?php echo $row_Recordset1['ID']; ?>
                    </td>
                </tr>
                <tr valign="baseline">
                    <td nowrap align="right">Cid:</td>
                    <td>
                        <input type="text" class="form-control" name="cid" value="<?php echo htmlentities($row_Recordset1['cid'], ENT_COMPAT, 'utf-8'); ?>" size="32" />
                    </td>
                </tr>
                <tr valign="baseline">
                    <td nowrap align="right">Category:</td>
                    <td>
                        <input type="text" class="form-control" name="category" value="<?php echo htmlentities($row_Recordset1['category'], ENT_COMPAT, 'utf-8'); ?>" size="32" />
                    </td>
                </tr>
                <tr valign="baseline">
                    <td nowrap align="right">Sum:</td>
                    <td>
                        <input type="text" class="form-control" name="sum" value="<?php echo htmlentities($row_Recordset1['sum'], ENT_COMPAT, 'utf-8'); ?>" size="32" />
                    </td>
                </tr>
                <tr valign="baseline">
                    <td nowrap align="right">Eng:</td>
                    <td>
                        <input type="text" class="form-control" name="eng" value="<?php echo htmlentities($row_Recordset1['eng'], ENT_COMPAT, 'utf-8'); ?>" size="32" />
                    </td>
                </tr>
                <tr valign="baseline">
                    <td nowrap align="right">Eng1:</td>
                    <td>
                        <input type="text" class="form-control" name="eng1" value="<?php echo htmlentities($row_Recordset1['eng1'], ENT_COMPAT, 'utf-8'); ?>" size="32" />
                        <div>
                            <audio src="audioJPN2/<?php echo $row_Recordset1['audio']; ?>" controls></audio>
                        </div>
                        <div>
                            <audio src="audioJPN2/Default Split Group/<?php echo $row_Recordset1['audio']; ?>" controls></audio>
                        </div>
                    </td>
                </tr>
                <tr valign="baseline">
                    <td nowrap align="right">Chn:</td>
                    <td>
                        <input type="text" class="form-control" name="chn" value="<?php echo htmlentities($row_Recordset1['chn'], ENT_COMPAT, 'utf-8'); ?>" size="32" />
                    </td>
                </tr>
                <tr valign="baseline">
                    <td nowrap align="right">Audio:</td>
                    <td>
                        <input type="text" class="form-control" name="audio" value="<?php echo htmlentities($row_Recordset1['audio'], ENT_COMPAT, 'utf-8'); ?>" size="32" />
                    </td>
                </tr>
                <tr valign="baseline">
                    <td nowrap align="right">Status:</td>
                    <td>
                        <select name="status" class="form-control">
                            <option value="<?php echo $row_Recordset1['status'];?>">
                                <?php echo $row_Recordset1['status'];?>
                            </option>
                            <option value="success">
                                Success
                            </option>
                            <option value="info">
                                Info
                            </option>
                            <option value="danger">
                                Danger
                            </option>
                            <option value="warning">
                                Warning
                            </option>
                            <option value="primary">
                                Primary
                            </option>
                        </select>
                    </td>
                </tr>
                <tr valign="baseline">
                    <td nowrap align="right">&nbsp;</td>
                    <td>
                        <input type="submit" value="更新记录" class="btn btn-primary" />
                        <a class="btn btn-warning" href="?ID=<?php echo $row_Recordset1['ID']-1; ?>">Pre</a>
                        <a class="btn btn-warning" href="?ID=<?php echo $row_Recordset1['ID']+1; ?>">Next</a>
                        <a class="btn btn-danger" href="jpn_sen_audio_insert.php?ID=<?php echo $row_Recordset1['ID']; ?>" target="_blank">Split</a>
                    </td>
                </tr>
            </table>
            <input type="hidden" name="MM_update" value="form1" />
            <input type="hidden" name="ID" value="<?php echo $row_Recordset1['ID']; ?>" />
        </form>
        <p>&nbsp;</p>
        <!-- InstanceEndEditable -->
    </div>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>
<!-- InstanceEnd -->
</html>
<?php
mysql_free_result($Recordset1);
?>
