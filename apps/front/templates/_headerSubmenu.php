<div class="submenu" style="width:250px;" id="submenu-<?php echo $type?>">
	<ul class="cat none">
	  <?php foreach ($cats as $cat):?>
       <?php if($cat['type'] == $type)
            echo '<li>'.link_to($cat['name'], 'content/branch2?type='.$type.'&catId='.$cat['id'], array());
                echo '<ul class="subcat none">';
                    foreach ($subcats as $subcat){
                       if(($subcat['type'] == $type) && ($subcat['parent_id'] == $cat['id']))
                            echo '<li>'.link_to($subcat['name'], 'content/branch2?type='.$type.'&last=1&catId='.$subcat['id'], array()).'</li>';
                            // .$subcat['id']
                    }
                echo '</ul>'; // subcat
            echo '</li>';
       ?>
	  <?php endforeach;?>
  </ul>
</div><!--submenu-->