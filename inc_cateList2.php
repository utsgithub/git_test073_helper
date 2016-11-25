<script type="text/javascript">
	var dsCateList2 = new Spry.Data.HTMLDataSet("data_category.php?pid=<?php echo $pid; ?>", "category_news");
</script>
<form action="http://localhost/git_test073/index.php/pro/copy" method="post" class="form-inline mtl" role="form">
  <div spry:region="dsCateList2">
    <table class="table table-bordered table-condensed table-hover">
      <tr>
        <th></th>
        <th spry:sort="ID">ID</th>
        <th spry:sort="sortNum">Sort</th>
        <th spry:sort="category">Category</th>
        <th>Action</th>
      </tr>
      <tr spry:repeat="dsCateList2">
        <td><input type="checkbox" name="arr[]" value="{ID}"></td>
        <td>{ID}&nbsp;<span class="glyphicon  glyphicon-hand-left bg-primary badge" spry:if="'{ID}' == '<?php echo $cid?>'">&nbsp;</span></td>
        <td>{sortNum}</td>
        <td><ul class="list-inline mbn">
            <li spry:if="'{parentId}'!='0'"><a href="newsList.php?cid={ID}&pid={parentId}">{category}</a></li>
            <li spry:if="'{parentId}'=='0'"><a href="?pid={ID}">{category}</a></li>
          </ul></td>
        <td><ul class="list-inline mbn">
            <li spry:if="'{parentId}'=='0'"><a href="NewsAll.php?pid={ID}" target="_blank">List all News</a></li>
            <li spry:if="'{parentId}'=='0'"><a href="Newscateanswer.php?pid={ID}&title={category}" target="_blank">List all Answer</a></li>
            <li><a href="http://localhost/git_test073/index.php/pro2/cate_sql?id={ID}&act=edit" target="_blank">Edit</a></li>
            <li><a onclick="return confirm('是否确定');" target="_blank" href="http://localhost/git_test073/index.php/pro2/cate_sql?id={ID}&act=del&pid={parentId}">Delete</a></li>
          </ul></td>
      </tr>
    </table>
  </div>
  <a href="http://localhost/git_test073/index.php/pro2/sort?id=<?php echo $_GET['pid'] ?>" target="_blank" class="btn-primary btn">Sort</a>
  <div class="form-group" spry:region="dsNavLeft">
    <select spry:repeatchildren="dsNavLeft" class="form-control" name="pid">
      <option spry:if="'{ID}'=='<?php echo $pid ?>'" value="{dsNavLeft::ID}" selected>{dsNavLeft::category}</option>
      <option spry:if="'{ID}'!='<?php echo $pid ?>'" value="{dsNavLeft::ID}">{dsNavLeft::category}</option>
    </select>
  </div>
  <button type="submit" class="btn btn-default">Submit</button>
  <input type="hidden" name="id" value="<?php echo $_GET['pid']; ?>"/>
  <input type="hidden" name="act" value="copy"/>
  <a class="btn btn-success" href="cateInsert.php?pid=<?php echo $pid; ?>">Add New</a>
</form>
