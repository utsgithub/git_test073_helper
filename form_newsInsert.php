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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "formNewsInsert")) {
  $insertSQL = sprintf("INSERT INTO news (categoryId, subTitle, subject) VALUES (%s, %s, %s)",
                       GetSQLValueString($_POST['categoryId'], "int"),
                       GetSQLValueString($_POST['subTitle'], "text"),
                       GetSQLValueString($_POST['subject'], "text"));

  mysql_select_db($database_conn, $conn);
  $Result1 = mysql_query($insertSQL, $conn) or die(mysql_error());

  $insertGoTo = "newsList.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<form method="post" name="formNewsInsert" action="<?php echo $editFormAction; ?>">
    <table align="center">
        <tr valign="baseline">
            <td nowrap align="right">CategoryId:</td>
            <td><input type="text" name="categoryId" value="" size="32"></td>
        </tr>
        <tr valign="baseline">
            <td nowrap align="right">SubTitle:</td>
            <td><input type="text" name="subTitle" value="" size="32"></td>
        </tr>
        <tr valign="baseline">
            <td nowrap align="right">Subject:</td>
            <td><input type="text" name="subject" value="" size="32"></td>
        </tr>
        <tr valign="baseline">
            <td nowrap align="right">&nbsp;</td>
            <td><input type="submit" value="插入记录"></td>
        </tr>
    </table>
    <input type="hidden" name="MM_insert" value="formNewsInsert">
</form>
<p>&nbsp;</p>
