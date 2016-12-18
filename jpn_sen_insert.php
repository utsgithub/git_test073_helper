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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
    $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
    $insertSQL = sprintf("INSERT INTO jpn_sen (category, `sum`, eng, chi, cid, audio, len, status) VALUES (%s, %s, %s, %s, %s, %s, %s, %s)",
                         GetSQLValueString($_POST['category'], "text"),
                         GetSQLValueString($_POST['sum'], "text"),
                         GetSQLValueString($_POST['eng'], "text"),
                         GetSQLValueString($_POST['chi'], "text"),
                         GetSQLValueString($_POST['cid'], "int"),
                         GetSQLValueString($_POST['audio'], "text"),
                         GetSQLValueString($_POST['len'], "int"),
                         GetSQLValueString($_POST['status'], "text"));

    mysql_select_db($database_conn, $conn);
    $Result1 = mysql_query($insertSQL, $conn) or die(mysql_error());

    $insertGoTo = "jpn_sen_list.php";
    if (isset($_SERVER['QUERY_STRING'])) {
        $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
        $insertGoTo .= $_SERVER['QUERY_STRING'];
    }
    header(sprintf("Location: %s", $insertGoTo));
}

$colname_rsOri = "-1";
if (isset($_GET['ori_audio'])) {
  $colname_rsOri = $_GET['ori_audio'];
}
mysql_select_db($database_conn, $conn);
$query_rsOri = sprintf("SELECT * FROM jpn_sen WHERE ori_audio = %s", GetSQLValueString($colname_rsOri, "text"));
$rsOri = mysql_query($query_rsOri, $conn) or die(mysql_error());
$row_rsOri = mysql_fetch_assoc($rsOri);
$totalRows_rsOri = mysql_num_rows($rsOri);
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
            <?php
            $colname_sen = "";
            if (isset($_GET['sen'])) {
                $colname_sen = $_GET['sen'];
            }

            $colname_sen_cn = "";
            if (isset($_GET['sen_cn'])) {
                $colname_sen_cn = $_GET['sen_cn'];
            }

            $colname_audio = "";
            if (isset($_GET['audio'])) {
                $colname_audio = $_GET['audio'];
            }

            ?>
            <table align="center" class="table table-bordered">
                <tr valign="baseline">
                    <td nowrap align="right">Category:</td>
                    <td>
                        <input type="text" class="form-control" name="category" value="" size="32" />
                    </td>
                </tr>
                <tr valign="baseline">
                    <td nowrap align="right">Sum:</td>
                    <td>
                        <input type="text" class="form-control" name="sum" value="" size="32" />
                    </td>
                </tr>
                <tr valign="baseline">
                    <td nowrap align="right">Eng:</td>
                    <td>
                        <input type="text" class="form-control" name="eng" value="<?php echo $colname_sen;?>" size="32" />
                    </td>
                </tr>
                <tr valign="baseline">
                    <td nowrap align="right">Chi:</td>
                    <td>
                        <input type="text" class="form-control" name="chi" value="<?php echo $colname_sen_cn;?>" size="32" />
                    </td>
                </tr>
                <tr valign="baseline">
                    <td nowrap align="right">Cid:</td>
                    <td>
                        <input type="text" class="form-control" name="cid" value="" size="32" />
                    </td>
                </tr>
                <tr><td></td><td class="has-error"><input type="text" class="form-control" value="<?php echo $colname_audio ?>"</td></tr>
                <tr valign="baseline">
                    <td nowrap align="right">Audio:</td>
                    <td>
                        <input type="text" class="form-control" name="audio" value="<?php echo $colname_rsOri ?>-<?php echo $totalRows_rsOri ?>.mp3" size="32" />
                    </td>
                </tr>
                <tr valign="baseline">
                    <td nowrap align="right">Len:</td>
                    <td>
                        <input type="text" class="form-control" name="len" value="" size="32" />
                    </td>
                </tr>
                <tr valign="baseline">
                    <td nowrap align="right">Status:</td>
                    <td>
                        <input type="text" class="form-control" name="status" value="" size="32" />
                    </td>
                </tr>
                <tr valign="baseline">
                    <td nowrap align="right">&nbsp;</td>
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
<?php
mysql_free_result($rsOri);
?>
