<script src="SpryAssets/SpryData.js" type="text/javascript"></script>
<script src="SpryAssets/SpryHTMLDataSet.js" type="text/javascript"></script>
<script type="text/javascript">
var dsNewsLeft = new Spry.Data.HTMLDataSet("data_news.php?cid=<?php echo $_GET["cid"]?>", "news");
</script>

<div class="panel panel-default" spry:region="dsNewsLeft"> 
    <!-- Default panel contents -->
    <div class="panel-heading">Left Nav</div>
    <!-- List group -->
    <ul spry:repeatchildren="dsNewsLeft" class="list-group">
        <li class="list-group-item"><a href="?id={ID}&cid={categoryId}">{subject}</a></li>
    </ul>
    <ul class="list-group ">
        <li class="list-group-item"><a href="http://localhost/git_test073/index.php/pro2/newsList/?id=<?php echo $_GET["cid"]?>" target="_blank">Jump</a></li>
    </ul>
</div>
