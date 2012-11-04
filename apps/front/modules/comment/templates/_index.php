<p class="title" style="border-bottom:1px dotted #E94430;width:100%;padding-bottom:7px;">Та юу хэлмээр байна?</p>

<div id="comments" style="max-height:500px;overflow-y:scroll;border:0;">
  <?php $rss = Doctrine::getTable('Comment')->doFetchArray(array('objectType'=>$objectType, 'objectId'=>$objectId));?>
  <?php foreach ($rss as $rs):?>
    <?php include_partial('comment/box', array('rs'=>$rs));?>
  <?php endforeach;?>
  <a name="comment-last"></a>
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
</script>