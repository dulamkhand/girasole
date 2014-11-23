<?php $rss = Doctrine::getTable('Category')->doFetchSelection(array('type'=>$type,'parentId'=>'0'))?>
<?php foreach ($rss as $id=>$name):?>
    <?php $subcats = Doctrine::getTable('Category')->doFetchSelection(array('type'=>$type,'parentId'=>$id))?>
    <?php foreach ($subcats as $k=>$v):?>
        <label>
            <input type="checkbox" class="checkbox" value="<?php echo $k?>" name="cat_permissions[]" <?php if(in_array($k, $checkedArray)) echo 'checked'?>/>
            <?php echo $type?> &nbsp;-&nbsp; <?php echo $name?> &nbsp;-&nbsp; <?php echo $v?>
        </label>
        <br clear="all">
    <?php endforeach;?>
<?php endforeach;?>