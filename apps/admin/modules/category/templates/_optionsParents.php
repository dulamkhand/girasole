<?php $catsBW = Doctrine::getTable('Category')->doFetchSelection(array('type'=>'businesswoman','parentId'=>"0"))?>
<?php $catsHW = Doctrine::getTable('Category')->doFetchSelection(array('type'=>'housewife','parentId'=>"0"))?>
<?php $catsD = Doctrine::getTable('Category')->doFetchSelection(array('type'=>'diva','parentId'=>"0"))?>
<?php $catsT = Doctrine::getTable('Category')->doFetchSelection(array('type'=>'teenage','parentId'=>"0"))?>


<option value="0" <?php if($type == 'businesswoman' && $selected_id == 0) echo 'selected'?> style="background:#D9EAED;">BUSINESS WOMAN</option>
<?php foreach ($catsBW as $id=>$name):?>
    <option value="<?php echo $id?>" <?php if($id == $selected_id) echo 'selected'?>> 
        <?php echo str_repeat("&nbsp;", 7)?> <?php echo $name?>
    </option>
<?php endforeach;?>

<option value="0" <?php if($type == 'housewife' && $selected_id == 0) echo 'selected'?> style="background:#D9EAED;">HOUSE WIFE</option>
<?php foreach ($catsHW as $id=>$name):?>
    <option value="<?php echo $id?>" <?php if($id == $selected_id) echo 'selected'?>> 
        <?php echo str_repeat("&nbsp;", 7)?> <?php echo $name?>
    </option>
<?php endforeach;?>

<option value="0" <?php if($type == 'diva' && $selected_id == 0) echo 'selected'?> style="background:#D9EAED;">DIVA</option>
<?php foreach ($catsD as $id=>$name):?>
    <option value="<?php echo $id?>" <?php if($id == $selected_id) echo 'selected'?>> 
        <?php echo str_repeat("&nbsp;", 7)?> <?php echo $name?>
    </option>
<?php endforeach;?>

<option value="0" <?php if($type == 'teenage' && $selected_id == 0) echo 'selected'?> style="background:#D9EAED;">TEENAGE</option>
<?php foreach ($catsT as $id=>$name):?>
    <option value="<?php echo $id?>" <?php if($id == $selected_id) echo 'selected'?>> 
        <?php echo str_repeat("&nbsp;", 7)?> <?php echo $name?>
    </option>
<?php endforeach;?>
