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
        <th><?php echo $form['firstname']->renderLabel() ?></th>
        <td>
          <?php echo $form['firstname']->renderError() ?>
          <?php echo $form['firstname'] ?>
        </td>
      </tr>

      <tr>
        <th><?php echo $form['lastname']->renderLabel() ?></th>
        <td>
          <?php echo $form['lastname']->renderError() ?>
          <?php echo $form['lastname'] ?>
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
        <th><?php echo $form['address']->renderLabel() ?></th>
        <td>
          <?php echo $form['address']->renderError() ?>
          <?php echo $form['address'] ?>
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
        </td>
      </tr>
      
    </tbody>
  </table>

</form>