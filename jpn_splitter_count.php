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
$query_Recordset1 = "SELECT ID, audio,sen_eng, sen_chi, len, COUNT(audio) AS 'count'
FROM `jpn_splitter` where len>32 and isNull(new_audio) and ID>3000 GROUP BY audio ORDER BY COUNT(audio) desc";
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
        <h1><?php echo $totalRows_Recordset1;?></h1>
        <table class="table table-bordered table-hover">
            <tr>
                <td>ID</td>
                <td>audio</td>
                <td>sen_eng</td>
                <!--<td>sen_chi</td>-->
                <td>len</td>
                <td>count</td>
            </tr>
            <?php do { ?>
            <tr id="<?php echo $row_Recordset1['audio']; ?>">
                <td>
                    <?php echo $row_Recordset1['ID']; ?>
                </td>
                <td>
                    <a href="jpn_splitter_audio.php?audio=<?php echo $row_Recordset1['audio']; ?>">
                        <?php echo $row_Recordset1['audio']; ?>
                    </a>
                </td>
                <td>
                    <!--<a href="jpn_splitter_edit.php?ID=<?php echo $row_Recordset1['ID']; ?>">-->
                    <?php echo $row_Recordset1['sen_eng']; ?>
                    <!--</a>-->
                </td>
                <!--<td>
                    <?php echo $row_Recordset1['sen_chi']; ?>
                </td>-->
                <td>
                    <?php echo $row_Recordset1['len']; ?>
                </td>
                <td>
                    <?php echo $row_Recordset1['count']; ?>
                </td>
            </tr>
            <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
        </table>
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
