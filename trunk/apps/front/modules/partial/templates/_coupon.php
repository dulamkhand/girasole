<?php if($rs):?>
<div style="width:480px;padding:10px;position:relative;margin:15px auto 0 auto;">
		<?php echo image_tag('icons/cut.png', array('style'=>'position:absolute;left:10px;top:-5px;z-index:1;'));?>
		<?php if(isset($code) && $code) 
				echo '<span style="position:absolute;right:20px;top:15px;z-index:1;" class="title font30">'.$code.'</span>';
		else 
				echo link_to(image_tag('icons/print32a.png', array('width'=>25)), 'partial/couponPrint?route='.$rs['route'], array('style'=>'position:absolute;right:15px;top:-3px;z-index:1;', 'target'=>'_blank'));
		?>
    <?php if($rs['file']) {
        echo image_tag('/uploads/coupon/480t-'.$rs['file'], array());
    } else {?>
        <div style="padding:10px;border:1px dashed #ccc;">
          <table cellpadding="0" cellpadding="0">
              <tr>
                  <td width="370" height="140" valign="middle" style="text-align:center;border:0;vertical-align:middle;">
                      <h2 class="title" style="color:darkgreen;font-weight:bold;text-align:center;margin:0;padding:0 0 10px 0;">
                          <?php echo $rs['title']?>
                      </h2>
                      <hr class="gradient"/>
                      <?php echo $rs['body']?>
                  </td>
                  <td width="150" height="140" valign="middle" align="center" style="border:0;vertical-align:middle;">
                      <?php $img = $rs['image'] ? '/uploads/coupon/150t-'.$rs['image'] : 'logo.header.png';
                      echo image_tag($img, array('style'=>'width:150px;'));?>
                  </td>
              </tr>
          </table>
        </div>
    <?php }?>
</div>
<?php endif?>