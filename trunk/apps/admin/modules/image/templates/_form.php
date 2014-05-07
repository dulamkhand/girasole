<form action="<?php echo url_for('image/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table>
    <tfoot>
      <tr>
        <td colspan="2">
          <?php echo $form->renderHiddenFields(false) ?>
          <input type="submit" value="Save" />
          &nbsp;<a href="<?php echo url_for('image/index?objectType='.$objectType.'&objectId='.$objectId) ?>">Back to list</a>
        </td>
      </tr>
    </tfoot>
    <tbody>
      <?php echo $form->renderGlobalErrors() ?>
      <tr>
        <th><?php echo $form['object_type']->renderLabel() ?></th>
        <td>
          <?php echo $form['object_type']->renderError() ?>
          <?php echo $form['object_type'] ?><br>
          <div id="containerObjectId"></div>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['filename']->renderLabel() ?></th>
        <td>
          <?php echo $form['filename']->renderError() ?>
          <?php echo $form['filename'] ?>
          <span class="description"><?php echo $form['filename']->renderHelp() ?></span>
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
        <th><?php echo $form['description']->renderLabel() ?></th>
        <td>
          <?php echo $form['description']->renderError() ?>
          <?php echo $form['description'] ?>
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
        <td><?php echo $form['iscover']->renderLabel() ?></td>
        <td>
          <?php echo $form['iscover'] ?>
          <?php echo $form['iscover']->renderHelp() ?>
        </td>
      </tr>
    </tbody>
  </table>
</form>



<script type="text/javascript">
function loadObjects()
{
  $.ajax({
      url: "<?php echo url_for('image/loadObjects')?>",
      data: {objectType : $('#image_object_type').val(), objectId: <?php echo $objectId ? $objectId : 0?>},
      type: "POST",
      success: function(data){
          $('#containerObjectId').html('<select id="image_object_id" name="image[object_id]" style="width:400px;">' + data + '</select>');
      }
  });
  return false;
}

$(document).ready(function() {
    loadObjects();  
});
</script>