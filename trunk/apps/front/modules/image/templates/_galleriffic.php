<?php $images = Doctrine::getTable('Image')->doFetchArray(array('objectType'=>$objectType, 'objectId'=>$objectId, 'limit'=>30))?>
<?php if(sizeof($images)):?>

<?php use_javascript('galleriffic/jquery.history.js');?>
<?php use_javascript('galleriffic/jquery.galleriffic.js');?>
<?php use_javascript('galleriffic/jquery.opacityrollover.js');?>
<?php use_stylesheet('galleriffic-2.css');?>

<div id="slideshow"></div>

<div id="thumbs" class="navigation">
  <ul class="thumbs">    
    <?php foreach ($images as $image):?>
      <li>
        <a class="thumb" name="leaf" href="/uploads/<?php echo $image['folder'].'/'.$image['filename']?>" title="<?php echo $image['title']?>">
					 <?php echo image_tag('/uploads/'.$image['folder'].'/120t-'.$image['filename'], array("style"=>"height:170px;width:120px;"))?>
				</a>
			  <div class="caption">
  					<p style="color:#fff!important;font-size:11px;">
  					  <p class="subtitle"><?php echo $image['title']?></p>
              <p class="desc"><?php echo $image['description']?></p>
            </p>
				</div><!--caption-->
      </li>
    <?php endforeach;?>
  </ul>
</div><!--thumbs-->

<br clear="all">

<div id="caption"></div>

<div id="controls"></div>

<br clear="all">

<script type="text/javascript">
jQuery(document).ready(function($) {
  var onMouseOutOpacity = 0.67;
  $('#thumbs ul.thumbs li, div.navigation a.pageLink').opacityrollover({
  	mouseOutOpacity:   onMouseOutOpacity,
  	mouseOverOpacity:  1.0,
  	fadeSpeed:         'fast',
  	exemptionSelector: '.selected'
  });
  
  // Initialize Advanced Galleriffic Gallery
  var gallery = $('#thumbs').galleriffic({
  	delay:                     3000,
  	numThumbs:                 10,
  	preloadAhead:              10,
  	enableTopPager:            false,
  	enableBottomPager:         false,
  	imageContainerSel:         '#slideshow',
  	controlsContainerSel:      '#controls',
  	captionContainerSel:       '#caption',
  	loadingContainerSel:       false,
  	renderSSControls:          true,
  	renderNavControls:         true,
  	playLinkText:              'Тоглуулах',
  	pauseLinkText:             'Пауслах',
  	prevLinkText:              '&lsaquo; Өмнөх',
  	nextLinkText:              'Дараах &rsaquo;',
  	nextPageLinkText:          'Дараагийн хуудас &rsaquo;',
  	prevPageLinkText:          '&lsaquo; Өмнөх хуудас',
  	enableHistory:             true,
  	autoStart:                 true,
  	syncTransitions:           true,
  	defaultTransitionDuration: 1,
  	onSlideChange:             function(prevIndex, nextIndex) {
  		// 'this' refers to the gallery, which is an extension of $('#thumbs')
  		this.find('ul.thumbs').children()
  			.eq(prevIndex).fadeTo('fast', onMouseOutOpacity).end()
  			.eq(nextIndex).fadeTo('fast', 1.0);
  
  		// Update the photo index display
  		this.$captionContainer.find('div.photo-index')
  			.html('Photo '+ (nextIndex+1) +' of '+ this.data.length);
  	},
  	onPageTransitionOut:       function(callback) {
  		this.fadeTo('fast', 0.0, callback);
  	},
  	onPageTransitionIn:        function() {
  		var prevPageLink = this.find('a.prev').css('visibility', 'hidden');
  		var nextPageLink = this.find('a.next').css('visibility', 'hidden');
  		
  		// Show appropriate next / prev page links
  		if (this.displayedPage > 0)
  			prevPageLink.css('visibility', 'visible');
  
  		var lastPage = this.getNumPages() - 1;
  		if (this.displayedPage < lastPage)
  			nextPageLink.css('visibility', 'visible');
  
  		this.fadeTo('fast', 1.0);
  	}
  });
  
  /**************** Event handlers for custom next / prev page links **********************/
  
  gallery.find('a.prev').click(function(e) {
  	gallery.previousPage();
  	e.preventDefault();
  });
  
  gallery.find('a.next').click(function(e) {
  	gallery.nextPage();
  	e.preventDefault();
  });
  
  /****************************************************************************************/

  function pageload(hash) {
  	// alert("pageload: " + hash);
  	// hash doesn't contain the first # character.
  	if(hash) {
  		$.galleriffic.gotoImage(hash);
  	} else {
  		gallery.gotoIndex(0);
  	}
  }
  

  // Initialize history plugin.
  // The callback is called at once by present location.hash. 
  $.historyInit(pageload, "advanced.html");
  
  // set onlick event for buttons using the jQuery 1.3 live method
  $("a[rel='history']").live('click', function(e) {
  	if (e.button != 0) return true;
  
  	var hash = this.href;
  	hash = hash.replace(/^.*#/, '');
  
  	$.historyLoad(hash);
  
  	return false;
  });
});
</script>
<?php endif?>