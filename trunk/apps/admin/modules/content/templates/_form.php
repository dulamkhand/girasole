<form action="<?php echo url_for('content/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="POST" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>

<table width="100%">
  <tfoot>
    <tr>
      <td colspan="2">
        <?php echo $form->renderHiddenFields(false) ?>
        <input type="submit" value="Save" style="cursor:pointer;font-weight:bold;padding:10px;" />
        &nbsp;<a href="<?php echo url_for('content/index') ?>">Back to list</a>
      </td>
    </tr>
  </tfoot>
  <tbody>
    <?php echo $form->renderGlobalErrors() ?>
    <tr>
      <th><?php echo $form['category_id']->renderLabel() ?></th>
      <td>
        <?php echo $form['category_id']->renderError() ?>
        <?php echo $form['category_id'] ?>
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
      <th><?php echo $form['source']->renderLabel() ?></th>
      <td>
        <?php echo $form['source']->renderError() ?>
        <?php echo $form['source'] ?>
      </td>
    </tr>
    <tr>
      <th><?php echo $form['view_list']->renderLabel() ?></th>
      <td>
        <?php echo $form['view_list']->renderError() ?>
        <?php echo $form['view_list'] ?>
      </td>
    </tr>
    <tr>
      <th><?php echo $form['view_detail']->renderLabel() ?></th>
      <td>
        <?php echo $form['view_detail']->renderError() ?>
        <?php echo $form['view_detail'] ?>
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
      <th><?php echo $form['is_featured']->renderLabel() ?></th>
      <td>
        <?php echo $form['is_featured']->renderError() ?>
        <?php echo $form['is_featured'] ?>
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