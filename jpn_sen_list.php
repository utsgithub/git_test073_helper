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
$query_Recordset1 = "SELECT * FROM jpn_sen";
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
        <table class="table table-bordered">
            <tr>
                <!--<td>id</td>
            <td>category</td>
            <td>sum</td>-->
                <td>eng</td>
                <td>chi</td>
                <td>cid</td>
                <td>audio</td>
                <td>len</td>
            </tr>
            <?php do { ?>
            <tr>
                <!--<td><?php echo $row_Recordset1['id']; ?></td>
                <td><?php echo $row_Recordset1['category']; ?></td>
                <td><?php echo $row_Recordset1['sum']; ?></td>-->
                <td>
                    <?php echo $row_Recordset1['eng']; ?>
                </td>
                <td>
                    <?php echo $row_Recordset1['chi']; ?>
                </td>
                <td>
                    <?php echo $row_Recordset1['cid']; ?>
                </td>
                <td>
                    <?php echo $row_Recordset1['audio']; ?>
                </td>
                <td>
                    <?php echo $row_Recordset1['len']; ?>
                </td>
            </tr>
            <?php
                      if($row_Recordset1['len']==""){
                          $updateSQL = "UPDATE jpn_sen SET len=".strlen($row_Recordset1['eng'])." WHERE id=".$row_Recordset1['id'];
                          mysql_select_db($database_conn, $conn);
                          $Result = mysql_query($updateSQL, $conn) or die(mysql_error());
                      }
                  } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
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
