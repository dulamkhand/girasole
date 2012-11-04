<p style="font-family:Arial;">
  Сайн байна уу? <?php echo $firstname.' '.$lastname?>,<br><br>  
  
  <b>Таны бүртгэлийн мэдээлэл</b><br>
  Бүртгүүлсэн и-мэйл:<?php echo $email?><br>
  Нууц үг: <?php echo $password?><br><br>
  
  <a href="http://<?php echo $request->getHost()?>/login">Энд</a> дарж нэвтэрнэ үү.
</p>