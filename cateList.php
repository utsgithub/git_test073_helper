<!DOCTYPE html>
<html lang="en" xmlns:spry="http://ns.adobe.com/spry">
<!-- InstanceBegin template="/Templates/template.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!-- InstanceBeginEditable name="doctitle" -->
    <title>Category List</title>
    <!-- InstanceEndEditable -->
    <!-- inc_head -->
    <?php include("inc/inc_head.php"); ?>
    <!-- InstanceBeginEditable name="head" -->
    <?php
    $colname_Recordset1 = "0";
    if (isset($_GET['pid'])) {
        $colname_Recordset1 = $_GET['pid'];
    }
    ?>
    <script src="SpryAssets/SpryData.js" type="text/javascript"></script>
    <script src="SpryAssets/SpryHTMLDataSet.js" type="text/javascript"></script>
    <!-- InstanceEndEditable -->
</head>
<body>
    <!-- inc_nav -->
    <?php include("inc/inc_nav.php"); ?>
    <div class="container">
        <!-- InstanceBeginEditable name="EditRegion1" -->
        <div class="col-xs-3">
            <?php require_once('inc_leftNav.php'); ?>
        </div>
        <div class="col-xs-9">
            <?php require_once('inc_cateList2.php'); ?>

            <?php // require_once('inc_selectCate.php'); ?>
        </div>
        <!-- InstanceEndEditable -->
    </div>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>
<!-- InstanceEnd -->
</html>

