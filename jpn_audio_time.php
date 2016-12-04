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
$query_rs = "SELECT * FROM jpn_sen";
$rs = mysql_query($query_rs, $conn) or die(mysql_error());
$row_rs = mysql_fetch_assoc($rs);
$totalRows_rs = mysql_num_rows($rs);

mysql_select_db($database_conn, $conn);
$query_rs2 = "SELECT * FROM jpn_sen";
$rs2 = mysql_query($query_rs2, $conn) or die(mysql_error());
$row_rs2 = mysql_fetch_assoc($rs2);
$totalRows_rs2 = mysql_num_rows($rs2);
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

<button id="button" onclick="myFunction()" type="button">Get audio length</button>

<?php do { ?>
    <audio id="media<?php echo $row_rs['id']; ?>" style="display:none;" src="audioJPN/<?php echo $row_rs['audio']; ?>" controls  preload="auto"></audio>
    <div class="print<?php echo $row_rs['id']; ?>"></div>
    <?php } while ($row_rs = mysql_fetch_assoc($rs)); ?>

<script>
function myFunction() { 
$("#button").hide();
<?php do { ?>
	var vid<?php echo $row_rs2['id']; ?> = document.getElementById("media<?php echo $row_rs2['id']; ?>");
	//alert(vid<?php echo $row_rs2['id']; ?>.duration);
	console.log("00:00.0"+vid<?php echo $row_rs2['id']; ?>.duration);
	$(".print<?php echo $row_rs2['id']; ?>").html("<?php echo $row_rs2['audio']; ?>==00:0"+vid<?php echo $row_rs2['id']; ?>.duration);
    <?php } while ($row_rs2 = mysql_fetch_assoc($rs2)); ?>
}

</script>
<!-- InstanceEndEditable --> </div>
<!-- Include all compiled plugins (below), or include individual files as needed --> 
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>
<!-- InstanceEnd --></html>
<?php
mysql_free_result($rs);

mysql_free_result($rs2);
?>
