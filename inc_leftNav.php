<script type="text/javascript">
var dsNavLeft = new Spry.Data.HTMLDataSet("data_category.php", "category_news", {sortOnLoad: "sortNum", sortOrderOnLoad: "ascending"});
</script>

<div class="panel panel-default" spry:region="dsNavLeft"> 
    <!-- Default panel contents -->
    <div class="panel-heading">Left Nav</div>
    
    <!-- List group -->
    <ul spry:repeatchildren="dsNavLeft" class="list-group">
        <li class="list-group-item"><a href="cateList.php?pid={ID}">{ID}-{category}</a></li>
    </ul>
</div>
