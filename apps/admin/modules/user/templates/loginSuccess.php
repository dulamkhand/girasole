<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<div style="background:#FFEBC1;border:2px solid #FDBF3B;margin:auto auto;width:350px;padding:30px;">
<form action="<?php echo url_for('user/login') ?>" method="post">
  <table width="40%" class="clean">
    <tfoot>
      <tr>
        <td></td>
        <td align="right">
          <input type="submit" value="Login" class="button" />
        </td>
      </tr>
    </tfoot>
    <tbody>
      <?php echo $form->renderHiddenFields(false) ?>
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
    </tbody>
  </table>
</form>
</div>