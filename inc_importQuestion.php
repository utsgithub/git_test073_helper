
<button type="button" class="btn btn-primary mtm btn-block" data-toggle="modal" data-target="#myModal"> Import </button>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form action="http://localhost/git_test073/index.php/pro/importQestion/" method="post" role="form">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
          <h4 class="modal-title">Import (Question Only)</h4>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <textarea name="arr" rows="10" class="form-control">
              first line
              </textarea>
          </div>
        </div>
        <div class="modal-footer">
          <input type="hidden" value="<?php echo $_GET['pid'] ?>" name="pid" class="form-control"/>
          <input type="hidden" value="<?php echo $_GET['cid'] ?>" name="cid" class="form-control"/>
          <input type="hidden" name="act" value="import" />
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <input type="submit" class="btn btn-primary" />
        </div>
      </form>
    </div>
    <!-- /.modal-content --> 
  </div>
  <!-- /.modal-dialog --> 
</div>
