<?php require_once('Connections/conn.php'); ?>
<?php
mysql_select_db($database_conn, $conn);
$query_Recordset1 = "SELECT * FROM jpn_sen_audio_cate ORDER BY cid ASC";
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
    <table class="table table-bordered">
        <tr>
            <td>ID</td>
            <td>text</td>
        </tr>
        <?php do { ?>
            <tr>
                <td><?php echo $row_Recordset1['ID']; ?></td>
                <td><a href="jpn_sen_audio_list.php?cid=<?php echo $row_Recordset1['cid']; ?>"><?php echo $row_Recordset1['text']; ?></a></td>
            </tr>
            <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
    </table>
    <!-- InstanceEndEditable --> </div>
<!-- Include all compiled plugins (below), or include individual files as needed --> 
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>
<!-- InstanceEnd -->
</html>
<?php
mysql_free_result($Recordset1);
?>
