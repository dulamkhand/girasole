<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('coupon/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table>
    <tfoot>
      <tr>
        <td colspan="2">
          <?php echo $form->renderHiddenFields(false) ?>
          &nbsp;<a href="<?php echo url_for('coupon/index') ?>">Back to list</a>
          <?php if (!$form->getObject()->isNew()): ?>
            &nbsp;<?php echo link_to('Delete', 'coupon/delete?id='.$form->getObject()->getId(), array('method' => 'delete', 'confirm' => 'Are you sure?')) ?>
          <?php endif; ?>
          <input type="submit" value="Save" class="button" />
        </td>
      </tr>
    </tfoot>
    <tbody>
      <?php echo $form->renderGlobalErrors() ?>
      <tr>
        <th><?php echo $form['title']->renderLabel() ?></th>
        <td>
          <?php echo $form['title']->renderError() ?>
          <?php echo $form['title'] ?>
          <div class="description"><?php echo $form['title']->renderHelp() ?></div>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['type']->renderLabel() ?></th>
        <td>
          <?php echo $form['type']->renderError() ?>
          <?php echo $form['type'] ?>
          <div class="description"><?php echo $form['type']->renderHelp() ?></div>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['file']->renderLabel() ?></th>
        <td>
        	<?php if(!$form->getObject()->isNew() && $form->getObject()->getFile()) 
        				echo image_tag('/uploads/coupon/'.$form->getObject()->getFile(), array()).'<br>';
        				echo link_to('Delete file', 'coupon/deleteFile?id='.$form->getObject()->getId(), array('confirm'=>'Are you sure?')).'<br>';
        	?>
          <?php echo $form['file']->renderError() ?>
          <?php echo $form['file'] ?>
          <div class="description"><?php echo $form['file']->renderHelp() ?></div>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['body']->renderLabel() ?></th>
        <td>
          <?php echo $form['body']->renderError() ?>
          <?php echo $form['body'] ?>
          <div class="description"><?php echo $form['body']->renderHelp() ?></div>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['image']->renderLabel() ?></th>
        <td>
          <?php echo $form['image']->renderError() ?>
          <?php echo $form['image'] ?>
          <div class="description"><?php echo $form['image']->renderHelp() ?></div>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['is_active']->renderLabel() ?></th>
        <td>
          <?php echo $form['is_active']->renderError() ?>
          <?php echo $form['is_active'] ?>
          <div class="description"><?php echo $form['is_active']->renderHelp() ?></div>
        </td>
      </tr>
    </tbody>
  </table>
</form>
