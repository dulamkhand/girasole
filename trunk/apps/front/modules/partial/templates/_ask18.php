<!--ask18 asuugaagui bol asuuna, 1 asuusan bol dahij asuuhgui-->
<?php if(!$sf_user->getAttribute('isAsked18', false)):?>

    <div id="ask18" style="text-align:center;display:none;">
        <h2 class="title">Та 18-с доош настай бол энэ хуудсанд зочлох боломжгүй.</h2>
        <span id="ask18no" class="border-radius-19" style="padding:6px 8px;width:24px;background:#ccc;color:#000;cursor:pointer;position:absolute;top:45px;left:200px;"><18</span>
    </div>
    
    <script type="text/javascript">
        $(document).ready(function() {
            $("#ask18").fancybox({
                tpl: {closeBtn:'<a class="fancybox-item fancybox-close border-radius-19" href="javascript:;" title="Yes">18+</a>'},
                closeClick:false,
                keys:{close:null},
                helpers: {overlay:{closeClick:false}},
                hideOnOverlayClick:false,
                hideOnContentClick:false,
                afterClose:function() {
              	    <?php echo $sf_user->setAttribute('isAsked18', true);?>
              	}
            }).trigger('click');
        });
        
        $("#ask18no").click(function(){
            $(location).attr('href',"<?php echo $sf_request->getReferer()?>");
        });
    </script>
<?php endif?>