(function($){$.fn.hoverIntent=function(f,g){var cfg={sensitivity:7,interval:100,timeout:0};cfg=$.extend(cfg,g?{over:f,out:g}:f);var cX,cY,pX,pY;var track=function(ev){cX=ev.pageX;cY=ev.pageY;};var compare=function(ev,ob){ob.hoverIntent_t=clearTimeout(ob.hoverIntent_t);if((Math.abs(pX-cX)+Math.abs(pY-cY))<cfg.sensitivity){$(ob).unbind("mousemove",track);ob.hoverIntent_s=1;return cfg.over.apply(ob,[ev]);}else{pX=cX;pY=cY;ob.hoverIntent_t=setTimeout(function(){compare(ev,ob);},cfg.interval);}};var delay=function(ev,ob){ob.hoverIntent_t=clearTimeout(ob.hoverIntent_t);ob.hoverIntent_s=0;return cfg.out.apply(ob,[ev]);};var handleHover=function(e){var p=(e.type=="mouseover"?e.fromElement:e.toElement)||e.relatedTarget;while(p&&p!=this){try{p=p.parentNode;}catch(e){p=this;}}if(p==this){return false;}var ev=jQuery.extend({},e);var ob=this;if(ob.hoverIntent_t){ob.hoverIntent_t=clearTimeout(ob.hoverIntent_t);}if(e.type=="mouseover"){pX=ev.pageX;pY=ev.pageY;$(ob).bind("mousemove",track);if(ob.hoverIntent_s!=1){ob.hoverIntent_t=setTimeout(function(){compare(ev,ob);},cfg.interval);}}else{$(ob).unbind("mousemove",track);if(ob.hoverIntent_s==1){ob.hoverIntent_t=setTimeout(function(){delay(ev,ob);},cfg.timeout);}}};return this.mouseover(handleHover).mouseout(handleHover);};})(jQuery);


$(document).ready(function(){
_xNavigation.init();
});

_xNavigation = {
  _bSubscribeOpen: false,
  _bSearchOpen: false,
  _xSubscribeTimeout: null,
  _nSubTimeoutLength: 10000,
  
  init:function(){
  this.setEventHandlers();
  },
  
  setEventHandlers:function(){
    $('.nav-main-li').hoverIntent({
      over: function(){
        var $p_xThis = $(this)
        $(this).addClass('hover')
        $(this).find('.gray_tab').show();
        $(this).find('.submenu').height('auto').slideDown(350);
        
        if (_xNavigation._bSubscribeOpen){
        clearTimeout(_xNavigation._xSubscribeTimeout);
        $('#subscribe_popup').fadeOut(100);
        _xNavigation._bSubscribeOpen = false;
        }
      },
      out: function(){
        $(this).removeClass('hover')
        $(this).find('.gray_tab').hide();
        $(this).find('.submenu').stop().hide();
        },
        interval: 50
    });
  
  
    $('#n1').children('span').hoverIntent(function(){
        clearTimeout(_xNavigation._xSubscribeTimeout);
        if(_xNavigation._bSubscribeOpen == false){
        $('#subscribe_popup').fadeIn(200);
        _xNavigation._bSubscribeOpen = true;
        }
      },
      function(){ 
        clearTimeout(_xNavigation._xSubscribeTimeout); 
        _xNavigation._xSubscribeTimeout=setTimeout("_xNavigation.subscribeTimeout()",_xNavigation._nSubTimeoutLength);
    });
  }

};