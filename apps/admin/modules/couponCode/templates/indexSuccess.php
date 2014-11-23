<?php $host = sfConfig::get('app_host')?>
<form action="<?php echo url_for('couponCode/index')?>" method="GET">
		Is used: 
		<select name="isUsed" id="isUsed" style="width:60px;">
				<option></option>
				<option value="0" <?php if('0' == $sf_params->get('isUsed')) echo 'selected'?>>No</option>
				<option value="1" <?php if('1' == $sf_params->get('isUsed')) echo 'selected'?>>Yes</option>
		</select> &nbsp;
		Type: 
		<?php $rss = Doctrine::getTable('CouponCode')->createQuery("*")->select('type')->groupBy('type')->fetchArray()?>
		<select name="type" id="type" style="width:200px;">
				<option></option>
				<?php foreach ($rss as $k=>$v):?>
						<option value="<?php echo $v['type']?>" <?php if($v['type'] == $sf_params->get('type')) echo 'selected'?>><?php echo $v['type']?></option>
				<?php endforeach?>
		</select>
		
    <?php include_partial('global/search', array());?>
</form>

<br clear="all">
<br clear="all">
<table width="40%" cellpadding="0" cellspacing="0">
  <thead>
    <tr>
      <th>#</th>
      <th>Type</th>
      <th>Code</th>
      <th>Is used</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    <?php $i = 0;?>
    <?php foreach ($pager->getResults() as $rs): ?>
    <tr <?php if($i%2 != 0) echo 'class="odd"'?> <?php if($rs->getIsUsed()) echo 'style="background:#dedede;"'?>>
      <td><?php echo ++$i?></td>
      <td><?php echo $rs->getType()?></td>
      <td><?php echo $rs->getCode()?></td>
      <td><?php echo $rs->getIsUsed()?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<?php echo pager($pager, 'couponCode/index?keyword='.$sf_params->get('keyword'))?>