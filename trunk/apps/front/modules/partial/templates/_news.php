<div>
  <h1>Мэдээ мэдээлэл &amp; үйл явдлууд</h1>
  <div class="newszone">
    <div>
        <?php $rss = Doctrine::getTable('Content')
                      ->createQuery('a')
                      ->select('c.id, c.title, c.summary, c.created_at')
                      ->from('Content c')
                      ->innerJoin('c.Page p on p.id = c.page_id')
                      ->where('p.type = "news"')
                      ->andWhere('c.is_active = 1')
                      ->limit(3)
                      ->fetchArray();
        ?>
        <?php foreach ($rss as $rs):?>
          <div style="text-align:left;">
            <div class="newssubheading"><?php echo time_ago($rs['created_at'])?></div>
            <div class="newscontent">
                <?php echo $rs['title']?>
                <br clear="all">
                <a href="<?php echo url_for('content/show?id='.$rs['id'])?>">дэлгэрэнгүй &raquo;</a>
            </div>
          </div>
        <?php endforeach?>
    </div>
  </div><!--newszone-->
</div>

