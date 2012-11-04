<p style="font-family:Arial;">
  Сайн байна уу? <?php echo $firstname.' '.$lastname?>,<br><br>
  
  Та доорх линк дээр дарж бүртгэлээ идэвхижүүлнэ үү.<br><br>

  <a href="http://<?php echo $request->getHost()?>/user/activate?code=<?php echo $code?>">http://<?php echo $request->getHost()?>/user/activate?code=<?php echo $code?></a>
</p>