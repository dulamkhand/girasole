<div class="sideleft">

  <div style="padding:0px;">
    <table width="100%">
      <tr>
        <td class="align-left" width="20%" valign="top">
          <a href="#" class="left"><p class="category">&laquo; &nbsp; Өмнөх</p></a>
          <br clear="all">
          <a href="#"><p>"The Best of the Front Row:What Stars Were Sp…"</p></a>
        </td>
        <td width="5%">&nbsp;</td>
        <td class="align-center" width="50%" valign="top">
          <p><a class="category" href="<?php echo url_for('main/list?listtype=list1&categoryId='.$rs['category_id'])?>"><?php echo $rs['category_name']?></a></p>
          <p class="title"><?php echo $rs['title']?></p>
          <p class="timestamp" style="margin-top:5px;"><?php echo $rs['created_at']?></p>
        </td>
        <td width="5%">&nbsp;</td>
        <td class="align-center" width="20%" valign="top">
          <a href="#" class="right"><p class="category">Дараах &nbsp; &raquo;</p></a>
          <br clear="all">
          <a href="#"><p>"For Their Consideration: The Most Oscar-worth…"</p></a>
        </td>
      </tr>
    </table>
  </div>
  
  <div style="border:0;border-top:2px dotted #ccc;margin:15px 0;"></div>
  
  <p class="align-justify"><?php echo htmlspecialchars_decode($rs['intro'])?></p>
  
  <?php //include_partial('image/galleriffic', array('objectType'=>'content', 'objectId'=>$rs['']getId()));?>
  <?php include_partial('image/movingbox', array('objectType'=>'content', 'objectId'=>$rs['id']));?>
  
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