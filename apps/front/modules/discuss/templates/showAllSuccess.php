<?php $rss = Doctrine::getTable('Discuss')->doFetchArray(array('objectType'=>$objectType, 'objectId'=>$objectId));?>
<?php foreach ($rss as $rs):?>
    <?php include_partial('discuss/box', array('rs'=>$rs));?>
<?php endforeach;?>