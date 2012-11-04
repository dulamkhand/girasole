<form action="<?php echo url_for('banner/index')?>" method="GET">
    <?php $positions = myTools::getArray('banner_position');?>
    <b>Position</b>&nbsp;
    <select name="position" id="position" style="width:400px;">
    <?php foreach ($positions as $key=>$value){
        echo '<option value="'.$key.'" '.(($position == $key) ? 'selected' : '').'>'.$value.'</option>';
    }?>
    </select>
    <input type="submit" value="Submit" />
</form>

<br clear="all">

<a href="<?php echo url_for('banner/new')?>"><?php echo image_tag('icons/with-shadows/badge-square-plus-24.png', array())?></a>
<br clear="all">
<br clear="all">

<table width="100%">
  <thead>
    <tr>
      <th>#</th>
      <th>File</th>
      <th>Link</th>
      <th>Pos</th>
      <th>Detail</th>
      <th>Manage</th>
    </tr>
  </thead>
  <tbody>
    <?php $i=0; foreach ($pager->getResults() as $banner): ?>
    <tr style="background:<?php echo $banner->getIsActive() ? '#fff' : '#ccc'?>">
      <td><?php echo $i++?></td>
      <td>
        <?php if($banner->getExt() =='swf'){ ?>
          <object width="200" height="80" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000">
            <param value="<?php echo '/uploads/rek/'.$banner->getPath()?>" name="movie">
            <param value="high" name="quality">
            <param name="wmode" value="transparent">
            <embed width="200" height="80" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" quality="high" src="<?php echo '/uploads/rek/'.$banner->getPath()?>" allowscriptaccess="sameDomain" wmode="transparent" />
          </object>
        <?php } else echo image_tag('/uploads/rek/'.$banner->getPath(), array('style'=>'max-width:200px;max-height:150px;')); ?>
      </td>
      <td>
        <a href="<?php echo $banner->getLink() ? $banner->getLink() : '#'?>" target="<?php echo $banner->getTarget() ? '_blank' : '_parent'?>">
          <?php echo $banner->getLink();?>
        </a>
        <?php if($banner->getTarget()) echo image_tag('icons/active.png', array('align'=>'absmiddle')) ?></td>
      <td width="20%"><?php echo myTools::getValueByKey('banner_position', $banner->getPosition()) ?></td>
      <td nowrap>
        Start date: <?php echo $banner->getStartDate() ?><br/>
        End date: <?php echo $banner->getEndDate() ?><br/>
        Sort: <?php echo $banner->getSort() ?>
      </td>
      <td nowrap>
        <?php if($banner->getIsActive()==1):?>
          <a href="<?php echo url_for('banner/active?id='.$banner->getId().'&status=0') ?>" title="Идэвхгүй болгох" style="text-decoration:none;">
              <?php echo image_tag('icons/with-shadows/badge-square-minus-24.png', array())?>
          </a>
        <?php else:?>
          <a href="<?php echo url_for('banner/active?id='.$banner->getId().'&status=1') ?>" title="Идэвхжүүлэх" style="text-decoration:none;">
              <?php echo image_tag('icons/with-shadows/badge-square-check-24.png', array())?>
          </a>
        <?php endif;?>
        
        <a href="<?php echo url_for('banner/edit?id='.$banner->getId())?>" title="Засварлах" style="text-decoration:none;">
            <?php echo image_tag('icons/with-shadows/page-pencil-24.png', array())?>
        </a>
        <a onclick="return confirm('Are you sure?')" href="<?php echo url_for('banner/delete?id='.$banner->getId())?>" title="Устгах" style="text-decoration:none;">
            <?php echo image_tag('icons/with-shadows/cross-24.png', array())?>
        </a>
      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<br clear="all">
<?php echo pager($pager, 'banner/index')?>