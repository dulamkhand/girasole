<div class="welcomezone">
  <h1><?php echo $page?></h1>
  <div style="padding-bottom:10px;">
    
    <div class="ourprojectrow">
      <strong><?php echo htmlspecialchars_decode($page->getSummary())?></strong>
      <br clear="all">
      <br clear="all">
    </div>
  
    <?php $rss = Doctrine::getTable('Content')
                  ->createQuery('a')
                  ->select('c.id, c.title, c.icon, c.summary, c.link')
                  ->from('Content c')
                  ->innerJoin('c.Page p on p.id = c.page_id')
                  ->where('p.type = "news"')
                  ->andWhere('c.is_active = 1')
                  ->orderBy('sort desc, title asc')
                  ->fetchArray();
    ?>
    <?php foreach ($rss as $rs):?>
      <div class="ourprojectrow">
        <h4><?php echo $rs['title']?></h4>
        <div> 
          <?php if($rs['icon']) echo image_tag('/uploads/content/'.$rs['icon'], array('class'=>'project-img', 'alt'=>$rs['title'], 'style'=>'max-width:210px;max-height:170px;'))?>
          <?php echo htmlspecialchars_decode(myTools::utf8_substr($rs['summary'], 0, 300))?>
          <div class="clear"></div>
        </div>
        <br />
        <div style="font-weight:bold;">
          <?php echo image_tag('arrow.png', array('width'=>16,'height'=>16,'border'=>0))?>
          <a href="<?php echo url_for('content/show?id='.$rs['id'])?>/">Дэлгэрэнгүй...</a>
          <div class="clear"></div>
        </div>
      </div><!--ourprojectrow-->
    <?php endforeach;?>
    
    <div>
      <?php echo htmlspecialchars_decode($page->getConclusion())?>
    </div>
    
  </div>
</div><!--welcomezone-->