<?php use_javascript('tree.js') ?>
<?php use_stylesheet('tree.css') ?>

<?php $type = $sf_request->getParameter('type')?>
<?php $keyword = $sf_request->getParameter('keyword')?>
<?php $catPositions = myTools::getArray('catPositions')?>

<form action="<?php echo url_for('category/list')?>" method="GET">
    <p style="width:60px;float:left;margin:7px 5px;font-weight:bold;">Type</p> 
    <select name="type" id="type" style="width:258px;">
        <option value="">all</option>
        <?php $catTypes = myTools::getArray('catTypes')?>
        <?php foreach ($catTypes as $key=>$value):?>
            <option value="<?php echo $key?>" <?php if($type==$key) echo 'selected'?>><?php echo $key?></option>    
        <?php endforeach?>
    </select> &nbsp; 
    <?php include_partial('global/search', array());?>
</form>

<br clear="all">

<fieldset style="width:50%;">

  <!-- Begin: Treeview-->
  <div style="margin-top:-12px; width:100%;">
  	<a class="small" href="javascript:ddtreemenu.flatten('treemenu2', 'expand')"><?php echo image_tag('icons/expand.gif', array())?></a>
  	<a class="small" href="javascript:ddtreemenu.flatten('treemenu2', 'contact')"><?php echo image_tag('icons/collapse.gif', array())?></a>
  	<span style="float:right">Дэс дараалал</span>
  </div>
  
  <!-- Begin: Content of treeview -->
  <div>
    <ul id="treemenu2" class="treeview">      
     
      <?php $cats = Doctrine::getTable("Category")->doFetchArray(array('parentId'=>'0', 'isActive'=>'all', 'type'=>$type, 'keyword'=>$keyword, 'order'=>'type ASC, sort DESC, name ASC'));
      foreach ($cats as $cat)
      {
          listChildNodes($cat, $catPositions);
      }?>
    </ul>
  </div>
  <!-- End: Content of treeview -->
  <!-- End: Treeview -->
  
  <?php function listChildNodes($cat, $catPositions){	?>
    <li>
      <?php echo str_repeat("&nbsp;", 15)?>
      <span <?php if(!$cat["is_active"]) echo 'style="color:gray;"'?>><?php echo $cat["name"]?></span> &nbsp; 
      <span style="color:gray;"><?php echo $cat["type"]?></span> &nbsp;
      <span style="color:gray;">(<?php echo $catPositions[$cat["position"]]?>)</span> &nbsp;
      
      <?php echo link_to("Edit", "category/edit?id=".$cat["id"], array('class'=>'action'));?>  | 
      <?php echo link_to("Delete", "category/delete?id=".$cat["id"], array('class'=>'action', 'onclick'=>"return confirm('Are you sure?')"));?>
      
      <span style="float:right"><?php echo $cat["sort"]?></span>
        
      <?php 
      $child_nodes = Doctrine::getTable("Category")->doFetchArray(array('parentId'=>$cat["id"], 'isActive'=>'all'));
      if (sizeof($child_nodes)) {?>
          <ul>
            <?php foreach ($child_nodes as $child_node){
                listChildNodes($child_node, $catPositions);
            }?>
          </ul>
      <?php }?>
    </li>
  <?php }?>
  
  <script type="text/javascript">
  	ddtreemenu.createTree("treemenu2", true);
  	ddtreemenu.flatten('treemenu2', 'contact');
  </script>

</fieldset>