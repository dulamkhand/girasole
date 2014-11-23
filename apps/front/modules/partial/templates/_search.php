<form action="<?php echo url_for('main/search')?>" class="search" method="GET">
    <input type="text" name="keyword" id="keyword" class="field" value="<?php echo $sf_params->get('keyword')?>" 
          style="width:<?php echo $width?>px;"/>
    <button type="submit" class="submit">
        <?php echo image_tag('icons/search-32.png', array())?>
    </button>
    <br clear="all">
</form>
