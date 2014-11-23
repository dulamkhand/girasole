<ul class="links">
  <?php foreach ($cats as $cat):?>
     <?php if($cat['type'] == $type)
          echo '<li>'.link_to($cat['name'], 'content/branch2?type='.$type.'&catId='.$cat['id'], array('class'=>'gothic'));
              echo '<ul style="margin:0" class="links">';
                  foreach ($subcats as $subcat){
                     if(($subcat['type'] == $type) && ($subcat['parent_id'] == $cat['id']))
                          echo '<li>'.link_to($subcat['name'], 'content/branch2?type='.$type.'&last=1&catId='.$subcat['id'], array('class'=>'gothic')).'</li>';
                  }
              echo '</ul>'; // subcat
          echo '</li>';
     ?>
  <?php endforeach;?>
</ul>