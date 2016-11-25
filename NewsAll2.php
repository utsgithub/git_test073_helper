<!DOCTYPE html>
<html lang="en" xmlns:spry="http://ns.adobe.com/spry"><!-- InstanceBegin template="/Templates/template.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- InstanceBeginEditable name="doctitle" -->
<title>News Whole</title>
<!-- InstanceEndEditable -->
<!-- inc_head -->
<?php include("inc/inc_head.php"); ?>
<!-- InstanceBeginEditable name="head" -->
<script src="SpryAssets/SpryData.js" type="text/javascript"></script>
<script src="SpryAssets/SpryHTMLDataSet.js" type="text/javascript"></script>
<script type="text/javascript">
var ds1 = new Spry.Data.HTMLDataSet("data_topCate.php?pid=<?php echo $_GET['pid'] ?>", "ds_NewsByTopCategory");
</script>
<!-- InstanceEndEditable -->
</head>
<body>
<!-- inc_nav -->
<?php include("inc/inc_nav.php"); ?>
<div class="container"><!-- InstanceBeginEditable name="EditRegion1" -->

<div spry:region="ds1">
   
        
        <div spry:repeat="ds1">
            <div>{subject}</div>
            <div>{subTitle}</div>
        </div>
    
</div>
<!-- InstanceEndEditable --> </div>
<!-- Include all compiled plugins (below), or include individual files as needed --> 
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>
<!-- InstanceEnd --></html>