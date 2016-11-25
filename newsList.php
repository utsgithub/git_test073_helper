<!DOCTYPE html>
<html lang="en">
<!-- InstanceBegin template="/Templates/template.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- InstanceBeginEditable name="doctitle" -->
<title>News List</title>
<!-- InstanceEndEditable -->
<!-- inc_head -->
<?php include("inc/inc_head.php"); ?>
<!-- InstanceBeginEditable name="head" -->
<script src="SpryAssets/SpryData.js" type="text/javascript"></script>
<script src="SpryAssets/SpryHTMLDataSet.js" type="text/javascript"></script>
<script type="text/javascript">
var ds1 = new Spry.Data.HTMLDataSet("data_news.php?cid=<?php echo $_GET['cid']; ?>", "news");
</script>
<!-- InstanceEndEditable -->
</head>
<body>
<!-- inc_nav -->
<?php include("inc/inc_nav.php"); ?>
<div class="container"><!-- InstanceBeginEditable name="EditRegion1" -->
  <?php 
$pid=$_GET['pid'];
$cid=$_GET['cid'];
?>
  <div class="col-xs-3">
    <?php require_once('inc_leftNav.php'); ?>
  </div>
  <div  class="col-xs-9">
    <div>
      <form action="http://localhost/git_test073/index.php/pro/moveNews" method="post" role="form">
        <div spry:region="ds1">
          <table class="table table-bordered table-condensed table-hover">
            <tr>
              <th spry:sort="ID">({ds1::ds_RowCount})</th>
              <th spry:sort="subject">Question(Subject)</th>
              <th spry:sort="subTitle">Answer(Subtitle)</th>
              <th>Action</th>
            </tr>
            <tr spry:repeat="ds1">
              <td><input type="checkbox" name="arr[]" value="{ds1::ID}"/></td>
              <td>{subject}</td>
              <?php $linkNewsEdit="newsEdit.php?id={ds1::ID}&cid={categoryId}&pid=$pid"?>
              <td><a target="_blank" href="<?php $linkNewsEdit ?>">{subTitle}</a></td>
              <td><a href="<?php echo $linkNewsEdit?>">Edit</a>&nbsp;|&nbsp;<a href="http://localhost/git_test073/index.php/pro/news_sql?id={ID}&act=del&cid=<?php echo $_GET['cid'] ?>&pid=<?php echo $_GET['pid'] ?>" onclick="return confirm('是否确定');" >Del</a></td>
            </tr>
          </table>
        </div>
        <div class="form-inline mbl"> 
          <script type="text/javascript">
				var dsCateByPID = new Spry.Data.HTMLDataSet("data_category.php?pid=<?php echo $_GET['pid']; ?>", "category_news");
			</script>
          <div class="form-group" spry:region="dsCateByPID">
            <select spry:repeatchildren="dsCateByPID" class="form-control" name="moveCID">
              <option spry:if="'{dsCateByPID::ID}'=='<?php echo $_GET['cid'] ?>'" value="{dsCateByPID::ID}" selected>{dsCateByPID::category}</option>
              <option spry:if="'{dsCateByPID::ID}'!='<?php echo $_GET['cid'] ?>'" value="{dsCateByPID::ID}">{dsCateByPID::category}</option>
            </select>
          </div>
          <input type="hidden" name="pid" value="<?= $_GET['pid']?>"/>
          <input type="hidden" name="cid" value="<?= $_GET['cid']?>"/>
          <input type="hidden" name="act" value="moveNews"/>
          <input type="submit" value="Move" class="btn btn-default"/>
        </div>
        <ul class="list-inline">
          <li> <a href="http://localhost/git_test073/index.php/printpage/output?page=category" target="_blank" class="btn btn-warning">Print</a></li>
          <li><a href="http://localhost/output/test/test_practice.html?id=<?php echo $_GET['cid']?>" target="_blank" class="btn btn-info">Test</a></li>
          <li><a href="http://localhost/git_test073/index.php/pro2/cate_sql/?id=<?php echo $pid ?>&act=list" target="_blank" class="btn btn-warning">Git Test</a></li>
          <li><a class="btn btn-danger" href="http://localhost/git_test073/index.php/pro/news_sql?id={ds1::ID}&act=delNewsByCate&cid=<?php echo $_GET['cid'] ?>&pid=<?php echo $_GET['pid'] ?>" onClick="return confirm('Delete?')">Delete All</a></li>
          <li><a class="btn btn-default" href="cateList.php?pid=<?php echo $pid?>">Back</a></li>
        </ul>
      </form>
      <form method="post" action="form_newsInsert.php?cid=<?php echo $_GET['cid']?>&pid=<?php echo $_GET['pid']?>" name="formNewsInsert">
        <table class="table table-condensed">
          <tr>
            <td></td>
            <td><input class="form-control" type="text" name="subject"/></td>
            <td><input class="form-control" type="text" name="subTitle"/></td>
            <td><input type="submit" value="Insert" class="btn btn-default"/>
              <input type="hidden" name="categoryId" value="<?php echo $_GET['cid']?>"/>
              <input type="hidden" name="pid" value="<?php echo $_GET['pid']?>"/>
              <input type="hidden" name="MM_insert" value="formNewsInsert"/></td>
          </tr>
        </table>
      </form>
    </div>
    <?php require_once('inc_importQuestion.php'); ?>
    <?php require_once('inc_cateList2.php'); ?>
  </div>
  <!-- InstanceEndEditable --> </div>
<!-- Include all compiled plugins (below), or include individual files as needed --> 
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>
<!-- InstanceEnd -->
</html>