<?php echo image_tag('hr_gray_double.png', array('style'=>'margin:15px 0 15px 0;'))?>
<div id="discusss-title" class="title-branch green" style="padding:0 0 15px 0;">Таны бодлоор?</div>
<hr style="border:0;border-bottom:1px dotted #cecece;margin:5px 0;clear:both;"/>

<!--form-->
<?php include_partial('discuss/form', array('objectType'=>$objectType, 'objectId'=>$objectId)) ?>

<!--list-->
<div id="discusss">
    <?php 
    $rss = Doctrine::getTable('Discuss')->doFetchArray(array('objectType'=>$objectType, 'objectId'=>$objectId, 'limit'=>sfConfig::get('app_nb_discuss', 30)));?>
    <?php foreach ($rss as $rs):?>
        <?php include_partial('discuss/box', array('rs'=>$rs));?>
    <?php endforeach;?>
</div>

<!--more button-->
<?php $total = Doctrine::getTable('Discuss')->doCount(array('objectType'=>$objectType, 'objectId'=>$objectId));
if($total > sfConfig::get('app_nb_discuss', 30)):?>
  <a style="width:600px;" href="javascript:showAllDiscusss();" class="buttonLoadmore" id="link-showall">Бүх сэтгэгдэл</a>
<?php endif?>



<script type="text/javascript">
function deleteDiscuss(id)
{
  $.ajax({
    url: "<?php echo url_for('discuss/delete')?>", 
    data: {discussId : id},
    success: function(data){
      var discussDiv = '#discuss'+id;
      $(discussDiv).hide();
    }
  });
}


function showAllDiscusss()
{
  $.ajax({
    url: "<?php echo url_for('discuss/showAll')?>", 
    data: {objectType : "<?php echo $objectType?>", objectId: "<?php echo $objectId?>"},
    success: function(data){
        $('#link-showall').hide();
        $('#discusss').html(data);
    }
  });

}
</script>