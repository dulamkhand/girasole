<div id="login-header" style="">
    <?php if(!$sf_user->isAuthenticated()):?>
        <?php //include_partial('user/boxRegister', array('form'=>(new RegisterForm())));?>
        <?php //include_partial('user/boxLogin', array('form'=>(new LoginForm())));?>
    
        <a href="<?php echo url_for('user/login')?>" class="right join" style="padding:2px 15px;color:#fff;" id="openBoxLogin">НЭВТРЭХ</a>
        <span class="right" style="margin:2px 0 0 0;color:#fff;"> | </span>
        <a href="<?php echo url_for('user/register')?>" class="right join" style="padding:2px 15px;color:#fff;" id="openBoxRegister">БҮРТГҮҮЛЭХ</a>  
    <?php else:?>
        <?php include_partial('user/userMenu', array());?>
        <a href="<?php echo url_for('user/profile')?>" id="userAvator" class="right box-shadow">
            <?php echo image_tag('/uploads/user/'.$sf_user->getAttribute('avator', 'default.png'), array())?>
        </a>
    <?php endif?>
    <br clear="all">
</div>

<br clear="all">

<script type="text/javascript">
// LOGIN / REGISTER
/* $('#openBoxLogin').click(function(e){
    $('#boxLogin').show();    
    $(this).css('background','green');
    $(this).css('color','white');
    
    $('#boxRegister').hide();
    $('#openBoxRegister').css('background','white');
    $('#openBoxRegister').css('color','black');
});

$('#closeBoxLogin').click(function(e){
    $('#boxLogin').hide();
    $('#openBoxLogin').css('background','white');
    $('#openBoxLogin').css('color','black');
});

$('#openBoxRegister').click(function(e){
    $('#boxRegister').show();    
    $(this).css('background','green');
    $(this).css('color','white');
    
    $('#boxLogin').hide();
    $('#openBoxLogin').css('background','white');
    $('#openBoxLogin').css('color','black');
});

$('#closeBoxRegister').click(function(e){
    $('#boxRegister').hide();
    $('#openBoxRegister').css('background','white');
    $('#openBoxRegister').css('color','black');
});
*/
</script>