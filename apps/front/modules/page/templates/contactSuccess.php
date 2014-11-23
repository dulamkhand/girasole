<div class="box-shadow" style="padding:30px 60px;">
    
<?php $form = new FeedbackForm()?>
<form action="<?php echo url_for('page/contact')?>" method="post" class="left" style="width:450px;margin:0 70px 0 0;border-right:1px solid #dedede;">
		<div style="background:#D8FFAB;padding:5px;width:346px;" class="border-radius-5">
				<div style="border:1px dashed #ccc;text-align:center;">
						Бид таны захидлыг хүлээж авсан дариудаа хариу илгээх болно.
				</div>
		</div>
  	<?php echo $form->renderGlobalErrors() ?>
		<br clear="all">
    <?php echo $form['organization']->renderError() ?>
    <?php echo $form['organization'] ?>
    <br clear="all">
    <?php echo $form['name']->renderError() ?>
    <?php echo $form['name'] ?>
    <br clear="all">
    <?php echo $form['email']->renderError() ?>
    <?php echo $form['email'] ?>
    <br clear="all">
    <?php echo $form['phone']->renderError() ?>
    <?php echo $form['phone'] ?>
    <br clear="all">
    <?php echo $form['message']->renderError() ?>
    <?php echo $form['message'] ?>
    <br clear="all">
  	<input type="submit" value="Илгээх" class="button" style="height:36px;width:120px;text-align:center;cursor:pointer;" />
  	<br clear="all">
</form>

<div class="left" style="width:300px;">
		<span class="green title" style="color:green;">ИМЭЙЛ</span><br>
		<a class="title" href="mailto:hello@dagina.mn">hello@dagina.mn</a>

		<br clear="all">
		<br clear="all">
		
		<span class="green title" style="color:green;">ХОЛБОГДОХ УТАС</span><br>
		<span class="title">99022507, 88022507, 91022507</span>
		
		<br clear="all">
		<br clear="all">
		 
		<span class="green title" style="color:green;">ХАЯГ БАЙРШИЛ</span><br>
		<span class="title">Манай оффис өөр гаригт байдаг тул та бүхэн бидэнтэй дээрх утас, имэйл-р холбогдох эсвэл захидал илгээхийг хүсье.</span>

		<br clear="all">
		<br clear="all">
		
		<?php include_partial('partial/socials', array());?>
		<br clear="all">

		Latest Tweets and Latest FB posts can be shown here.
		
		<br clear="all">
		<br clear="all">
</div>

<br clear="all">
<br clear="all">

</div>


<script type="text/javascript">
$(document).ready(function(){
  $('#feedback_org').click(function(){
      if($(this).val().trim() == "Байгууллага") { $(this).val(''); }
  }).blur(function() {
      if($(this).val().trim() == "") { $(this).val('Байгууллага'); }
  });

  $('#feedback_name').click(function(){
      if($(this).val().trim() == "Таны бүтэн нэр") { $(this).val(''); }
  }).blur(function() {
      if($(this).val().trim() == "") { $(this).val('Таны бүтэн нэр'); }
  });
  
  $('#feedback_email').click(function(){
      if($(this).val().trim() == "Имэйл хаяг") { $(this).val(''); }
  }).blur(function() {
      if($(this).val().trim() == "") { $(this).val('Имэйл хаяг'); }
  });

  $('#feedback_phone').click(function(){
      if($(this).val().trim() == "Утасны дугаар") { $(this).val(''); }
  }).blur(function() {
      if($(this).val().trim() == "") { $(this).val('Утасны дугаар'); }
  });

  $('#feedback_message').click(function(){
      if($(this).val().trim() == "Захидал") { $(this).val(''); }
  }).blur(function() {
      if($(this).val().trim() == "") { $(this).val('Захидал'); }
  });
  
});
</script>
