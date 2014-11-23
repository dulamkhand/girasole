<?php $rss = Doctrine::getTable('Category')->doFetchSelection(array('type'=>$type,'parentId'=>'0'))?>
<option value="0" <?php if($catType == $type && $parentId == 0) echo 'selected'?> style="background:#D9EAED;">
    <?php echo strtoupper($type)?>
</option>
<?php foreach ($rss as $id=>$name):?>
    <option value="<?php echo $id?>" <?php if($id == $parentId) echo 'selected'?>> 
        <?php echo str_repeat("&nbsp;", 7)?> <?php echo $name?>
    </option>
<?php endforeach;?>