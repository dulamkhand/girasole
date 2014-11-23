<form action="<?php echo url_for('admin/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>

<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table>
    <tfoot>
      <tr>
        <td colspan="2">
          <?php echo $form->renderHiddenFields(false) ?>
          <input type="submit" value="Save" />
          &nbsp; <?php echo link_to('Back to list', 'admin/index', array()) ?>
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
          <th>Module permissions</th>
          <td>
            <div style="height:250px;overflow-y:scroll;width:550px;">
                <?php $obj = $form->getObject();
                $ids = ($obj && $obj->getModPermissions()) ? explode(";", $obj->getModPermissions()) : array();
                $rss = myTools::getArray('modPermissions');
                foreach ($rss as $k=>$v){
                    echo "<label><input type='checkbox' value='{$k}' name='mod_permissions[]' ".(in_array($k, $ids) ? 'checked' : '')."/>{$v}</label><br clear='all'>";
                }
                ?>
            </div>
          </td>
      </tr>
      <tr>
      <th><label>Category permissions</label></th>
          <td>
            <label class="clean" style="font-weight:bold;width:532px;float:left;margin:4px 0;">
                <input type="checkbox" value="false" name="checkall" id="checkall"/> &nbsp; Check/Uncheck all
            </label>
            <div style="height:300px;overflow-y:scroll;width:550px;">
                <?php $obj = $form->getObject()?>
                <?php $checkedArray = ($obj && $obj->getCatPermissions()) ? explode(';', $obj->getCatPermissions()) : array();?>
                <?php include_partial('admin/checkboxCats', array('type'=>'businesswoman', 'checkedArray'=>$checkedArray));?>
                <?php include_partial('admin/checkboxCats', array('type'=>'housewife', 'checkedArray'=>$checkedArray));?>
                <?php include_partial('admin/checkboxCats', array('type'=>'diva', 'checkedArray'=>$checkedArray));?>
                <?php include_partial('admin/checkboxCats', array('type'=>'teenage', 'checkedArray'=>$checkedArray));?>
                <?php include_partial('admin/checkboxCats', array('type'=>'patriot', 'checkedArray'=>$checkedArray));?>
            </div>
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

<script type="text/javascript">
$(document).ready(function(){
  $("#checkall").click(function(){
      $(".checkbox").prop("checked",$("#checkall").prop("checked"))
  })
});
</script>