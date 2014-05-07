<!--fb like-->
<div id="fb-root"></div>
<script type="text/javascript">(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_GB/all.js#xfbml=1&appId=332914716739579";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
</script>

<div class="left" style="margin:-3px 0 0 0;width:90px;">
    <div class="fb-like" data-href="<?php echo $url?>" data-send="false" colorscheme="dark" data-layout="button_count" data-width="20" 
        data-show-faces="false"></div>
</div>

<div class="left" style="margin:-3px 0 0 0;width:100px;">
    <div class="fb-share-button" data-href="<?php echo $url?>" data-type="button_count"></div>
</div>

<div class="left" style="margin:-3px 0 0 0;width:70px;">
    <a href="https://twitter.com/share" class="twitter-share-button" data-lang="en" 
        data-via="<?php echo $via?>" data-text="<?php echo $text?>" data-url="<?php echo $url?>">Tweet</a>
    <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
</div>

<script type="text/javascript">
</script>