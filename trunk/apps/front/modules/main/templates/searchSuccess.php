<!-- contents -->
<?php include_partial('partial/rek', array('position'=>'search', 'width'=>1000, 'limit'=>1));?>

<?php include_partial('partial/search', array('width'=>400));?>
<br clear="all">

<?php foreach ($pager->getResults() as $content):?>
    <div class="left" style="padding:0;margin:0 10px 10px 0;height:300px;width:240px;overflow:hidden;">
        <?php echo link_to(image_tag($content->getCover(), array('style'=>'max-width:234px;max-height:210px;border:3px solid green;','class'=>'')), 'content/leaf1?type='.$content->getType().'&route='.$content->getRoute(), array());?>
        <br clear="all">
        <?php echo link_to($content->getCategoryName(), 'content/branch2?type='.$content->getType().'&last=1&catId='.$content->getCategoryId(), array('class'=>'category', 'style'=>''));?>
        <span class="timestamp right"><?php echo time_ago($content->getCreatedAt())?></span>
        <br clear="all">
        <?php echo link_to($content->getTitle(), 'content/leaf1?type='.$content->getType().'&route='.$content->getRoute(), array('class'=>'title','style'=>'margin:0 0 5px 0;display:block;', 'title'=>$content->getTitle()));?>
        <br clear="all">
    </div>
<?php endforeach;?>    

<br clear="all">
<?php echo pager($pager, 'main/search?keyword='.$sf_params->get('keyword'))?>
<br clear="all">
