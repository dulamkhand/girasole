<form action="<?php echo url_for('user/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>

<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table>
    <tfoot>
      <tr>
        <td colspan="2">
          <?php echo $form->renderHiddenFields(false) ?>
          <input type="submit" value="Save" />
          &nbsp; <?php echo link_to('Back', 'user/index', array()) ?>
        </td>
      </tr>
    </tfoot>
    <tbody>
      <?php echo $form->renderGlobalErrors() ?>
       <tr>
        <th><?php echo $form['email']->renderLabel() ?></th>
        <td>
          <?php echo $form['email']->renderError() ?>
          <?php echo $form['email'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['password']->renderLabel() ?></th>
        <td>
          <?php echo $form['password']->renderError() ?>
          <?php echo $form['password'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['fullname']->renderLabel() ?></th>
        <td>
          <?php echo $form['fullname']->renderError() ?>
          <?php echo $form['fullname'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['about']->renderLabel() ?></th>
        <td>
          <?php echo $form['about']->renderError() ?>
          <?php echo $form['about'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['mobile']->renderLabel() ?></th>
        <td>
          <?php echo $form['mobile']->renderError() ?>
          <?php echo $form['mobile'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['avator']->renderLabel() ?></th>
        <td>
          <?php echo $form['avator']->renderError() ?>
          <?php echo $form['avator'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['image']->renderLabel() ?></th>
        <td>
          <?php echo $form['image']->renderError() ?>
          <?php echo $form['image'] ?>
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
        <th><?php echo $form['is_admin']->renderLabel() ?></th>
        <td>
          <?php echo $form['is_admin']->renderError() ?>
          <?php echo $form['is_admin'] ?>
          <div class="description"><?php echo $form['is_admin']->renderHelp() ?></div>
        </td>
      </tr>
    </tbody>
  </table>

</form>