<?php require_once('Connections/conn.php'); ?>
<?php
mysql_select_db($database_conn, $conn);
$query_Recordset1 = "SELECT * FROM jpn_sen order by id desc";
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
                <td></td>
                <td>len</td>
            </tr>
            <?php do { ?>
            <tr>
                <!--<td><?php echo $row_Recordset1['id']; ?></td>
                <td><?php echo $row_Recordset1['category']; ?></td>
                <td><?php echo $row_Recordset1['sum']; ?></td>-->
                <td>
                    <a href="jpn_search_edit.php?id=<?php echo $row_Recordset1['id']; ?>" target="_blank">
                    <?php echo $row_Recordset1['eng']; ?></a>
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
                <a href="jpn_sen_ori_audio.php?ori_audio=<?php echo $row_Recordset1['ori_audio']; ?>" target="_blank"><?php echo $row_Recordset1['ori_audio'];?></a>
                    <?php
				//substr($row_Recordset1['audio'], 0, 13) ;
				if($row_Recordset1['ori_audio']==""){
                    $updateSQL = "UPDATE jpn_sen SET ori_audio='".substr($row_Recordset1['audio'], 0 , -6)."' WHERE id=".$row_Recordset1['id'];
                          mysql_select_db($database_conn, $conn);
                          $Result = mysql_query($updateSQL, $conn) or die(mysql_error());
                      }
                    ?>
                
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
