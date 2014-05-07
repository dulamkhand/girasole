<form action="<?php echo url_for('category/index')?>" method="GET">
    <p style="width:60px;float:left;margin:7px 5px;font-weight:bold;">Type</p> 
    <select name="type" id="type" style="width:258px;">
        <option value="businesswoman">businesswoman</option>
        <option value="housewife">housewife</option>
        <option value="diva">diva</option>
        <option value="teenage">teenage</option>
    </select> &nbsp; 
    <?php include_partial('global/search', array());?>
</form>

<br clear="all">

<a href="<?php echo url_for('category/new')?>"><?php echo image_tag('icons/with-shadows/badge-square-plus-24.png', array())?></a>
<br clear="all">
<br clear="all">

<div style="width:100%;">
  <div class="left border1ccc" style="width:70px;">Type</div>
  <div class="left border1ccc" style="width:150px;">Name</div>
  <div class="left border1ccc" style="width:250px;">Childs</div>
  <div class="left border1ccc" style="width:20px;">Sort</div>
  <div class="left border1ccc" style="width:150px;"></div>
  
  <br clear="all">
  
  <?php $i=0; foreach ($pager->getResults() as $category): ?>
    <div class="left border1ccc" style="width:70px;">
        <?php echo $category->getType() ?>
    </div>
    <div class="left border1ccc" style="width:150px;">
        <?php echo $category->getName() ?>
    </div>
    
    <div class="left border1ccc" style="width:150px;">
        <?php echo $category->getName() ?>
    </div>
    
    <div class="left border1ccc" style="width:20px;">
        <?php echo $category->getSort()?>
    </div>
    <div class="left border1ccc" style="width:150px;">
        <a href="<?php echo url_for('category/edit?id='.$category->getId())?>" class="action">Edit</a>
        <a onclick="return confirm('Are you sure?')" href="<?php echo url_for('category/delete?id='.$category->getId())?>" class="action">Delete</a>
    </div>
    <br clear="all">
  <?php endforeach; ?>

</div>

<br clear="all">
<?php echo pager($pager, 'category/index')?>