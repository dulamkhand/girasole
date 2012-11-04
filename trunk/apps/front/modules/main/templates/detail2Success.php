<div class="sideleft">
  <table width="100%">
    <tr>
      <td class="align-center" width="45%" valign="top" style="padding:0;padding-right:10px;">
        <p><a class="category" href="<?php echo url_for('main/list?listtype=list1&categoryId='.$rs['category_id'])?>"><?php echo $rs['category_name']?></a></p>
        <p class="title"><?php echo $rs['title']?></p>
        <p class="timestamp" style="margin-top:5px;"><?php echo $rs['created_at']?></p>
      </td>
      <td style="border:0;border-left:1px dotted #E94430;"></td>
      <td width="55%" valign="top" style="padding:0;padding-left:20px;">
        <p class="align-justify"><?php echo htmlspecialchars_decode($rs['intro'])?></p>
      </td>
    </tr>
  </table>
  
  <div style="border:0;border-top:2px dotted #ccc;margin:15px 0;"></div>
  
  <!--gallery-->
  <?php include_partial('image/movingbox', array('objectType'=>'content', 'objectId'=>$rs['id']));?>
  <?php //include_partial('image/galleriffic', array('objectType'=>'content', 'objectId'=>$rs['']getId()));?>
  <?php //include_partial('image/thumbs_m', array('objectType'=>'content', 'objectId'=>$rs['']getId()));?>

  <div style="border:0;border-top:2px dotted #ccc;margin:7px 0;"></div>

  <p class="align-justify"><?php echo htmlspecialchars_decode($rs['body'])?></p>
  
  <br clear="all">

  <div style="border:0;border-top:2px dotted #ccc;margin:7px 0;"></div>
  <?php include_partial('partial/share', array('id'=>$rs['id']));?>
  <p class="right source"><?php if($rs['source']) echo link_to($rs['source'], $rs['source'], array('target'=>'new', 'class'=>'source'))?></p>
  <br clear="all">
  <div style="border:0;border-top:2px dotted #ccc;margin:7px 0;"></div>

</div><!--sideleft-->

<div class="sideright">
  <?php include_partial('comment/index', array('objectType'=>'content', 'objectId'=>$rs['id']));?>
</div><!--sideright-->

<br clear="all">
<br clear="all">