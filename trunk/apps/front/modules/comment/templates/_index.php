<div id="comments-title" class="title-branch green" style="padding:0 0 15px 0;">Таны бодлоор?</div>
<hr style="border:0;border-bottom:1px dotted #cecece;margin:5px 0;clear:both;"/>

<?php 
$total = Doctrine::getTable('Comment')->doCount(array('objectType'=>$objectType, 'objectId'=>$objectId));
$limit = sfConfig::get('app_nb_comment');
if($total > $limit):?>
    <a style="width:325px;margin:0 0 10px;" href="javascript:showAllComments();" class="buttonLoadmore" id="link-showall">Өмнөх сэтгэгдлүүд</a>
<?php endif?>

<div id="comments">
    <?php $rss = Doctrine::getTable('Comment')->doFetchArray(array('objectType'=>$objectType, 'objectId'=>$objectId, 
                      'offset'=>(intval($total - $limit) > 0 ? intval($total - $limit) : 0), 'limit'=>$limit));?>
    <?php foreach ($rss as $rs):?>
        <?php include_partial('comment/box', array('rs'=>$rs));?>
    <?php endforeach;?>
</div>

<?php include_partial('comment/form', array('objectType'=>$objectType, 'objectId'=>$objectId)) ?>



<script type="text/javascript">
function deleteComment(id)
{
  $.ajax({
    url: "<?php echo url_for('comment/delete')?>", 
    data: {commentId : id},
    success: function(data){
      var commentDiv = '#comment'+id;
      $(commentDiv).hide();
    }
  });
}


function showAllComments()
{
  $.ajax({
    url: "<?php echo url_for('comment/showAll')?>", 
    data: {objectType : "<?php echo $objectType?>", objectId: "<?php echo $objectId?>"},
    success: function(data){
        $('#link-showall').hide();
        $('#comments').html(data);
    }
  });
  
  // TODO: add scroll ?
  // hide back ?
}
</script>