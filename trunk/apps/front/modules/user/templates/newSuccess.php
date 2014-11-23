<div class="left" style="width:48%;">
    <h1 class="title-branch">Бүртгүүлэх</h1>
    <?php include_partial('user/boxRegister', array('form'=>new RegisterForm()));?>
</div>

<div class="left" style="width:48%;margin:0 0 0 40px;">
    <h1 class="title-branch">Нэвтрэх</h1>
    <?php include_partial('user/boxLogin', array('form'=>new LoginForm()));?>
</div>