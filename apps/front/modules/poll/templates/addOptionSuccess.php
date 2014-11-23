<?php if(isset($o) && $o):?>
    <?php $id = $o->getId()?>
    <span id="pollVote<?php echo $id ?>" class="nbvote border-radius-12" title="<?php echo $o->getNbVote() ?>">
       <?php echo $o->getNbVote() >= 20 ? '20+' : $o->getNbVote() ?>
    </span>
    <label class="choice">
        <input type="checkbox" id="pollOption<?php echo $id ?>" value="<?php echo $id ?>" class="left pollCheckbox" 
                onclick="submitPollForm(<?php echo $id ?>);" <?php if(!$poll->getMultipleChoice()) echo 'disabled'?>/>
        <?php echo striptags($o->getBody()) ?>
    </label>
<?php endif;?>