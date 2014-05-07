<form action="<?php echo url_for('category/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>

<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table>
    <tfoot>
      <tr>
        <td colspan="2">
          <?php echo $form->renderHiddenFields(false) ?>
          <input type="submit" value="Save" />
          &nbsp; <?php echo link_to('Back to list', 'category/list?type='.$form->getObject()->getType(), array()) ?>
        </td>
      </tr>
    </tfoot>
    <tbody>
      <?php echo $form->renderGlobalErrors() ?>
      
      <tr>
        <th><?php echo $form['type']->renderLabel() ?></th>
        <td>
          <?php echo $form['type']->renderError() ?>
          <?php echo $form['type'] ?>
        </td>
      </tr>
      
       <tr>
        <th><?php echo $form['parent_id']->renderLabel() ?></th>
        <td>
            <select name="category[parent_id]" id="category_parent_id">
                <?php $parentId = $form->getObject() ? $form->getObject()->getParentId() : 0;?>
                <?php $catType = $form->getObject() ? $form->getObject()->getType() : $sf_params->get('type');?>
                <?php include_partial('category/optionParentCats', array('type'=>'businesswoman', 'parentId'=>$parentId, 'catType'=>$catType));?>
                <?php include_partial('category/optionParentCats', array('type'=>'housewife', 'parentId'=>$parentId, 'catType'=>$catType));?>
                <?php include_partial('category/optionParentCats', array('type'=>'diva', 'parentId'=>$parentId, 'catType'=>$catType));?>
                <?php include_partial('category/optionParentCats', array('type'=>'teenage', 'parentId'=>$parentId, 'catType'=>$catType));?>
                <?php include_partial('category/optionParentCats', array('type'=>'patriot', 'parentId'=>$parentId, 'catType'=>$catType));?>
            </select>
        </td>
      </tr>
      
      <tr>
        <th><?php echo $form['name']->renderLabel() ?></th>
        <td>
          <?php echo $form['name']->renderError() ?>
          <?php echo $form['name'] ?>
        </td>
      </tr>
      
      <tr>
        <th><?php echo $form['position']->renderLabel() ?></th>
        <td>
          <?php echo $form['position']->renderError() ?>
          <?php echo $form['position'] ?>
          <div class="description"><?php echo $form['position']->renderHelp() ?></div>
        </td>
      </tr>
      
      <tr>
        <th><?php echo $form['backcolor']->renderLabel() ?></th>
        <td>
          <?php echo $form['backcolor']->renderError() ?>
          <?php echo $form['backcolor'] ?>
          <div class="description"><?php echo $form['backcolor']->renderHelp() ?></div>
        </td>
      </tr>
      
      <tr>
        <th><?php echo $form['forecolor']->renderLabel() ?></th>
        <td>
          <?php echo $form['forecolor']->renderError() ?>
          <?php echo $form['forecolor'] ?>
          <div class="description"><?php echo $form['forecolor']->renderHelp() ?></div>
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

    </tbody>
  </table>

</form>