<?php require_once('Connections/conn.php'); ?>
<?php require_once('Connections/conn.php');
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

$colname_rs = "-1";
if (isset($_GET['word'])) {
    $colname_rs = $_GET['word'];
    $getWord=trim($_GET['word']);
}
mysql_select_db($database_conn, $conn);
$query_rs = sprintf("SELECT * FROM jpn_sen WHERE eng LIKE %s order by len asc", GetSQLValueString("%" . trim($colname_rs) . "%", "text"));
$rs = mysql_query($query_rs, $conn) or die(mysql_error());
$row_rs = mysql_fetch_assoc($rs);
$totalRows_rs = mysql_num_rows($rs);
$colname_rsWord = "-1";
if (isset($_GET['word'])) {
  $colname_rsWord = $_GET['word'];
}
mysql_select_db($database_conn, $conn);
$query_rsWord = sprintf("SELECT * FROM jpn_words WHERE eng = %s", GetSQLValueString($colname_rsWord, "text"));
$rsWord = mysql_query($query_rsWord, $conn) or die(mysql_error());
$row_rsWord = mysql_fetch_assoc($rsWord);
$totalRows_rsWord = mysql_num_rows($rsWord);
?><!DOCTYPE html>
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
        <form method="get">
            <input type="text" name="word" />
            <input type="submit" />
        </form>
        <a href="newsEdit2.php?ID=<?php echo trim($_GET['id'])?>" target="_blank">Edit</a>
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
                    <td><?php echo $row_rsWord['id']; ?></td>
                    <td><?php echo $row_rsWord['jpn']; ?></td>
                    <td><?php echo $row_rsWord['eng']; ?></td>
                    <td><?php echo $row_rsWord['chi']; ?></td>
                    <td><?php echo $row_rsWord['ne3ID']; ?></td>
                    <td><?php echo $row_rsWord['cid']; ?></td>
                    <td><?php echo $row_rsWord['total']; ?></td>
                    
                </tr>
                <?php } while ($row_rsWord = mysql_fetch_assoc($rsWord)); ?>
        </table>
<table class="table table-bordered mtl">
            <tr>
                <td class="">id</td>
                <td class="none">category</td>
                <td class="none">sum</td>
                <td>eng</td>
                <td>len</td>
                <td>chi</td>
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
            <?php echo $row_rs['id']; ?>
        </td>
        <td class="none">
            <?php echo $row_rs['category']; ?>
        </td>
        <td class="none">
            <?php echo $row_rs['sum']; ?>
        </td>
        <td>
            <a href="?sen_id=<?php echo $row_rs['id']; ?>&word_id=<?php echo $word_id?>" target="_blank">
                <?php echo str_replace($getWord, "<b style='color: red'>".$getWord."</b>", $row_rs['eng']); ?>
            </a>
        </td>
        <td>
            <?php echo strlen($row_rs['eng']); ?>
        </td>
        <td>
            <?php echo $row_rs['chi']; ?>
        </td>
        <td class="none">
            <?php echo $row_rs['cid']; ?>
        </td>
        <td>
            <a href="audioJPN/<?php echo $row_rs['audio']; ?>" target="_blank">
                <?php echo $row_rs['audio']; ?>
            </a>
        </td>
        <td>

            <a target="_blank" href="newsEdit2.php?ID=<?php echo trim($_GET['id'])?>&sen=<?php echo strlen($row_rs['eng']); ?>&sen_cn=<?php echo $row_rs['chi']; ?>&audio=<?php echo $row_rs['audio']; ?>">Choose</a>
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
