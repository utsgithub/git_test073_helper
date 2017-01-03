<?php require_once('Connections/conn.php'); ?>
<?php
mysql_select_db($database_conn, $conn);
$query_Recordset1 = "select DISTINCT jpn_sen.audio as 'audio', jpn_sen.eng, jpn_sen.chi from jpn_sen, jpn_words where jpn_words.ne3ID=jpn_sen.id ORDER BY audio asc";
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
<h1><?php echo $totalRows_Recordset1 ?></h1>
    <a href="jpn_word_list.php" class="btn btn-primary mbl">Back</a>
<table class="table table-bordered table-hover">
    <tr>
        <td>audio</td>
        <td>audio</td>
        <td>eng</td>
        <td>chi</td>
    </tr>
    <?php do { ?>
        <tr>
            <td><?php echo $row_Recordset1['audio']; ?></td>
            <td><audio src="audioJPN/Default Split Group/<?php echo $row_Recordset1['audio']; ?>" controls></audio></td>
            <td><?php echo $row_Recordset1['eng']; ?></td>
            <td><?php echo $row_Recordset1['chi']; ?></td>
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
