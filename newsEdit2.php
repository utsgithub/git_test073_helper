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
    $updateSQL = sprintf("UPDATE news SET categoryID=%s, subTitle=%s, subject=%s, tempCate=%s, sortNum=%s, times=%s, sen=%s, image=%s, hint=%s, sort=%s, sen_cn=%s, audio=%s WHERE ID=%s",
                         GetSQLValueString($_POST['categoryID'], "int"),
                         GetSQLValueString($_POST['subTitle'], "text"),
                         GetSQLValueString($_POST['subject'], "text"),
                         GetSQLValueString($_POST['tempCate'], "int"),
                         GetSQLValueString($_POST['sortNum'], "int"),
                         GetSQLValueString($_POST['times'], "int"),
                         GetSQLValueString($_POST['sen'], "text"),
                         GetSQLValueString($_POST['image'], "text"),
                         GetSQLValueString($_POST['hint'], "text"),
                         GetSQLValueString($_POST['sort'], "text"),
                         GetSQLValueString($_POST['sen_cn'], "text"),
                         GetSQLValueString($_POST['audio'], "text"),
                         GetSQLValueString($_POST['ID'], "int"));

    mysql_select_db($database_conn, $conn);
    $Result1 = mysql_query($updateSQL, $conn) or die(mysql_error());
}

$colname_rs = "-1";
if (isset($_GET['ID'])) {
    $colname_rs = $_GET['ID'];
}
mysql_select_db($database_conn, $conn);
$query_rs = sprintf("SELECT * FROM news WHERE ID = %s", GetSQLValueString($colname_rs, "int"));
$rs = mysql_query($query_rs, $conn) or die(mysql_error());
$row_rs = mysql_fetch_assoc($rs);
$totalRows_rs = mysql_num_rows($rs);
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
                <?php
                $colname_sen = $row_rs['sen'];
                if (isset($_GET['ID'])) {
                    $colname_sen = $_GET['sen'];
                }

                $colname_sen_cn = $row_rs['sen_cn'];
                if (isset($_GET['ID'])) {
                    $colname_sen_cn = $_GET['sen_cn'];
                }

                $colname_audio = $row_rs['audio'];
                if (isset($_GET['ID'])) {
                    $colname_audio = $_GET['audio'];
                }

                ?>
                <tr valign="baseline" class="">
                    <td nowrap align="right">SubTitle:</td>
                    <td>
                        <input type="text" class="form-control" name="subTitle" value="<?php echo $row_rs['subTitle']; ?>" size="32" />
                    </td>
                </tr>
                <tr valign="baseline" class="">
                    <td nowrap align="right">Hint:</td>
                    <td>
                        <input type="text" class="form-control" name="hint" value="<?php echo $row_rs['hint']; ?>" size="32" />
                    </td>
                </tr>
                <tr valign="baseline" class="">
                    <td nowrap align="right">Subject:</td>
                    <td>
                        <input type="text" class="form-control" name="subject" value="<?php echo $row_rs['subject']; ?>" size="32" />
                    </td>
                </tr>
                <tr valign="baseline" class="">
                    <td nowrap align="right">Sen:</td>
                    <td>
                        <input type="text" class="form-control" name="sen" value="<?php echo $colname_sen; ?>" size="32" />
                    </td>
                </tr>
                <tr valign="baseline" class="">
                    <td nowrap align="right">Sen_cn:</td>
                    <td>
                        <input type="text" class="form-control" name="sen_cn" value="<?php echo $colname_sen_cn; ?>" size="32" />
                    </td>
                </tr>
                <tr valign="baseline" class="">
                    <td nowrap align="right">Audio:</td>
                    <td>
                        <input type="text" class="form-control" name="audio" value="<?php echo $colname_audio; ?>" size="32" />
                    </td>
                </tr>
                <tr valign="baseline" class="none">
                    <td nowrap align="right">ID:</td>
                    <td>
                        <?php echo $row_rs['ID']; ?>
                    </td>
                </tr>
                <tr valign="baseline" class="none">
                    <td nowrap align="right">CategoryID:</td>
                    <td>
                        <input type="text" class="form-control" name="categoryID" value="<?php echo htmlentities($row_rs['categoryID'], ENT_COMPAT, 'utf-8'); ?>" size="32" />
                    </td>
                </tr>


                <tr valign="baseline" class="none">
                    <td nowrap align="right">TempCate:</td>
                    <td>
                        <input type="text" class="form-control" name="tempCate" value="<?php echo htmlentities($row_rs['tempCate'], ENT_COMPAT, 'utf-8'); ?>" size="32" />
                    </td>
                </tr>
                <tr valign="baseline" class="none">
                    <td nowrap align="right">SortNum:</td>
                    <td>
                        <input type="text" class="form-control" name="sortNum" value="<?php echo htmlentities($row_rs['sortNum'], ENT_COMPAT, 'utf-8'); ?>" size="32" />
                    </td>
                </tr>
                <tr valign="baseline" class="none">
                    <td nowrap align="right">Times:</td>
                    <td>
                        <input type="text" class="form-control" name="times" value="<?php echo htmlentities($row_rs['times'], ENT_COMPAT, 'utf-8'); ?>" size="32" />
                    </td>
                </tr>

                <tr valign="baseline" class="none">
                    <td nowrap align="right">Image:</td>
                    <td>
                        <input type="text" class="form-control" name="image" value="<?php echo htmlentities($row_rs['image'], ENT_COMPAT, 'utf-8'); ?>" size="32" />
                    </td>
                </tr>



                <tr valign="baseline" class="none">
                    <td nowrap align="right">Sort:</td>
                    <td>
                        <input type="text" class="form-control" name="sort" value="<?php echo htmlentities($row_rs['sort'], ENT_COMPAT, 'utf-8'); ?>" size="32" />
                    </td>
                </tr>
                <tr valign="baseline" class="">
                    <td nowrap align="right">&nbsp;</td>
                    <td>
                        <input type="submit" value="更新记录" />
                    </td>
                </tr>
            </table>
            <input type="hidden" name="MM_update" value="form1" />
            <input type="hidden" name="ID" value="<?php echo $row_rs['ID']; ?>" />
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
mysql_free_result($rs);
?>
