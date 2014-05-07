<div id="footer">
    <div class="wrapper">

        <div class="column left">
            <h2 class="title font14">Дагина</h2>
            <?php echo image_tag('logo.header.png', array('style'=>'margin:10px 0 5px 0px;max-width:144px;'))?>
            <ul class="links">
                <li><a href="<?php echo url_for('page/about')?>" class="gothic">“Дагина”-ы тухай</a></li>
                <li><a href="<?php echo url_for('page/contact')?>" class="gothic">Холбоо барих</a></li>
                <li><a onclick="$('#img_bounce').effect('bounce');" href="#<?php echo url_for('page/sitemap')?>" class="gothic">Вэбийн бүтэц</a> <?php echo image_tag('icons/hand-right.png', array('align'=>'absmiddle', 'id'=>'img_bounce', 'style'=>'float:right;margin:6px 16px 0px 0px;'))?></li>
                <li><a href="<?php echo url_for('page/help')?>" class="gothic">Тусламж</a></li>
                <!--<li><a href="#" class="gothic">Үйлчилгээний нөхцөл</a></li>
                <li><a href="#" class="gothic">Нууцлал, хамгаалал</a></li>-->
            </ul>
            <hr style="border:0;margin:10px 2px;border-bottom:1px solid #dedede;">
            <ul class="links">
                <li><a href="<?php echo url_for('page/contribute')?>" class="gothic">Хамтран ажиллах</a></li>
                <li><a href="<?php echo url_for('page/promote')?>" class="gothic">Зар сурталчилгаа байршуулах</a></li>
                <li><a href="<?php echo url_for('page/post')?>" class="gothic">Нийтлэл бичих</a></li>
                <li><a href="<?php echo url_for('user/signup')?>" class="gothic">Хэрэглэгч болох</a></li>
            </ul>
        </div>
        
        <div class="column left">
            <h2 class="title font14">Ажил хэрэг</h2>
            <?php include_partial('global/footerSubmenu', array('type'=>'businesswoman', 'cats'=>$cats, 'subcats'=>$subcats));?>
        </div>
        
        <div class="column left">
            <h2 class="title font14">Айл гэрийн амьдрал</h2>
            <?php include_partial('global/footerSubmenu', array('type'=>'housewife', 'cats'=>$cats, 'subcats'=>$subcats));?>
        </div>
        
        <div class="column left">
            <h2 class="title font14">Гоо сайхан</h2>
            <?php include_partial('global/footerSubmenu', array('type'=>'diva', 'cats'=>$cats, 'subcats'=>$subcats));?>
        </div>
        
        <div class="column left">
            <h2 class="title font14">Өсвөр үеийнхэн</h2>
            <?php include_partial('global/footerSubmenu', array('type'=>'teenage', 'cats'=>$cats, 'subcats'=>$subcats));?>
        </div>
        
        <div class="column left" style="border-right:0;">
            <h2 class="title font14">Эх орончид</h2>
            <?php include_partial('global/footerSubmenu', array('type'=>'patriot', 'cats'=>$cats, 'subcats'=>$subcats));?>
        </div>
    </div>
    <br clear="all">
    <div class="wrapper gothic" style="padding:15px 0 15px 0;">
        Дагина Онлайн Сэтгүүл, зохиогчийн эрх хуулиар хамгаалагдсан ©2013 - 2015<br>
    </div>
</div>