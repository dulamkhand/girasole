<div class="welcomezone">

<h1><?php echo $page?></h1>

<div style="padding-bottom:10px;">
<div>
  <strong><?php echo htmlspecialchars_decode($page->getSummary())?></strong><br />
  <br />
  <?php if($page->getCover()) echo image_tag('/uploads/page/'.$page->getCover(), array('class'=>'aboutus-img', 'title'=>$page, 'alt'=>$page))?>
  <?php echo htmlspecialchars_decode($page->getContent())?>
  <div class="clear"></div>
</div>

<div class="clear"></div>

<div class="aboutcolumnzone">
  <?php $rss = Doctrine::getTable('Content')
                ->createQuery('a')
                ->select('c.id, c.title, c.icon, c.summary, c.link')
                ->from('Content c')
                ->innerJoin('c.Page p on p.id = c.page_id')
                ->where('p.type = "aboutus"')
                ->andWhere('c.is_active = 1')
                ->orderBy('sort desc, title asc')
                ->fetchArray();
  ?>
  <?php foreach ($rss as $rs):?>
    <div class="aboutcolumn1">
      <div>
        <h3><?php echo $rs['title']?></h3>
        <?php if($rs['icon']) echo image_tag('/uploads/content/'.$rs['icon'], array('class'=>'abouticon', 'alt'=>$rs['title']))?>
        <?php echo htmlspecialchars_decode($rs['summary'])?>
        <?php if($rs['link']):?>
            <div class="readmore"><a href="<?php echo $rs['link']?>">Дэлгэрэнгүй...</a></div>
        <?php endif;?>
      </div>
    </div><!--aboutcolumn1-->    
  <?php endforeach;?>
  <div class="clear"></div>
</div><!--aboutcolumnzone-->

</div><!--style="padding-bottom:10px;"-->

</div><!--welcomezone-->