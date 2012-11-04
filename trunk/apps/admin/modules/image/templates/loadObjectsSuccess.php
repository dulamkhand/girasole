<?php foreach ($objects as $key=>$value):?>
  <option <?php if ($objectId == $key) echo 'selected';?> value="<?php echo $key?>"><?php echo $value?></option>
<?php endforeach?>