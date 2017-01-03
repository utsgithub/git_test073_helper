<?php require_once('Connections/conn.php'); ?>
<?php
$getCid = "-1";
if (isset($_GET['cid'])) {
    $getCid = $_GET['cid'];
}
mysql_select_db($database_conn, $conn);
$query_Recordset1 = "SELECT * FROM jpn_sen_audio where category=".$getCid." and sum<13 order by audio";
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
        <a href="jpn_sen_audio_mp3Maker.php?category=<?php echo $getCid ?>" target="_blank">MP3 Maker</a>
        <table class="table table-bordered">
            <tr>
                <td>ID</td>
                <?php /*?><td>cid</td>
                <td>category</td>
                <td>sum</td><?php */?>
                <td>eng</td>
                <td>eng1</td>
                <td>chn</td>
                <td>audio</td>
            </tr>
            <?php do { ?>
            <tr class="bg-<?php echo $row_Recordset1['status']; ?>">
                <td>
                    <?php echo $row_Recordset1['ID']; ?>
                </td>
                <?php /*?> <td><?php echo $row_Recordset1['cid']; ?></td>
                      <td><?php echo $row_Recordset1['category']; ?></td>
                      <td><?php echo $row_Recordset1['sum']; ?></td><?php */?>
                <td>
                    <a href="jpn_sen_audio_edit.php?ID=<?php echo $row_Recordset1['ID']; ?>" target="_blank">
                        <?php echo $row_Recordset1['eng']; ?>
                    </a>
                </td>
                <td>
                    <?php echo $row_Recordset1['eng1']; ?>
                </td>
                <td>
                    <?php echo $row_Recordset1['chn']; ?>
                </td>
                <td>
                    <?php echo $row_Recordset1['audio']; ?>
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
