<form action="http://localhost/git_test073/index.php/pro/copy" method="post" class="form-inline mtl" role="form">
  <div class="form-group">
    <div  spry:region="dsCateList2">
      <div spry:repeat="dsCateList2">
        <div class="checkbox">
          <label>
            <input type="checkbox" name="arr[]" value="{ID}">
            {category}</label>
        </div>
      </div>
    </div>
  </div>
  <div class="form-group" spry:region="dsNavLeft">
    <select spry:repeatchildren="dsNavLeft" class="form-control" name="pid">
      <option spry:if="'{ID}'=='<?php echo $_GET['pid'] ?>'" value="{dsNavLeft::ID}" selected>{dsNavLeft::category}</option>
      <option spry:if="'{ID}'!='<?php echo $_GET['pid'] ?>'" value="{dsNavLeft::ID}">{dsNavLeft::category}</option>
    </select>
  </div>
  <button type="submit" class="btn btn-default">Submit</button>
  <input type="hidden" name="id" value="<?php echo $_GET['pid']; ?>"/>
  <input type="hidden" name="act" value="copy"/>
</form>
