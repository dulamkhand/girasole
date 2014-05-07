<form action="<?php echo url_for('banner/index')?>" method="GET">
    <?php $positions = myTools::getArray('bannerPosition');?>
    <b>Position</b>&nbsp;
    <select name="position" id="position" style="width:250px;">
    <?php foreach ($positions as $key=>$value){
        echo '<option value="'.$key.'" '.(($position == $key) ? 'selected' : '').'>'.$value.'</option>';
    }?>
    </select> &nbsp; 
    <?php include_partial('global/search', array());?>
</form>

<br clear="all">
<br clear="all">
<table width="100%">
  <thead>
    <tr>
      <th>#</th>
      <th>File</th>
      <th>Link</th>
      <th>Position</th>
      <th>Detail</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    <?php $i=0; foreach ($pager->getResults() as $rs): ?>
    <tr style="background:<?php echo $rs->getIsActive() ? '#fff' : '#dedede'?>">
      <td><?php echo ++$i?></td>
      <td>
        <?php if($rs->getExt() =='swf'){ ?>
          <object width="200" height="80" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000">
            <param value="<?php echo '/uploads/rek/'.$rs->getPath()?>" name="movie">
            <param value="high" name="quality">
            <param name="wmode" value="transparent">
            <embed width="200" height="80" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" quality="high" src="<?php echo '/uploads/rek/'.$rs->getPath()?>" allowscriptaccess="sameDomain" wmode="transparent" />
          </object>
        <?php } else echo image_tag('/uploads/rek/'.$rs->getPath(), array('style'=>'max-width:200px;max-height:150px;')); ?>
      </td>
      <td>
        <a href="<?php echo $rs->getLink() ? $rs->getLink() : '#'?>" target="<?php echo $rs->getTarget() ? '_blank' : '_parent'?>">
          <?php echo $rs->getLink();?>
        </a>
        <?php if($rs->getTarget()) echo image_tag('icons/active.png', array('align'=>'absmiddle')) ?></td>
      <td width="20%"><?php echo myTools::getValueByKey('bannerPosition', $rs->getPosition()) ?></td>
      <td nowrap>
        Start date: <?php echo $rs->getStartDate() ?><br/>
        End date: <?php echo $rs->getEndDate() ?><br/>
        Is active: <?php if($rs->getIsActive()) echo image_tag('icons/valid.png', array('align'=>'absmiddle')) ?><br>
        Sort: <?php echo $rs->getSort() ?>
      </td>
      <td nowrap width="20%">
          <?php include_partial('global/activate', array('module'=>'banner', 'rs'=>$rs));?>
          <?php include_partial('global/actions', array('module'=>'banner', 'id'=>$rs->getId()));?>
      </td>
    </tr>
    <?php endforeach; ?>
    <tr><td colspan="10"><?php echo pager($pager, 'banner/index?position='.$sf_params->get('position'))?></td></tr>
  </tbody>
</table>
