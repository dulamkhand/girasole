<form action="<?php echo url_for('content/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="POST" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>

<table width="100%">
  <tfoot>
    <tr>
      <td colspan="2">
        <?php echo $form->renderHiddenFields(true) ?>
        <input type="submit" value="Save"/>
        &nbsp;<a href="<?php echo url_for('content/index?categoryId='.$form->getObject()->getCategoryId().'#'.$form->getObject()->getId()) ?>">Back to list</a>
      </td>
    </tr>
  </tfoot>
  <tbody>
    <?php echo $form->renderGlobalErrors() ?>
    <?php echo $form['admin_id'] ?>
    <tr>
      <th><label>Ангилал</label></th>
      <td>
        <select name="content[category_id]" id="content_category_id">
            <?php $categoryId = $form->getObject() ? $form->getObject()->getCategoryId() : $sf_params->get('categoryId');?>
            <?php $perms = $sf_user->getCatPermissions();?>
            <?php include_partial('content/optionCats', array('type'=>'businesswoman', 'perms'=>$perms, 'categoryId'=>$categoryId));?>
            <?php include_partial('content/optionCats', array('type'=>'housewife', 'perms'=>$perms, 'categoryId'=>$categoryId));?>
            <?php include_partial('content/optionCats', array('type'=>'diva', 'perms'=>$perms, 'categoryId'=>$categoryId));?>
            <?php include_partial('content/optionCats', array('type'=>'teenage', 'perms'=>$perms, 'categoryId'=>$categoryId));?>
            <?php include_partial('content/optionCats', array('type'=>'patriot', 'perms'=>$perms, 'categoryId'=>$categoryId));?>
        </select>
      </td>
    </tr>
    <tr>
      <th><?php echo $form['title']->renderLabel() ?></th>
      <td>
        <?php echo $form['title']->renderError() ?>
        <?php echo $form['title'] ?>
      </td>
    </tr>
    <tr>
      <th><?php echo $form['intro']->renderLabel() ?></th>
      <td>
        <?php echo $form['intro']->renderError() ?>
        <?php echo $form['intro'] ?>
      </td>
    </tr>
    <tr>
      <th><?php echo $form['body']->renderLabel() ?></th>
      <td>
        <?php echo $form['body']->renderError() ?>
        <?php echo $form['body'] ?>
      </td>
    </tr>
    
    <tr>
      <th><?php echo $form['keywords']->renderLabel() ?></th>
      <td>
        <?php echo $form['keywords']->renderError() ?>
        <?php echo $form['keywords'] ?>
      </td>
    </tr>
    
    <tr>
      <th><?php echo $form['source']->renderLabel() ?></th>
      <td>
        <div class="left">
            <?php echo $form['source']->renderError() ?>
            <?php echo $form['source'] ?>
            <div class="description"><?php echo $form['source']->renderHelp() ?></div>
        </div>
        <div class="left" style="margin-left:5px;">
            <?php echo $form['source_link']->renderError() ?>
            <?php echo $form['source_link'] ?>
            <div class="description"><?php echo $form['source_link']->renderHelp() ?></div>
        </div>
      </td>
    </tr>    
    <tr>
      <th><?php echo $form['author_id']->renderLabel() ?></th>
      <td>
        <div class="left">
            <?php echo $form['author_id']->renderError() ?>
            <?php echo $form['author_id'] ?>
            <div class="description"><?php echo $form['author_id']->renderHelp() ?></div>
        </div>
        <label class="check"><?php echo $form['author_show'] ?> Show author?</label>
      </td>
    </tr>
    <tr>
      <th><?php echo $form['photographer_id']->renderLabel() ?></th>
      <td>
        <div class="left">
            <?php echo $form['photographer_id']->renderError() ?>
            <?php echo $form['photographer_id'] ?>
            <div class="description"><?php echo $form['photographer_id']->renderHelp() ?></div>
        </div>
        <label class="check"><?php echo $form['photographer_show'] ?> Show photographer?</label>
      </td>
    </tr>
    <tr>
      <th><?php echo $form['sort']->renderLabel() ?></th>
      <td>
        <?php echo $form['sort']->renderError() ?>
        <?php echo $form['sort'] ?>
      </td>
    </tr>
    <tr>
      <th><?php echo $form['is_active']->renderLabel() ?></th>
      <td>
        <?php echo $form['is_active']->renderError() ?>
        <?php echo $form['is_active'] ?>
      </td>
    </tr>
    <tr>
      <th><?php echo $form['is_featured']->renderLabel() ?></th>
      <td>
        <?php echo $form['is_featured']->renderError() ?>
        <label class="clean">
          <?php echo $form['is_featured'] ?>
          <?php echo $form['is_featured']->renderHelp() ?>
        </label>
      </td>
    </tr>
    <tr>
      <th><?php echo $form['is_featured_home']->renderLabel() ?></th>
      <td>
        <?php echo $form['is_featured_home']->renderError() ?>
        <label class="clean">
          <?php echo $form['is_featured_home'] ?>
          <?php echo $form['is_featured_home']->renderHelp() ?>
        </label>
      </td>
    </tr>
    <tr>
      <th><?php echo $form['is_featured_home1']->renderLabel() ?></th>
      <td>
        <?php echo $form['is_featured_home1']->renderError() ?>
        <label class="clean">
          <?php echo $form['is_featured_home1'] ?>
          <?php echo $form['is_featured_home1']->renderHelp() ?>
        </label>
      </td>
    </tr>
    <tr>
      <th><?php echo $form['is_top']->renderLabel() ?></th>
      <td>
        <?php echo $form['is_top']->renderError() ?>
        <label class="clean">
            <?php echo $form['is_top'] ?>
            <?php echo $form['is_top']->renderHelp() ?>
        </label>
      </td>
    </tr>
    <tr>
      <th><?php echo $form['is_discuss']->renderLabel() ?></th>
      <td>
        <?php echo $form['is_discuss']->renderError() ?>
        <label class="clean">
            <?php echo $form['is_discuss'] ?>
            <?php echo $form['is_discuss']->renderHelp() ?>
        </label>
      </td>
    </tr>
    <tr>
      <th><?php echo $form['ask18']->renderLabel() ?></th>
      <td>
        <?php echo $form['ask18']->renderError() ?>
        <label class="clean">
            <?php echo $form['ask18'] ?>
            <?php echo $form['ask18']->renderHelp() ?>
        </label>
      </td>
    </tr>
    <tr>
      <th><?php echo $form['quiz_id']->renderLabel() ?></th>
      <td>
        <?php echo $form['quiz_id']->renderError() ?>
        <?php echo $form['quiz_id'] ?>
        <?php echo $form['quiz_id']->renderHelp() ?>
      </td>
    </tr>
    <tr>
      <th><?php echo $form['coupon_id']->renderLabel() ?></th>
      <td>
        <?php echo $form['coupon_id']->renderError() ?>
        <?php echo $form['coupon_id'] ?>
        <?php echo $form['coupon_id']->renderHelp() ?>
      </td>
    </tr>
    <tr>
      <th><label>Related contents</label></th>
      <td>
        <div style="height:300px;overflow-y:scroll;width:750px;">
            <?php $obj = $form->getObject();
            $ids = ($obj && $obj->getRelatedIds()) ? explode(";", $obj->getRelatedIds()) : array();
            $rss = Doctrine::getTable('Content')->doFetchSelection(array('parentCategoryId'=>($obj ? $obj->getParentCategoryId() : null), 'idO'=>($obj ? $obj->getId() : null), 'limit'=>100));
            foreach ($rss as $k=>$v){
                echo "<label><input type='checkbox' value='{$k}' name='related_ids[]' ".(in_array($k, $ids) ? 'checked' : '')."/>{$v}</label><br clear='all'>";
            }
            ?>
        </div>
      </td>
    </tr>
  </tbody>
</table>

</form>