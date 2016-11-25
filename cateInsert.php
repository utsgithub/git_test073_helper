<?php require_once('Connections/conn.php'); ?>
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
    <?php
    $editFormAction = $_SERVER['PHP_SELF'];
    if (isset($_SERVER['QUERY_STRING'])) {
        $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
    }

    if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
        $pid=$_POST['parentID'];
        $insertSQL = sprintf("INSERT INTO news_category (category, parentID, sortNum) VALUES (%s, %s, %s)",
                             GetSQLValueString($_POST['category'], "text"),
                             GetSQLValueString($_POST['parentID'], "int"),
                             GetSQLValueString($_POST['sortNum'], "int"));

        mysql_select_db($database_conn, $conn);
        $Result1 = mysql_query($insertSQL, $conn) or die(mysql_error());

        $insertGoTo = "cateList.php?pid=".$pid;
        header("Location: ".$insertGoTo);
    }
    ?>
</head>
<body>
    <!-- inc_nav -->
    <?php include("inc/inc_nav.php"); ?>
    <div class="container">
        <!-- InstanceBeginEditable name="EditRegion1" -->
        <!-- Page: cateInsert -->
        <form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">
            <table align="center" class="table table-bordered">
                <tr valign="baseline">
                    <td nowrap="nowrap" align="right">Category:</td>
                    <td>
                        <input type="text" name="category" value="" size="32" />
                    </td>
                </tr>
                <tr valign="baseline">
                    <td nowrap="nowrap" align="right">ParentID:</td>
                    <td>
                        <input type="text" name="parentID" value="<?php echo $pid;?>" size="32" />
                    </td>
                </tr>
                <tr valign="baseline">
                    <td nowrap="nowrap" align="right">SortNum:</td>
                    <td>
                        <input type="text" name="sortNum" value="" size="32" />
                    </td>
                </tr>
                <tr valign="baseline">
                    <td nowrap="nowrap" align="right">&nbsp;</td>
                    <td>
                        <input type="submit" value="插入记录" />
                    </td>
                </tr>
            </table>
            <input type="hidden" name="MM_insert" value="form1" />
        </form>
        <p>&nbsp;</p>
        <!-- InstanceEndEditable -->
    </div>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>
<!-- InstanceEnd -->
</html>