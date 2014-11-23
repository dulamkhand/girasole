<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('quizOption/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table>
    <tfoot>
      <tr>
        <td colspan="2">
          <?php echo $form->renderHiddenFields(true) ?>
          <?php $quizId = $form->getObject() ? $form->getObject()->getQuizQuestion()->getQuizId() : $sf_params->get('quizId')?>
          &nbsp;<a href="<?php echo url_for('quizQuestion/index?quizId='.$quizId) ?>">Back to list</a>
          <?php if (!$form->getObject()->isNew()): ?>
            &nbsp;<?php echo link_to('Delete', 'quizOption/delete?id='.$form->getObject()->getId(), array('method' => 'delete', 'confirm' => 'Are you sure?')) ?>
          <?php endif; ?>
          <input type="submit" value="Save" class="button" />
        </td>
      </tr>
    </tfoot>
    <tbody>
      <?php echo $form->renderGlobalErrors() ?>
      <tr>
        <th><?php echo $form['question_id']->renderLabel() ?></th>
        <td>
          <?php echo $form['question_id']->renderError() ?>
          <?php echo $form['question_id'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['point']->renderLabel() ?></th>
        <td>
          <?php echo $form['point']->renderError() ?>
          <?php echo $form['point'] ?>
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
        <th><?php echo $form['sort']->renderLabel() ?></th>
        <td>
          <?php echo $form['sort']->renderError() ?>
          <?php echo $form['sort'] ?>
        </td>
      </tr>
    </tbody>
  </table>
</form>
