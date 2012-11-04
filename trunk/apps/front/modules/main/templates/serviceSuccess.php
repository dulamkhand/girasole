<div class="welcomezone">

  <h1><?php echo $page?></h1>
  
  <div style="padding-bottom:10px;">
    <div>
      <strong><?php echo htmlspecialchars_decode($page->getSummary())?></strong>
      <br clear="all"/>
      <br clear="all"/>
      <?php echo htmlspecialchars_decode($page->getContent())?>
    </div>
    
    <div class="clear"></div>
    <div class="clear"></div>

    <div class="servicecolumnzone">
      <?php $rss = Doctrine::getTable('Content')
                    ->createQuery('a')
                    ->select('c.id, c.title, c.icon, c.summary, c.link')
                    ->from('Content c')
                    ->innerJoin('c.Page p on p.id = c.page_id')
                    ->where('p.type = "service"')
                    ->andWhere('c.is_active = 1')
                    ->orderBy('sort desc, title asc')
                    ->fetchArray();
      ?>
      <?php foreach ($rss as $rs):?>
        <div class="servicecolumn1">
          <div>
            <h3><?php echo $rs['title']?></h3>
            <?php if($rs['icon']) echo image_tag('/uploads/content/'.$rs['icon'], array('class'=>'abouticon', 'alt'=>$rs['title']))?>
            <?php echo htmlspecialchars_decode(myTools::utf8_substr($rs['summary'], 0, 130))?>
            <?php if($rs['link']):?>
                <div class="readmore"><a href="<?php echo $rs['link']?>">Дэлгэрэнгүй...</a></div>
            <?php endif;?>
          </div>
        </div><!--servicecolumn1-->    
      <?php endforeach;?>
      <div class="clear"></div>
    </div><!--servicecolumnzone-->

    <div>
      <?php echo htmlspecialchars_decode($page->getConclusion())?>
    </div>
  </div>
</div>