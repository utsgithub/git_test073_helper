<?php require_once('Connections/conn.php'); ?>
<?php
$colname_rs = "-1";
if (isset($_GET['word'])) {
    $colname_rs = trim($_GET['word']);
    $getWord=trim($_GET['word']);
}
mysql_select_db($database_conn, $conn);
$query_rs = sprintf("SELECT * FROM jpn_sen WHERE eng LIKE %s order by len asc", GetSQLValueString("%" . trim($colname_rs) . "%", "text"));
$rs = mysql_query($query_rs, $conn) or die(mysql_error());
$row_rs = mysql_fetch_assoc($rs);
$totalRows_rs = mysql_num_rows($rs);
$colname_rsWord = "-1";
if (isset($_GET['word'])) {
    $colname_rsWord = trim($_GET['word']);
}
mysql_select_db($database_conn, $conn);
$query_rsWord = sprintf("SELECT * FROM jpn_words WHERE eng = %s", GetSQLValueString($colname_rsWord, "text"));
$rsWord = mysql_query($query_rsWord, $conn) or die(mysql_error());
$row_rsWord = mysql_fetch_assoc($rsWord);
$totalRows_rsWord = mysql_num_rows($rsWord);
?>
<!DOCTYPE html>
<html lang="en">
<!-- InstanceBegin template="/Templates/template.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!-- InstanceBeginEditable name="doctitle" -->
    <title>JPN Word Search</title>
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
        <form method="get" class="form-inline">
            <input type="text" name="word" class="form-control" value="<?php echo $getWord;?>" />
            <input type="submit" class="btn btn-primary" />
        </form>

        <table class="table table-bordered mtl">
            <tr>
                <td>id</td>
                <td>jpn</td>
                <td>eng</td>
                <td>chi</td>
                <td>ne3ID</td>
                <td>cid</td>
                <td>total</td>

            </tr>
            <?php do {
                      $word_id=$row_rsWord['id'];
                      $word_jpn=$row_rsWord['jpn'];
                      $word_eng=$row_rsWord['eng'];
                      $word_chi=$row_rsWord['chi'];
                      $word_ne3ID=$row_rsWord['ne3ID'];
                      $word_cid=$row_rsWord['cid'];
                      $word_total=$row_rsWord['total'];
            ?>
            <tr>
                <td>
                    <?php echo $row_rsWord['id']; ?>
                </td>
                <td>
                    <a target="_blank" href="">
                        <?php echo $row_rsWord['jpn']; ?>
                    </a>
                </td>
                <td>
                    <?php echo $row_rsWord['eng']; ?>
                </td>
                <td>
                    <?php echo $row_rsWord['chi']; ?>
                </td>
                <td>
                    <?php echo $row_rsWord['ne3ID']; ?>
                </td>
                <td>
                    <?php echo $row_rsWord['cid']; ?>
                </td>
                <td>
                    <?php echo $row_rsWord['total']; ?>
                </td>

            </tr>
            <?php } while ($row_rsWord = mysql_fetch_assoc($rsWord)); ?>
        </table>
        <a href="newsEdit2.php?ID=<?php echo trim($_GET['id'])?>" target="_blank" class="btn btn-primary">Edit</a>
        <table class="table table-bordered mtl">
            <tr>
                <td class="">id</td>
                <td class="none">category</td>
                <td class="none">sum</td>
                <td>eng</td>
                <td>len</td>
                <td class="none">chi</td>
                <td class="none">cid</td>
                <td>audio</td>
                <td></td>
            </tr>
            <?php do {
                      $audio="";
                      if (isset($_GET['audio'])) {
                          $audio = $_GET['audio'];
                      }
            ?>

            <tr <?php if(trim($audio)==$row_rs['audio'] || $word_ne3ID==$row_rs['id']){ echo "class='bg-success'";}else{echo "";}?>>
                <td class="">
                    <a href="jpn_search_edit.php?id=<?php echo $row_rs['id']; ?>" target="_blank">
                        <?php echo $row_rs['id']; ?>
                    </a>
                </td>
                <td class="none">
                    <?php echo $row_rs['category']; ?>
                </td>
                <td class="none">
                    <?php echo $row_rs['sum']; ?>
                </td>
                <td>
                    <div>
                        <a href="?sen_id=<?php echo $row_rs['id']; ?>&word_id=<?php echo $word_id?>" target="_blank">
                            <?php echo str_replace($getWord, "<b style='color: red'>".$getWord."</b>", $row_rs['eng']); ?>
                        </a>
                    </div>
                    <div>
                        <?php echo $row_rs['chi']; ?>
                    </div>
                </td>
                <td>
                    <?php echo strlen($row_rs['eng']); ?>
                </td>
                <td class="none">
                    
                </td>
                <td class="none">
                    <?php echo $row_rs['cid']; ?>
                </td>
                <td>
                    <!--<a href="audioJPN/<?php echo $row_rs['audio']; ?>" target="_blank">
                        <?php echo $row_rs['audio']; ?>
                    </a>-->
                    <input type="text" value="<?php echo $row_rs['audio']; ?>" class="form-control mbl" />
                    <audio src="audioJPN/Default Split Group/<?php echo $row_rs['audio']; ?>" controls></audio>
                </td>
                <td>
                    <a target="_blank" href="newsEdit2.php?ID=<?php echo trim($_GET['id'])?>&sen=<?php echo $row_rs['eng']; ?>&sen_cn=<?php echo $row_rs['chi']; ?>&audio=<?php echo $row_rs['audio']; ?>">Choose</a>
                    |
                    <a target="_blank" href="jpn_sen_insert.php?sen=<?php echo $row_rs['eng']; ?>&sen_cn=<?php echo $row_rs['chi']; ?>&audio=<?php echo $row_rs['audio']; ?>&ori_audio=<?php echo $row_rs['ori_audio']; ?>">Split</a>
                    |
                    <a target="_blank" href="jpn_sen_ori_audio.php?ori_audio=<?php echo $row_rs['ori_audio']; ?>">Ori Audio</a>
                </td>
            </tr>
            <?php } while ($row_rs = mysql_fetch_assoc($rs)); ?>
        </table>
        <!-- InstanceEndEditable -->
    </div>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>
<!-- InstanceEnd -->
</html>
<?php
mysql_free_result($rs);
mysql_free_result($rsWord);
?>
