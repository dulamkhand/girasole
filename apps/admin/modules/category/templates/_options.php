<?php $catsBW = Doctrine::getTable('Category')->doFetchSelection(array('type'=>'businesswoman','parentId'=>"0"))?>
<?php $catsHW = Doctrine::getTable('Category')->doFetchSelection(array('type'=>'housewife','parentId'=>"0"))?>
<?php $catsD = Doctrine::getTable('Category')->doFetchSelection(array('type'=>'diva','parentId'=>"0"))?>
<?php $catsT = Doctrine::getTable('Category')->doFetchSelection(array('type'=>'teenage','parentId'=>"0"))?>

<?php foreach ($catsBW as $id=>$name):?>
    <optgroup label="BUSINESS WOMAN &nbsp;-&nbsp; <?php echo strtoupper($name)?>">
        <?php $subcats = Doctrine::getTable('Category')->doFetchSelection(array('type'=>'businesswoman','parentId'=>$id))?>
        <?php foreach ($subcats as $idsub=>$namesub):?>
            <option value="<?php echo $idsub?>" <?php if($idsub == $selected_id) echo 'selected'?>> 
                <?php echo str_repeat("&nbsp;", 7)?> <?php echo $namesub?>
            </option>
        <?php endforeach;?>
    </optgroup>  
<?php endforeach;?>

<?php foreach ($catsHW as $id=>$name):?>
    <optgroup label="HOUSE WIFE &nbsp;-&nbsp; <?php echo strtoupper($name)?>">
        <?php $subcats = Doctrine::getTable('Category')->doFetchSelection(array('type'=>'housewife','parentId'=>$id))?>
        <?php foreach ($subcats as $idsub=>$namesub):?>
            <option value="<?php echo $idsub?>" <?php if($idsub == $selected_id) echo 'selected'?>> 
                <?php echo str_repeat("&nbsp;", 7)?> <?php echo $namesub?>
            </option>
        <?php endforeach;?>
    </optgroup>  
<?php endforeach;?>

<?php foreach ($catsD as $id=>$name):?>
    <optgroup label="DIVA &nbsp;-&nbsp; <?php echo strtoupper($name)?>">
        <?php $subcats = Doctrine::getTable('Category')->doFetchSelection(array('type'=>'diva','parentId'=>$id))?>
        <?php foreach ($subcats as $idsub=>$namesub):?>
            <option value="<?php echo $idsub?>" <?php if($idsub == $selected_id) echo 'selected'?>> 
                <?php echo str_repeat("&nbsp;", 7)?> <?php echo $namesub?>
            </option>
        <?php endforeach;?>
    </optgroup>  
<?php endforeach;?>

<?php foreach ($catsT as $id=>$name):?>
    <optgroup label="TEENAGE &nbsp;-&nbsp; <?php echo strtoupper($name)?>">
        <?php $subcats = Doctrine::getTable('Category')->doFetchSelection(array('type'=>'teenage','parentId'=>$id))?>
        <?php foreach ($subcats as $idsub=>$namesub):?>
            <option value="<?php echo $idsub?>" <?php if($idsub == $selected_id) echo 'selected'?>> 
                <?php echo str_repeat("&nbsp;", 7)?> <?php echo $namesub?>
            </option>
        <?php endforeach;?>
    </optgroup>  
<?php endforeach;?>