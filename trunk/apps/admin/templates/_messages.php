<div id="messages">
  <!-- message boxes -->

  <!--  ajiluulj chadsangui.  -->
  <?php if( isset($form) && ( $form->hasErrors() || $form->hasGlobalErrors()) ) : ?>
  <div class="info-message">
    <b>Таны оруулсан мэдээлэл алдаатай байна:</b>
    <br /> &nbsp; <br />
      <?php foreach( $form->getGlobalErrors() as $name => $error ) : ?>
    &nbsp; - <?php echo $error ?><br />
      <?php endforeach ?>
      <?php $errors = $form->getErrorSchema()->getErrors() ?>
      <?php if ( count($errors) > 0 ) : ?>
        <?php foreach( $errors as $name => $error ) : ?>
    &nbsp; - <?php echo $error ?><br />
        <?php endforeach ?>
      <?php endif ?>
  </div>
  <?php endif ?>

  <?php if ($sf_user->hasFlash('flash')): ?>
      <div class="info-message"><?php echo $sf_user->getFlash('flash')?></div>
  <?php endif; ?>

</div>