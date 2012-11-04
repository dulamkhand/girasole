<?php $records = Doctrine::getTable('Testimonial')->findByMenu($sf_request->getParameter('menu'))?>

<?php if(sizeof($records)):?>    
<div class="widget-content" style="width:100%;margin-top:0px;margin-bottom:20px;">
  <h2><?php echo __('Guest comments')?></h2>
  
  <ul class="reviews" style="position: relative;height:100%;">
    <?php foreach ($records as $record): ?>
      <li>
        <p class="comment">
            <a>"<?php echo $record->getTextCulture()?>"</a>
        </p>
        <p class="date" style="margin:5px 0 20px 0;"><?php echo $record->getWhenCulture()?></p>
      </li>
    <?php endforeach; ?>
  </ul>
</div>
<?php endif;?>