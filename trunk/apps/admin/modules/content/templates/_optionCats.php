<?php $rss = Doctrine::getTable('Category')->doFetchSelection(array('type'=>$type,'parentId'=>"0"))?>
<?php foreach ($rss as $id=>$name):?>
    <?php $showOptgroup = false;
    $subcats = Doctrine::getTable('Category')->doFetchSelection(array('type'=>$type,'parentId'=>$id));
    foreach ($subcats as $idsub=>$namesub) {
        if(in_array($idsub, $perms)) {
            $showOptgroup = true; break;
        }
    }?>
    
    <?php if($showOptgroup):?>
        <optgroup label="<?php echo $type?> &nbsp;-&nbsp; <?php echo $name?>">
            <?php foreach ($subcats as $idsub=>$namesub):?>
                <?php if(in_array($idsub, $perms)):?>
                    <option value="<?php echo $idsub?>" <?php if($idsub == $categoryId) echo 'selected'?>> 
                        <?php echo str_repeat("&nbsp;", 7)?> <?php echo $namesub?>
                    </option>
                <?php endif?>
            <?php endforeach;?>
        </optgroup>  
    <?php endif?>
<?php endforeach;?>