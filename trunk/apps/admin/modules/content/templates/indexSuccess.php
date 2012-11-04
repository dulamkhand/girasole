<form action="<?php echo url_for('content/index')?>" method="GET">
    <b>Keyword</b>&nbsp; <input type="text" value="<?php echo $sf_params->get('keyword')?>" name="keyword" id="keyword" size="40" style="padding:6px;"/>
    <input type="submit" value="Submit" />
</form>

<br clear="all">

<a href="<?php echo url_for('content/new')?>"><?php echo image_tag('icons/with-shadows/badge-square-plus-24.png', array())?></a>
<br clear="all">
<br clear="all">
<table width="100%">
  <thead>
    <tr>
      <th>#</th>
      <th>Content</th>
      <th>Intro</th>
      <th>Category</th>      
      <th>Additional</th>
      <th>Manage</th>
    </tr>
  </thead>
  <tbody>
    <?php $i=0; foreach ($pager->getResults() as $content): ?>
    <tr style="<?php if($content->getIsFeatured()) echo 'background-color:#ffffaa;'?>">
      <td><?php echo ++$i?></td>
      <td><b><?php echo $content ?></b><br>
          <?php echo image_tag('/uploads/'.$content->getCover(), array('style'=>'max-width:200px;'))?>
      </td>
      <td><?php echo myTools::utf8_substr(strip_tags($content->getIntro()), 0, 150).' ...' ?></td>
      <td><?php echo $content->getCategoryName() ?></td>
      <td nowrap>
        <b>Sort:</b> <?php echo $content->getSort() ?><br>
        <b>Nb of views:</b> <?php //echo $content->getNbViews() ?><br>
        <b>Created at:</b> <?php echo $content->getCreatedAt() ?>
      </td>
      <td nowrap>
        <a href="<?php echo url_for('image/index?objectId='.$content->getId().'&objectType=content') ?>">Зураг үзэх</a><br>
        <a href="<?php echo url_for('image/new?objectId='.$content->getId().'&objectType=content') ?>">Зураг нэмэх</a>
        <?php if($content->getIsFeatured()==1):?>
          <a href="<?php echo url_for('content/featured?id='.$content->getId().'&status=0') ?>" title="Онцлох биш болгох" style="text-decoration:none;">
              <?php echo image_tag('icons/with-shadows/badge-circle-minus-24.png', array())?>
          </a>
        <?php else:?>
          <a href="<?php echo url_for('content/featured?id='.$content->getId().'&status=1') ?>" title="Онцлох болгох" style="text-decoration:none;">
              <?php echo image_tag('icons/with-shadows/badge-circle-direction-up-24.png', array())?>
          </a>
        <?php endif;?>

        <?php if($content->getIsActive()==1):?>
          <a href="<?php echo url_for('content/active?id='.$content->getId().'&status=0') ?>" title="Идэвхгүй болгох" style="text-decoration:none;">
              <?php echo image_tag('icons/with-shadows/badge-square-minus-24.png', array())?>
          </a>
        <?php else:?>
          <a href="<?php echo url_for('content/active?id='.$content->getId().'&status=1') ?>" title="Идэвхжүүлэх" style="text-decoration:none;">
              <?php echo image_tag('icons/with-shadows/badge-square-check-24.png', array())?>
          </a>
        <?php endif;?>
        
        <a href="<?php echo url_for('content/edit?id='.$content->getId())?>" title="Засварлах" style="text-decoration:none;">
            <?php echo image_tag('icons/with-shadows/page-pencil-24.png', array())?>
        </a>
        <a onclick="return confirm('Are you sure?')" href="<?php echo url_for('content/delete?id='.$content->getId())?>" title="Устгах" style="text-decoration:none;">
            <?php echo image_tag('icons/with-shadows/cross-24.png', array())?>
        </a>
      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<br clear="all">
<?php echo pager($pager, 'content/index')?>