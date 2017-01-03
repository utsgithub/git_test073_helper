
<table class="table table-bordered table-condensed table-hover">
    <tr>
        <th spry:sort="ID">({ds1::ds_RowCount})</th>
        <th spry:sort="subject" class="none">Question(Subject)</th>
        <th spry:sort="subTitle">Answer(Subtitle)</th>
        <th>Hint</th>
        <th spry:sort="sen">sen</th>
        <th spry:sort="sen_cn">sen_cn</th>
        <th>Action</th>
    </tr>
    <tr spry:repeat="ds1">
        <td>
            <input type="checkbox" name="arr[]" value="{ds1::ID}" />
        </td>
        <td class="none">{subject}</td>
        <?php $linkNewsEdit="newsEdit2.php?id={ds1::ID}&cid={categoryId}&pid=$pid"?>
        <?php $linkNewsDel="newsDel.php?ID={ds1::ID}&cid={categoryId}&pid=$pid"?>
        <td>
            <a target="_blank" href="newsEdit2.php?ID={ds1::ID}">{subTitle}</a>
        </td>
        <td>
            <a target="_blank" href="jpn_search.php?word={hint}&audio={audio}&id={ds1::ID}">{hint}</a>
        </td>
        <td>{sen}</td>
        <td>{sen_cn}</td>
        <td>
            <a href="<?php echo $linkNewsEdit?>">Edit</a>&nbsp;|&nbsp;
            <a href="<?php echo $linkNewsDel?>" onclick="return confirm('Are you sure?');">Del</a>
        </td>
    </tr>
</table>