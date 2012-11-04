<p style="font-family:Arial;">
  Сайн байна уу? <?php echo $firstname?>,<br><br>
  
  Таны төлөх ёстой: <?php echo $total?>₮<br><br>
  <?php include_partial('basket/transfer', array())?><br><br>
  
  Таны сагсанд: <a href="http://<?php echo $request->getHost()?>/basket/index">http://<?php echo $request->getHost()?>/basket/index</a>
</p>