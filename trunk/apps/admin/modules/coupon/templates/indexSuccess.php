<?php $host = sfConfig::get('app_host')?>
<form action="<?php echo url_for('coupon/index')?>" method="GET">
    <?php include_partial('global/search', array());?>
</form>

<br clear="all">
<br clear="all">
<table width="40%" cellpadding="0" cellspacing="0">
  <thead>
    <tr>
      <th>#</th>
      <th>Type</th>
      <th>Coupon</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    <?php $i = 0;?>
    <?php foreach ($pager->getResults() as $rs): ?>
    <tr <?php if($i%2 != 0) echo 'class="odd"'?>>
      <td><?php echo ++$i?></td>
      <td><?php echo $rs->getType()?></td>
      <td>
        <div style="width:480px;padding:10px;position:relative;">
	      		<?php echo image_tag('icons/cut.png', array('style'=>'position:absolute;left:10px;top:-5px;'));?>
	          <?php if($rs->getFile()) {
	              echo image_tag('/uploads/coupon/480t-'.$rs->getFile(), array());
	          } else {?>
                <div style="padding:10px;border:1px dashed #ccc;">
                  <table cellpadding="0" cellpadding="0">
                      <tr>
                          <td width="370" height="140" valign="middle" style="text-align:center;border:0;">
                              <h2 class="title" style="color:darkgreen;font-weight:bold; border-bottom:0px solid green;margin:0;padding:0 0 10px 0;">
                                  <?php echo $rs->getTitle()?>
                              </h2>
                              <hr class="gradient"/>
                              <?php echo $rs->getBody()?>
                          </td>
                          <td width="150" height="140" valign="middle" align="center" style="border:0;">
                              <?php $img = $rs->getImage() ? '/uploads/coupon/150t-'.$rs->getImage() : 'logo.header.png';
                              echo image_tag($img, array('style'=>'width:150px;'));?>
                          </td>
                      </tr>
                  </table>
                </div>
	          <?php }?>
        </div>
      </td>
      <td nowrap>
          <?php include_partial('global/actions', array('module'=>'coupon', 'id'=>$rs->getId()));?>
      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<?php echo pager($pager, 'coupon/index?keyword='.$sf_params->get('keyword'))?>