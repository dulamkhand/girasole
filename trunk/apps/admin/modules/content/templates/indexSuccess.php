<form action="<?php echo url_for('content/index')?>" method="GET">
    <b>Category</b>&nbsp; 
    <select name="categoryId" id="categoryId" style="width:320px;">
        <option></option>
        <?php $categoryId = $sf_params->get("categoryId");?>
        <?php $perms = $sf_user->getCatPermissions();?>
        <?php include_partial('content/optionCats', array('type'=>'businesswoman', 'perms'=>$perms, 'categoryId'=>$categoryId));?>
        <?php include_partial('content/optionCats', array('type'=>'housewife', 'perms'=>$perms, 'categoryId'=>$categoryId));?>
        <?php include_partial('content/optionCats', array('type'=>'diva', 'perms'=>$perms, 'categoryId'=>$categoryId));?>
        <?php include_partial('content/optionCats', array('type'=>'teenage', 'perms'=>$perms, 'categoryId'=>$categoryId));?>
        <?php include_partial('content/optionCats', array('type'=>'patriot', 'perms'=>$perms, 'categoryId'=>$categoryId));?>
    </select> &nbsp; 
    
    <?php include_partial('global/search', array());?>
</form>


<br clear="all">
<br clear="all">
<?php echo pager($pager, 'content/index');?>
<table width="100%">
  <thead>
    <tr>
      <th>#</th>
      <th>Content</th>
      <th>Cover</th>
      <th></th>
      <th></th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    <?php $i=0; foreach ($pager->getResults() as $rs): ?>
        <?php $id = $rs->getId()?>
        <tr <?php if($i%2 != 0) echo 'class="odd"'?>>
          <td><?php echo ++$i?></td>
          <td>
              <?php echo $rs->getType() ?> &raquo; <?php echo $rs->getParentCategoryName() ?> &raquo; <?php echo $rs->getCategoryName() ?><br><br>
              <a href="<?php echo $sf_user->hasCredential('content-edit') ? url_for('content/edit?id='.$id) : '#'?>" title="Edit" class="action">
                  <?php echo $rs ?>
              </a>
          </td>
          <td><?php echo image_tag($rs->getCover(), array('style'=>'max-width:100px;max-height:80px;'))?></td>      
          <td nowrap>
              <?php if($rs->getIsFeaturedHome()) echo image_tag('icons/valid.png', array('align'=>'absmiddle')) ?> HomeFeatured<br>
              <?php if($rs->getIsFeaturedHome1()) echo image_tag('icons/valid.png', array('align'=>'absmiddle')) ?> HomeTextbox<br>
              <?php if($rs->getIsFeatured()) echo image_tag('icons/valid.png', array('align'=>'absmiddle')) ?> Branch1Featured<br>
              <?php if($rs->getIsTop()) echo image_tag('icons/valid.png', array('align'=>'absmiddle')) ?> Top<br>
              <?php if($rs->getIsDiscuss()) echo image_tag('icons/valid.png', array('align'=>'absmiddle')) ?> Discuss<br>
              <?php if($rs->getAsk18()) echo image_tag('icons/valid.png', array('align'=>'absmiddle')) ?> Ask18<br>
              <?php if($rs->getIsActive()) echo image_tag('icons/valid.png', array('align'=>'absmiddle')) ?> Active
          </td>
          <td nowrap>
              Nb of views: <?php echo $rs->getNbViews() ?><br>        
              Updated at: <?php echo $rs->getUpdatedAt() ?><br>
              Created at: <?php echo $rs->getCreatedAt() ?><br>
              Sort: <?php echo $rs->getSort() ?><br>
              Updated by: <?php echo $rs->getAdmin() ?><br>
              <?php if($rs->getAuthorShow()) echo link_to('Author: '.$rs->getAuthorId(), 'user/index?id='.$rs->getAuthorId(), array('target'=>'_blank'))?>
          </td>
          <td nowrap width="20%">
              <a href="<?php echo url_for('image/index?objectId='.$id.'&objectType=content')?>" class="action">Pics</a> | 
              <?php if($sf_user->hasCredential('content-edit')):?>
                  <a href="<?php echo url_for('image/new?objectId='.$id.'&objectType=content')?>" class="action">Add pic</a> 
              <?php endif;?>
              <br clear="all">
  
              <?php if($rs->getIsDiscuss() && $sf_user->hasCredential('discuss')):?>
                  <a href="<?php echo url_for('discuss/index?objectId='.$id)?>" class="action">Discusses (<?php echo $rs->getNbDiscuss()?>)</a> | 
              <?php elseif($sf_user->hasCredential('comment')):?>
                  <a href="<?php echo url_for('comment/index?objectId='.$id)?>" class="action">Comments (<?php echo $rs->getNbComment()?>)</a> | 
              <?php endif;?>
              
              <?php if($rs->getQuizId() && $sf_user->hasCredential('quiz')):?>
                  <a href="<?php echo url_for('quizQuestion/index?quizId='.$rs->getQuizId())?>" class="action">Quiz</a>                
              <?php endif;?>
              <br clear="all">
              
              <?php if($sf_user->hasCredential('content-edit')):?>                
                  <?php include_partial('global/featurate', array('module'=>'content', 'rs'=>$rs));?>
                  <?php include_partial('global/activate', array('module'=>'content', 'rs'=>$rs));?>
                  <a href="<?php echo url_for('content/edit?id='.$id)?>" title="Edit" class="action">Edit</a> | 
              <?php endif?>
              <?php if($sf_user->hasCredential('content-delete')):?>
                  <a onclick="return confirm('Are you sure?')" href="<?php echo url_for('content/delete?id='.$id)?>" title="Delete" class="action">Delete</a>
              <?php endif?>
          </td>
        </tr>
    <?php endforeach; ?>
    <tr><td colspan="10"><?php echo pager($pager, 'content/index?categoryId='.$sf_params->get('categoryId').'&keyword='.$sf_params->get('keyword'))?></td></tr>
  </tbody>
</table>
