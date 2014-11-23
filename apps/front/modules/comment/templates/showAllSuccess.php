<?php $rss = Doctrine::getTable('Comment')->doFetchArray(array('objectType'=>$objectType, 'objectId'=>$objectId));?>
<?php foreach ($rss as $rs):?>
    <?php include_partial('comment/box', array('rs'=>$rs));?>
<?php endforeach;?>