/*
ShareThis Loader Version 4.6.5-rc1
7/1/10 ShareThis.com
*/

ST_JSON = new function(){
	this.encode = function(){
		var	self = arguments.length ? arguments[0] : this,
			result, tmp;
		if(self === null)
			result = "null";
		else if(self !== undefined && (tmp = $[typeof self](self))) {
			switch(tmp){
				case	Array:
					result = [];
					for(var	i = 0, j = 0, k = self.length; j < k; j++) {
						if(self[j] !== undefined && (tmp = ST_JSON.encode(self[j])))
							result[i++] = tmp;
					};
					result = "[".concat(result.join(","), "]");
					break;
				case	Boolean:
					result = String(self);
					break;
				case	Date:
					result = '"'.concat(self.getFullYear(), '-', d(self.getMonth() + 1), '-', d(self.getDate()), 'T', d(self.getHours()), ':', d(self.getMinutes()), ':', d(self.getSeconds()), '"');
					break;
				case	Function:
					break;
				case	Number:
					result = isFinite(self) ? String(self) : "null";
					break;
				case	String:
					result = '"'.concat(self.replace(rs, s).replace(ru, u), '"');
					break;
				default:
					var	i = 0, key;
					result = [];
					for(key in self) {
						if(self[key] !== undefined && (tmp = ST_JSON.encode(self[key])))
							result[i++] = '"'.concat(key.replace(rs, s).replace(ru, u), '":', tmp);
					};
					result = "{".concat(result.join(","), "}");
					break;
			}
		};
		return result;
	};

	
	var	c = {"\b":"b","\t":"t","\n":"n","\f":"f","\r":"r",'"':'"',"\\":"\\","/":"/"},
		d = function(n){return n<10?"0".concat(n):n},
		e = function(c,f,e){e=eval;delete eval;if(typeof eval==="undefined")eval=e;f=eval(""+c);eval=e;return f},
		i = function(e,p,l){return 1*e.substr(p,l)},
		p = ["","000","00","0",""],
		rc = null,
		rd = /^[0-9]{4}\-[0-9]{2}\-[0-9]{2}T[0-9]{2}:[0-9]{2}:[0-9]{2}$/,
		rs = /(\x5c|\x2F|\x22|[\x0c-\x0d]|[\x08-\x0a])/g,
		rt = /^([0-9]+|[0-9]+[,\.][0-9]{1,3})$/,
		ru = /([\x00-\x07]|\x0b|[\x0e-\x1f])/g,
		s = function(i,d){return "\\".concat(c[d])},
		u = function(i,d){
			var	n=d.charCodeAt(0).toString(16);
			return "\\u".concat(p[n.length],n)
		},
		v = function(k,v){return $[typeof result](result)!==Function&&(v.hasOwnProperty?v.hasOwnProperty(k):v.constructor.prototype[k]!==v[k])},
		$ = {
			"boolean":function(){return Boolean},
			"function":function(){return Function},
			"number":function(){return Number},
			"object":function(o){return o instanceof o.constructor?o.constructor:null},
			"string":function(){return String},
			"undefined":function(){return null}
		},
		$$ = function(m){
			function $(c,t){t=c[m];delete c[m];try{e(c)}catch(z){c[m]=t;return 1}};
			return $(Array)&&$(Object)
		};
	try{rc=new RegExp('^("(\\\\.|[^"\\\\\\n\\r])*?"|[,:{}\\[\\]0-9.\\-+Eaeflnr-u \\n\\r\\t])+?$')}
	catch(z){rc=/^(true|false|null|\[.*\]|\{.*\}|".*"|\d+|\d+\.\d+)$/}
};

if(typeof(_gaq)!=="undefined" && typeof(__stPubGA)!=="undefined"){
	if(typeof(_gat)!=="undefined"){
		var __stPubGA=_gat._getTrackerByName("~0")._getAccount();
	}
	if(typeof(__stPubGA)!=="undefined" && __stPubGA!="UA-XXXXX-X"){
		_gaq.push(function(){
			var temp=_gat._getTrackerByName();
			__stPubGA=temp._getAccount();
			if(__stPubGA=="UA-XXXXX-X"){
				delete __stPubGA;
			}
		});
	}
}


try{

	if (!SHARETHIS) {
		if(!SHARETHIS_TOOLBAR){
			var SHARETHIS_TOOLBAR=false;
		}
		var SHARETHIS=null;
		/* parseQueryString.js - a function to parse and decode query strings -- The author of this program, Safalra (Stephen Morley), irrevocably releases all rights to this program, with the intention of it becoming part of the public domain. Because this program is released into the public domain, it comes with no warranty either expressed or implied, to the extent permitted by law.  For more public domain JavaScript code by the same author, visit: http://www.safalra.com/web-design/javascript/ */
		function parseQueryString(G){var E={};if(G==undefined){G=location.search?location.search:""}if(G.charAt(0)=="?"){G=G.substring(1)}var C=G.indexOf("?");if(C){G=G.substring(C+1)}C=G.indexOf("#");if(C){G=G.substring(C+1)}G=G.replace("+"," ");var B=G.split(/[&;]/g);for(var C=0;C<B.length;C++){var F=B[C].split("=");var A=decodeURIComponent(F[0]);var D=decodeURIComponent(F[1]);if(!E[A]){E[A]=[]}E[A].push((F.length==1)?"":D)}return E};//var D=decodeURIComponent(F[1]);E[A]=((F.length==1)?"":D)}return E};

		var stVisibleInterval=null;
		var readyTestInterval=null;
		var st_showing = false;
		var stautoclose = true;
	
		function SHARETHIS_merge(){
			var mix = {};
			for (var i = 0, l = arguments.length; i < l; i++){
				var object = arguments[i];
				if (SHARETHIS_typeof(object) != 'object') continue;
				for (var key in object){
					var op = object[key], mp = mix[key];
					mix[key] = (mp && SHARETHIS_typeof(op) == 'object' && SHARETHIS_typeof(mp) == 'object') ? SHARETHIS_merge(mp, op) : SHARETHIS_unlink(op);
				}
			}
			return mix;
		}

		function SHARETHIS_unlink(object){
			var SHARETHIS_unlinked;	
			switch (SHARETHIS_typeof(object)){
				case 'object':
					SHARETHIS_unlinked = {};
					for (var p in object) SHARETHIS_unlinked[p] = SHARETHIS_unlink(object[p]);
				break;
				case 'hash':
					SHARETHIS_unlinked = SHARETHIS_unlink(object.getClean());
				break;
				case 'array':
					SHARETHIS_unlinked = [];
					for (var i = 0, l = object.length; i < l; i++) SHARETHIS_unlinked[i] = SHARETHIS_unlink(object[i]);
				break;
				default: return object;
			}
			return SHARETHIS_unlinked;
		}
	
		function SHARETHIS_typeof(object){
			if(SHARETHIS_isArray(object)){
				return 'array';
			}
			else{
				return typeof object;
			}
		}
	
		function SHARETHIS_isArray(object){
			var a=object != null && typeof object == "object" && 'splice' in object && 'join' in object;
			return a;
		}

		function Shareable(properties,options){
			this.idx=-1;
			this.frameUrl="";
			this.element=null;
			this.trigger=null;
			this.page="";
			this.properties={
				type:       '',
				title:      encodeURIComponent(document.title),
				summary:    '',
				content:    '',
				url:        document.URL,
				icon:       '',
				category:   '',
				updated:    document.lastModified,
				published:  '',
				author:     ''
			};
			//onmouseover set to true for default
			this.options={
				button: true,
				onmouseover: true,
				buttonText: 'ShareThis',
				popup: false,
				offsetLeft: 0,
				offsetTop: 0,
				embeds: false,
				autoclose: false
			};
			this.initialize= function(properties, options){
				this.options = SHARETHIS_merge(this.options, options);
				this.properties = SHARETHIS_merge(this.properties, properties);
				if (options.target){
					var o = this;
					options.target.onclick=function(){o.share();};
					if (options.mouseover){
						options.target.onmouseover=function(){o.share();};
					}
				}
			}
			this.initialize(properties,options);
			this.share=function(){
				frames['stframe'].location=this.frameUrl+"#getObject/"+SHARETHIS.guid+"/"+this.idx;
			}
			this.attachButton=function(newbutton) {
				this.element = newbutton;
				newbutton.setAttribute("st_page", "home");
				if(this.options.onmouseover) {
					newbutton.onmouseover = this.popup;
				} else {
					newbutton.onclick = this.popup;
				}
			}
			this.attachChicklet = function(type, chicklet) {
				switch (type) {
				case "facebook":
					chicklet.setAttribute("st_dest", "facebook.com");
					var children = chicklet.childNodes;
					for ( var i = 0; i < children.length; i++) {
						var child = children[i];
						try {
							child.setAttribute("st_dest", "facebook.com");
						} catch (err) {
						}
					}
					chicklet.onclick = this.chicklet;
					break;
				case "digg":
					chicklet.setAttribute("st_dest", "digg.com");
					var children = chicklet.childNodes;
					for ( var i = 0; i < children.length; i++) {
						var child = children[i];
						try {
							child.setAttribute("st_dest", "digg.com");
						} catch (err) {
						}
					}
					chicklet.onclick = this.chicklet;
					break;
				case "yahoo_buzz":
					chicklet.setAttribute("st_dest", "buzz.yahoo.com");
					var children = chicklet.childNodes;
					for ( var i = 0; i < children.length; i++) {
						var child = children[i];
						try {
							child.setAttribute("st_dest", "buzz.yahoo.com");
						} catch (err) {
						}
					}
					chicklet.onclick = this.chicklet;
					break;
				case "email":
					chicklet.setAttribute("st_page", "send");
					var children = chicklet.childNodes;
					for ( var i = 0; i < children.length; i++) {
						var child = children[i];
						try {
							child.setAttribute("st_page", "send");
						} catch (err) {
						}
					}
					chicklet.onclick = this.popup;
					break;
				case "twitter":
					chicklet.setAttribute("st_dest", "twitter.com");
					var children = chicklet.childNodes;
					for ( var i = 0; i < children.length; i++) {
						var child = children[i];
						try {
							child.setAttribute("st_dest", "twitter.com");
						} catch (err) {
						}
					}
					chicklet.onclick = this.chicklet;
					break;
				case "myspace":
					chicklet.setAttribute("st_dest", "myspace.com");
					var children = chicklet.childNodes;
					for ( var i = 0; i < children.length; i++) {
						var child = children[i];
						try {
							child.setAttribute("st_dest", "myspace.com");
						} catch (err) {
						}
					}
					chicklet.onclick = this.chicklet;
					break;
				case "aim":
					chicklet.setAttribute("st_dest", "aim.com");
					var children = chicklet.childNodes;
					for ( var i = 0; i < children.length; i++) {
						var child = children[i];
						try {
							child.setAttribute("st_dest", "aim.com");
						} catch (err) {
						}
					}
					chicklet.onclick = this.chicklet;
					break;
				case "mixx":
					chicklet.setAttribute("st_dest", "mixx.com");
					var children = chicklet.childNodes;
					for ( var i = 0; i < children.length; i++) {
						var child = children[i];
						try {
							child.setAttribute("st_dest", "mixx.com");
						} catch (err) {
						}
					}
					chicklet.onclick = this.chicklet;
					break;
				}
			}
		}

		function ShareThis(options){
			if(typeof(options)=="undefined"){
				options={};
			}
			this.version=2.03;
			this.tmpSendData="";
			this.sendArray=[];
			this.sendInit=[];
			this.sendNum=0;
			this.guid=null;
			this.popExists=false;
			this.popup_win=null;
			this.newwinfrag="";
			this.page=null;
			this.shareables=[];
			this.readyList=[];
			this.postUrl="";
			this.frameUrl="";
			this.counter=0;
			this.wrapper=null;
			this.ready=false;
			this.popupCalled=false;
			this.referrer_sts = "";
			this.shr_flag = "";
			this.publisherID = (typeof(stLight)!=="undefined") ? stLight.publisher:null;
			this.bodyLoaded=false;
			if(options && typeof(options['publisher'])!=="undefined" ) {
				this.publisherID = options['publisher'][0];
			}
			this.publisherID = (typeof(stLight)!=="undefined") ? stLight.publisher:this.publisherID;
			this.sessionID_time = (new Date()).getTime().toString();
			this.sessionID_rand = Number(Math.random().toPrecision(5).toString().substr(2)).toString();
			this.sessionID = this.sessionID_time + '.' + this.sessionID_rand;
			this.sessionID=(typeof(stLight)!=="undefined") ? stLight.sessionID: this.sessionID;
			options['jsref']=encodeURIComponent(document.referrer);
			options['sessionID']=this.sessionID;
			this.fpc=(typeof(stLight)!=="undefined") ? stLight.fpc :_stFpc();
			_stGetD();
			options['fpc']=this.fpc;
			options['pUrl']=encodeURIComponent(document.location.href);
			this.widgetCalled=false;
			this.lastUrl='blank';
			this.logFlag=true;
			this.closebutton=null;
			this.widgetExists=false;
			this.oldScroll=0;
			this.fp=null;
			this.currentId=null;
			this.toolbar=false;
			this.st_clicked=false;
			this.st_clicked_o=null;
			this.publisherGA= (typeof(__stPubGA)!=="undefined") ? __stPubGA:null;//__stPubGA
			if(this.publisherGA!==null){options['publisherGA']=this.publisherGA;}
			this.curr_offsetTop=0;
			this.curr_offsetLeft=0;
			this.frameReady=false;
			this.delayShow=false;
			this.numIframe=0;
			this.frameLoaded=false;
			this.curr_id=null;
			this.current_element=null;
			this.opt_arr=[];
			this.mousetimer=null;
			this.autoPosition=true;
			this.openDuration=0;
			this.stopClosing=false;
			this.inTime=0;
			this.outTime=0;
			this.clickSubscribers=[];
			this.buttonCount=0;
			this.buttonClicked=false;
			this.meta={
				publisher: '',
				hostname: location.host,
				location: location.pathname
			};
			this.positionWidget=function(){
				function getHW(elem) {
					var retH=0;
					var retW=0;
					var going = true;
					while( elem!=null ) {
						if (elem.offsetLeft<0 && (document.all &&  navigator.appVersion.indexOf('MSIE 8.')!=-1)){
							var newVal = elem.offsetLeft*-1; 
							retW+= newVal;
						}
						else
							retW+= elem.offsetLeft;
						if (going) {
							retH+= elem.offsetTop;
						}
						if (window.getComputedStyle) {
							if (document.defaultView.getComputedStyle(elem,null).getPropertyValue("position") == "fixed") {
								retH += (document.documentElement.scrollTop || document.body.scrollTop);
								going = false;
							}
						} else if (elem.currentStyle) {
							if (elem.currentStyle["position"] == "fixed") {
								retH += (document.documentElement.scrollTop || document.body.scrollTop);
								going = false;
							}
						}
						elem= elem.offsetParent;
					}
					return {height:retH,width:retW};
				}
				var id=SHARETHIS.curr_id;
					var shareel = SHARETHIS.current_element;
					if(shareel==null){
						shareel=document.getElementById(id);
					}
					var curleft = curtop = 0;
					
					var mPos = getHW(shareel);
					curleft = mPos.width;
					curtop = mPos.height;
				
//					if (shareel.offsetParent) {
//						curleft = shareel.offsetLeft;
//						curtop = shareel.offsetTop;
//						while (shareel = shareel.offsetParent) {
//							curleft += shareel.offsetLeft;
//							curtop += shareel.offsetTop;
//						}
//					}
					shareel = SHARETHIS.current_element;
					if(shareel==null){
						shareel=document.getElementById(id);
					}
					
					var eltop=0;
					var elleft=0;
					var topVal=0;
					var leftVal=0;
					var elemH=0;
					var elemW=0;
					eltop = curtop + shareel.offsetHeight;
					elleft = curleft+5;
					topVal=(eltop + SHARETHIS.curr_offsetTop);
					topVal=eval(topVal);
					elemH=topVal;
					topVal+="px";
					leftVal=(elleft + SHARETHIS.curr_offsetLeft);
					leftVal=eval(leftVal);
					elemW=leftVal;
					leftVal+="px";
					SHARETHIS.wrapper.style.top = topVal;
					SHARETHIS.wrapper.style.left = leftVal;
					if(SHARETHIS.autoPosition==true){
						SHARETHIS.oldScroll=document.body.scrollTop;
						var pginfo=this.pageSize();
						var effectiveH=pginfo.height+pginfo.scrY;
						var effectiveW=pginfo.width+pginfo.scrX;
						var widgetH=330;
						var widgetW=330;
						var needH=widgetH+elemH; //500
						var needW=widgetW+elemW; //1270
						var diffH=needH-effectiveH; //~100
						var diffW=needW-effectiveW;
						var newH=elemH-diffH;// ~121
						var newW=elemW-diffW;
						
						var buttonPos=getHW(shareel);
						var leftA,rightA,topA,bottomA=false;
						if(diffH>0){
							//bottom space is not available assume top is 
							bottomA=false;
							topA=true;
							if((buttonPos.height-widgetH)>0){
								newH=buttonPos.height-widgetH;
							}
							SHARETHIS.wrapper.style.top = newH+"px";
						}
						
						if(diffW>0){
							//left is not avaialbe assume right is...
							leftA=false;
							rightA=true;
							if((buttonPos.width-widgetW)>0){
								newW=buttonPos.width-widgetW;
							}
							SHARETHIS.wrapper.style.left = newW+"px";
						}
					}	
					SHARETHIS.wrapper.style.visibility="visible";
					SHARETHIS.mainstframe.style.visibility = 'visible';
			},
			this.hideWidget=function(){
				if(SHARETHIS.wrapper.style.visibility !== 'hidden'){
					SHARETHIS.wrapper.style.visibility = 'hidden';
				}
				if(SHARETHIS.mainstframe.style.visibility !== 'hidden'){
					SHARETHIS.mainstframe.style.visibility = 'hidden';
				}
			},
			this.pageSize=function() {
		        var pScroll = [0,0,0,0];
				var scX=0;
				var scY=0;
				var winX=0;
				var winY=0;
		        if (typeof(window.pageYOffset) == 'number') {
		            //Netscape compliant
		            scX=window.pageXOffset;
					scY=window.pageYOffset;
		        } else if (document.body && (document.body.scrollLeft || document.body.scrollTop)) {
		            //DOM compliant
					scX=document.body.scrollLeft;
					scY=document.body.scrollTop;
		        } else if (document.documentElement
		          && (document.documentElement.scrollLeft || document.documentElement.scrollTop)) {
		            //IE6 standards compliant mode
					scX=document.documentElement.scrollLeft;
					scY=document.documentElement.scrollTop;
		        }
		  	   if (window.innerWidth) {
			   		winX=window.innerWidth;
			      	winY=window.innerHeight;
			   }
			   else if (document.documentElement.offsetWidth) {
			   		winX= document.documentElement.offsetWidth;
			        winY=document.documentElement.offsetHeight;
			   }
				pScroll={scrX:scX,scrY:scY,width:winX,height:winY};
		        return pScroll;
		    }

		    this.addEntry=function(properties, options){
		    	if(_thisScript===null){
		    		var tmpScr=getShareThisScript();
		    		SHARETHIS.options=parseQueryString(tmpScr.src);
		    			
		    		this.frameUrl=(("https:" == document.location.protocol) ? "https://ws.sharethis.com/secure/index.html" : "http://edge.sharethis.com/share4x/index.0c28e566093cdf4e61347be59e0cb17d.html");
		    		//this.frameUrl="http://edge.sharethis.com/share4x/index.0c28e566093cdf4e61347be59e0cb17d.html"; // - Last Uncommented URL
					//this.frameUrl="http://wd.sharethis.com/share5x/index.html
					this.postUrl=(("https:" == document.location.protocol) ? "https://ws." : "http://wd.")+"sharethis.com/api/setCache_ws.php";

					if(SHARETHIS.options["button"]){SHARETHIS.options["button"]=SHARETHIS.getBool(SHARETHIS.options["button"].toString());}
					if(SHARETHIS.options["popup"]){SHARETHIS.options["popup"]=SHARETHIS.getBool(SHARETHIS.options["popup"].toString());}
					if(SHARETHIS.options["embeds"]){SHARETHIS.options["embeds"]=SHARETHIS.getBool(SHARETHIS.options["embeds"].toString());}
		
					var init = "#init";
					SHARETHIS.newwinfrag = "#popup";
					
					for (var o in SHARETHIS.options){
						if(SHARETHIS_tstOptions(o)==true)
		            	{
		            		init = init+"/"+o+"="+encodeURIComponent(options[o]);
							this.newwinfrag = this.newwinfrag+ "/" +o +"-=-" +encodeURIComponent(options[o]);
		            	}
					}
					
					SHARETHIS.initstr = init;
					SHARETHIS.mainstframe.src=SHARETHIS.frameUrl+SHARETHIS.initstr;
		    	}

		        var o = new Shareable(properties, SHARETHIS_merge(SHARETHIS.options, options));
		        if(typeof(o.properties.url)==="object"){
		        	try{o.properties.url=o.properties.url.href;}catch(err){}
		        }
		        for (var prop in o.properties){
		        	try{o.properties[prop]=o.properties[prop].toString();}catch(err){}
		        }
				var xInt="";
				var xInt2="";
				var sendDataInt="";
				var sendPopupDataInt="";
				//
				if(
						this.meta.publisher=="5afea983-e449-4a75-a464-3c9a7f6c6e37" ||  //zillow 
						this.meta.publisher=="e1e0ea5a-a326-4731-b1d1-f21623043511" || //boston.com
						this.meta.publisher=="ccd2a158-6cce-4bbc-afa8-1d2dc62fe84c" || //foxnews.com
						this.meta.publisher=="1e542d6f-546f-4d85-a790-bbaf333155b7" || //espn.com
						this.meta.publisher=="89879177-51bf-4cf0-91c9-6326d062d5e6" || //huffington post 
						this.meta.publisher=="44b6b8a4-c8df-4bd0-8d8d-e6ad27ec63f4" //fast company 
				){ //on hover is false for these publishers
					o.options.onmouseover=false;
				}
				if( SHARETHIS.options['onmouseover'] ) {
					if( SHARETHIS.options['onmouseover'] == 'true' ) {
						o.options.onmouseover=true;
					} else if( SHARETHIS.options['onmouseover'] == 'false' ) {
						o.options.onmouseover=false;
					}
				}
				
				
		        if(o.options.popup){ 
					o.options.onmouseover = false;
					SHARETHIS.popupExists=true;
				}
				else if(SHARETHIS_TOOLBAR!==true){
					SHARETHIS.widgetExists=true;
				}
		        o.idx = this.shareables.push(o) - 1;		      
				var id = 'sharethis_' + o.idx;
		        var oidx = o.idx;

				if(o.properties.url!==this.lastUrl){
					this.lastUrl=o.properties.url;
				}
				else{
					SHARETHIS.logFlag=false;
				}
				o.chicklet = function(e){
					if (!e) var e = window.event;
					if (e.target) {
						o.trigger = e.target;
					}
					else if (e.srcElement) {
						o.trigger = e.srcElement;
					}
					var dest = o.trigger.getAttribute("st_dest");
					
					var loggerUrl = (("https:" == document.location.protocol) ? "https://l." : "http://l.")+"sharethis.com/log?event=click"
						+ "&source=chicklet"
						+ "&publisher=" + encodeURIComponent(SHARETHIS.options.publisher)
						+ "&hostname=" + encodeURIComponent(SHARETHIS.meta.hostname)
						+ "&location=" + encodeURIComponent(SHARETHIS.meta.location)
						+ "&destinations=" + dest
						+ "&ts" + (new Date()).getTime()
						+ "&title=" + encodeURIComponent(o.properties.title)
						+ "&url=" + encodeURIComponent(o.properties.url)
						+ "&sessionID=" + SHARETHIS.options.sessionID
						+ "&fpc=" + SHARETHIS.options.fpc;
					var logger = new Image(1,1);
					logger.src = loggerUrl;
					logger.onload = function(){return;};

					var url  =(("https:" == document.location.protocol) ? "https://ws." : "http://wd.")+ "sharethis.com/button/redirect.php";
					url += "?d="  + dest;
					url += "&pk=" + SHARETHIS.options.publisher;
					url += "&s="  + SHARETHIS.options.sessionID;
					url += "&p="  + encodeURIComponent(ST_JSON.encode(o.properties));
					window.open(url,"stpopup","width=970,height=700,location=1,toolbar=1,scrollbars=1,menubar=1,resizable=1"); 
				}
		        o.popup = function(e){
		        	stCancelClose();
		        	o.options.autoclose=true;
		        	SHARETHIS.postEntries(o);	
		        	//o.options.onmouseover=true;//setting to true for default...
		        	if(SHARETHIS_TOOLBAR===true){
		        		if(st_showing===false){
		        			SHARETHIS.log('widget',o,'toolbar');
		        		}
						st_showing=true;
						clearInterval(stVisibleInterval);
						SHARETHIS.hideEmbeds();
						var added="#popup/title="+encodeURIComponent(encodeURIComponent(o.properties.title))+"/url="+encodeURIComponent(encodeURIComponent(o.properties.url))+"/publisher="+o.options.publisher+"/fpc="+o.options.fpc+"/sessionID="+o.options.sessionID+"/toolbar=true";
						var pgval="";
						if(SHARETHIS.page!=null){
							pgval="/page="+SHARETHIS.page;
						}
						SHARETHIS.mainstframe.src = SHARETHIS.frameUrl +added+pgval;
						SHARETHIS.wrapper.style.visibility="visible";
						SHARETHIS.mainstframe.style.visibility = 'visible';
		        	} else {
		        		if( (SHARETHIS.ready===true && SHARETHIS.frameReady===true) || (SHARETHIS.popupExists===true && SHARETHIS.ready==true && SHARETHIS.widgetExists===false) || (SHARETHIS.popupExists===true && SHARETHIS.ready==true && SHARETHIS.frameReady===true) ){
							clearInterval(stVisibleInterval);
							if ( ( typeof(e) != "undefined" &&  typeof(e) != "unknown" && e) || (typeof(event) != "undefined" &&  typeof(event) != "unknown" && event) ) {
								if (typeof(e) != "undefined" &&  typeof(e) != "unknown" && e) {
									o.trigger = e.target
								}
								else if (typeof(event) != "undefined" && typeof(event) != "unknown" && event) {
									o.trigger = event.srcElement;
								}
								if (o.trigger !== null && o.trigger) {
									id=o.trigger.id;
									SHARETHIS.current_element=o.trigger;
									o.page = o.trigger.getAttribute('st_page');
									if(st_showing===false){
										if (o.page == "home") {
											SHARETHIS.log('widget',o,'button');
										} else {
											SHARETHIS.log('widget',o,'chicklet');
										}
								 	}
								}
								else {
									o.page = "home";
									if(st_showing===false){
								 		SHARETHIS.log('widget',o,'button');
								 	}
								}
							}
							else {
								if (o.element != null) {
									id=o.element.id;
									SHARETHIS.current_element=o.element;
								}
								o.page = "home";
								if(st_showing===false){
							 		SHARETHIS.log('widget',o,'button');
							 	}
							}
							var pageFrag = "/page=" + o.page;
							SHARETHIS.curr_offsetTop=Number(o.options.offsetTop);
							SHARETHIS.curr_offsetLeft=Number(o.options.offsetLeft);
							if(SHARETHIS.curr_offsetTop>0 || SHARETHIS.curr_offsetTop>0){
								SHARETHIS.autoPosition=false;
							}
							SHARETHIS.curr_id=id;
							if(o.options.onclick) {
					        		var res = o.options.onclick.apply(document, [o]);
					        		if(res == false) return false;
							}
							var added="#popup/title-=-"+encodeURIComponent(encodeURIComponent(o.properties.title))+"/url-=-"+encodeURIComponent(encodeURIComponent(o.properties.url))+"/publisher-=-"+o.options.publisher+"/fpc-=-"+o.options.fpc+"/sessionID-=-"+o.options.sessionID+"/toolbar-=-true";
					        if(o.options.popup) {
					        	var newwinurl = SHARETHIS.frameUrl + SHARETHIS.newwinfrag + added;	
								window.open(newwinurl, "newstframe","status=1,toolbar=0,width=350,height=450");
					        }
					        else{
								if(st_showing == false) {		
									if(o.options.embeds == false) {
										SHARETHIS.hideEmbeds();
									}
									stautoclose = o.options.autoclose;
									if(o.options.onmouseover==false){
										stautoclose=false;
									}
									if(SHARETHIS.sendNum<SHARETHIS.sendArray.length){
										var temparr=[];
										SHARETHIS.sendArray.splice(0,0,"#show" + "/guid_index=0" + pageFrag);
										if(SHARETHIS.delayShow===true){
											sendDataInt=setTimeout(SHARETHIS.sendData,1000);
										}
										else{
											sendDataInt=setTimeout(SHARETHIS.sendData,20);
										}
									}
									else{
										//SHARETHIS.mainstframe.src = SHARETHIS.frameUrl + "#show" + "/guid_index=" + oidx;
										window.frames['stframe'].location.replace(SHARETHIS.frameUrl + "#show" + "/guid_index=0" + pageFrag);
										if(SHARETHIS.delayShow===true){
											sendDataInt=setTimeout(SHARETHIS.sendData,1000);
										}
										else{
											sendDataInt=setTimeout(SHARETHIS.sendData,20);
										}
									}
									SHARETHIS.positionWidget();
									st_showing = true;
								}
								else{
									if(o.options.onmouseover==false || o.options.onmouseover=="false"){stcloseWidget();}
								}
							}
		        		}
		        		else{
							SHARETHIS.st_clicked=true;
							SHARETHIS.delayShow=true;
							SHARETHIS.st_clicked_o=o;
		        		}
					}//end else for SHARETHIS_TOOLBAR===true
				};
				var style = o.options.style ? o.options.style : (SHARETHIS.options.style ? SHARETHIS.options.style : 'default');
				switch (style) {
				case 'vertical':
					var ovr = document.createElement("div");
					ovr.className = 'stoverlay';
					o.button = ovr;
					var img = document.createElement("img");
					img.setAttribute("src", (("https:" == document.location.protocol) ? "https://ws." : "http://w.")+"sharethis.com/images/vbutton.gif");
					if(o.options.onmouseover == false || o.options.onmouseover == "false") ovr.onclick = o.popup;
			        if(o.options.onmouseover == true || o.options.onmouseover == "true") {
			        	ovr.onclick=function(){stCancelClose();};
			        	ovr.onmouseover=function(){;stCancelClose();SHARETHIS.mousetimer=setTimeout(o.popup,150);};
			        	ovr.onmouseout=function(){clearInterval(SHARETHIS.mousetimer);};
			        }
					try{
						if(o.options.button==true && SHARETHIS.bodyLoaded==false){
							document.write('<div class="stbutton vertical" id="' + id + '"></div>');
						}
					}
					catch(err){
	
					}
					var x = document.getElementById(id);
					if (x) {
			            if(o.options.button) {
			            	x.appendChild(ovr);
			            	x.appendChild(img);
						}
			        }
					break;
				case 'horizontal':
				case 'vertical':
					var ovr = document.createElement("div");
					ovr.className = 'stoverlay';
					o.button = ovr;
					var img = document.createElement("img");
					img.setAttribute("src", (("https:" == document.location.protocol) ? "https://ws." : "http://w.")+"sharethis.com/images/hbutton.gif");
					if(o.options.onmouseover == false || o.options.onmouseover == "false") ovr.onclick = o.popup;
			        if(o.options.onmouseover == true || o.options.onmouseover == "true") {
			        	ovr.onclick=function(){stCancelClose();};
			        	ovr.onmouseover=function(){;stCancelClose();SHARETHIS.mousetimer=setTimeout(o.popup,150);};
			        	ovr.onmouseout=function(){clearInterval(SHARETHIS.mousetimer);};
			        }
					try{
						if(o.options.button==true && SHARETHIS.bodyLoaded==false){
							document.write('<div class="stbutton horizontal" id="' + id + '"></div>');
						}
					}
					catch(err){
	
					}
					var x = document.getElementById(id);
					if (x) {
			            if(o.options.button) {
			            	x.appendChild(ovr);
			            	x.appendChild(img);
						}
			        }
					break;
				default:
					var a = document.createElement("a");
			        a.className = 'stbutton stico_' + (o.options.style ? o.options.style : (SHARETHIS.options.style ? SHARETHIS.options.style : 'default'));
				    a.title = "ShareThis via email, AIM, social bookmarking and networking sites, etc.";
			        a.href = "javascript:void(0)";
			        a.setAttribute("st_page", "home");
			        //mouse over
			        if(o.options.onmouseover == false || o.options.onmouseover == "false") a.onclick = o.popup;
			        if(o.options.onmouseover == true || o.options.onmouseover == "true") {
			        	//SHARETHIS.wrapper.onmouseover=function(){;stCancelClose();};
			        	//SHARETHIS.wrapper.onmouseout=function(){console.log("widget mouse out");};
			        	//manu 
			        	a.onclick=function(){stCancelClose();};
			        	a.onmouseover=function(){;stCancelClose();SHARETHIS.mousetimer=setTimeout(o.popup,150);};
			        	a.onmouseout=function(){clearInterval(SHARETHIS.mousetimer);};
			        		//function(){SHARETHIS.mousetimer=setTimeout(o.popup,100);};
			        		//a.onmouseover = o.popup;
			        }
			        var t = document.createElement("span");
			        t.className = 'stbuttontext';
			        t.setAttribute("st_page", "home");
			        t.appendChild(document.createTextNode(o.options.buttonText));
			        a.appendChild(t);
			        o.button = a;
			 		try{
						if(o.options.button==true && SHARETHIS.bodyLoaded==false){
							if(document.readyState != "complete" && document.readyState != "loaded" && document.readyState != "interactive"){
								document.write('<span id="' + id + '"></span>');
							}else if(document.readyState != "complete" && (/MSIE/gi.test(navigator.userAgent))){
								document.write('<span id="' + id + '"></span>');
							}
						}
			 		}catch(err){}
					//SHARETHIS.onReady();
			        var x = document.getElementById(id);
					if (x) {
			            if(o.options.button) {
			            	x.appendChild(a);
						}
			        }	
				}
				
				if(SHARETHIS.logFlag){SHARETHIS.buttonCount++;}
		        return o;
		    },
		
		    this.postEntries=function(o){
		    	SHARETHIS.sendNum=0;
		        var urls = '';
		        var propertylist = [];		        
	            var tmp_prop={};
	            //var o = this.shareables[i];
	            urls = urls+o.properties.url;
	            for (p in o.properties){
		        	if(SHARETHIS_tstOptions(p)==true){
		        		tmp_prop[p]=null;
						tmp_prop[p]=o.properties[p];
					}
		        }
				
				var metaProps={};
				var meta=document.getElementsByTagName("meta");
				for(var i=0;i<meta.length;i++){
					if(meta[i].getAttribute('property')=="og:title"){
						metaProps.ogtitle=meta[i].getAttribute('content');
					}else if(meta[i].getAttribute('property')=="og:type"){
						metaProps.ogtype=meta[i].getAttribute('content');
					}else if(meta[i].getAttribute('property')=="og:url"){
						metaProps.ogurl=meta[i].getAttribute('content');
					}else if(meta[i].getAttribute('property')=="og:image"){
						metaProps.ogimg=meta[i].getAttribute('content');
					}else if(meta[i].getAttribute('property')=="og:description"){
						metaProps.ogdesc=meta[i].getAttribute('content');	
					}else if(meta[i].getAttribute('name')=="description" || meta[i].getAttribute('name')=="Description"){
						metaProps.desc=meta[i].getAttribute('content');
					}
				}
				
				var pTitle = o.properties.title ? o.properties.title : metaProps.ogtitle;
				pTitle = pTitle ? pTitle : document.title;
				
				var pUrl = o.properties.url ? o.properties.url : metaProps.url;
				pUrl = pUrl ? pUrl : document.URL;

		        var tmp="/pageTitle="+encodeURIComponent(encodeURIComponent(pTitle))+"/pageURL="+encodeURIComponent(encodeURIComponent(pUrl))+"/pageHost="+encodeURIComponent(encodeURIComponent(document.location.host))+"/pagePath="+encodeURIComponent(encodeURIComponent(document.location.pathname)); 
				
				if(typeof(metaProps.ogimg)!='undefined' && metaProps.ogimg!=null){
					tmp += "/pageImage=" + encodeURIComponent(encodeURIComponent(metaProps.ogimg));
				}
				
				if(typeof(metaProps.ogdesc)!='undefined' && metaProps.ogdesc!=null){
					tmp += "/pageSummary=" + encodeURIComponent(encodeURIComponent(metaProps.ogdesc));
				} else 	if(typeof(metaProps.desc)!='undefined' && metaProps.desc!=null){
					tmp += "/pageSummary=" + encodeURIComponent(encodeURIComponent(metaProps.desc));
				}
				if(SHARETHIS.publisherGA!==null){
					tmp += "/publisherGA=" +SHARETHIS.publisherGA;
				}
				
				SHARETHIS.sendArray.push("#data"+tmp);
				var jsonstr = ST_JSON.encode(propertylist);
				var tmp=encodeURIComponent(jsonstr);
				var b=tmp.length;
				var a=1700;
				var c=parseInt(b/a);
				c=c+1;
				var d=b%a;
				var sendArr=[];
				var tmpSend="";
				for(var i=0;i<c;i++)
				{
					sendArr.push(tmp.substring(i*a,(i*a)+a));
				}

				for(var i=0;i<sendArr.length;i++)
				{	
					tmpSend="#data/jsonData="+encodeURIComponent(sendArr[i]);
					SHARETHIS.sendArray.push(tmpSend);	
				}
				SHARETHIS.sendArray.push("#data/jsonData=done");	
		    },
			this.sendData=function(){
				xInt=setInterval(SHARETHIS.sendJSON,50);
			},
			this.sendJSON=function(){
					if(SHARETHIS.sendNum<SHARETHIS.sendArray.length){		
						//SHARETHIS.mainstframe.src=SHARETHIS.frameUrl+SHARETHIS.sendArray[SHARETHIS.sendNum];
						//console.log(SHARETHIS.frameUrl+SHARETHIS.sendArray[SHARETHIS.sendNum]);
						window.frames['stframe'].location.replace(SHARETHIS.frameUrl+SHARETHIS.sendArray[SHARETHIS.sendNum]);
					}
					else{
						clearInterval(xInt);

					}
					SHARETHIS.sendNum++;
			},

		    this.defer=function(f){
		        if (this.ready) {
		            f.apply(document, [SHARETHIS]);
		        } else {
		            this.readyList.push(function(){return f.apply(this, [SHARETHIS])});
		        }
		    },
		    this.onReady=function(){
		    	if(SHARETHIS.ready!=true){
			        SHARETHIS.ready = true;		        
			        for (var i = 0; i < SHARETHIS.readyList.length; ++i){
			            	SHARETHIS.readyList[i].apply(document, [SHARETHIS]);
			            }
		    	}
		    },
		    this.load=function(t, opts){
		        var e = document.createElement(t);
		        for (var i in opts) {
		            e.setAttribute(i, opts[i]);
		        }
		        try {
		            document.getElementsByTagName('head')[0].appendChild(e);
		        } catch (err) {
		            document.body.appendChild(e);
		        }
		    },
		    this.hideEmbeds=function() {
		        var embeds = document.getElementsByTagName('embed');
		        for (var i=0; i< embeds.length; i++) {
		            embeds[i].style.visibility = "hidden";
		        }
		    },
		    this.showEmbeds=function() {
		        var embeds = document.getElementsByTagName('embed');
		        for (var i=0; i< embeds.length; i++) {
		            embeds[i].style.visibility = "visible";
		        }
		    },
			
		    this.log=function(event, obj, source) {
				if(event=="pview" && typeof(stLight)!="undefined"){
					return true;
				}
				var lurl = (("https:" == document.location.protocol) ? "https://l." : "http://l.")+"sharethis.com/log?event=";
				if(event=="pview"){
					lurl = (("https:" == document.location.protocol) ? "https://l." : "http://l.")+"sharethis.com/pview?event=";
				}
		        var additional=dbrInfo();
		        if(additional==false){
		        	additional="";
		        }
		        lurl += event;
		        if (source != null) {
		        	lurl += "&source=" + source;
		        }
		        lurl+="&publisher=" + encodeURIComponent(SHARETHIS.meta.publisher)
		            + "&hostname=" + encodeURIComponent(SHARETHIS.meta.hostname)
		            + "&location=" + encodeURIComponent(SHARETHIS.meta.location)
		            + "&url=" + encodeURIComponent(document.location.href)
		            + "&sessionID="+SHARETHIS.sessionID
		            + "&fpc="+SHARETHIS.fpc
		            + "&ts" + (new Date()).getTime() + "." + SHARETHIS.counter++
		            + "&r_sessionID="
				    + "&hash_flag="
				    + "&shr="
		            + "&count="+SHARETHIS.buttonCount
		            +	additional;
		        		         
		        var logger2 = new Image(1,1);
		        logger2.src = lurl;
		        logger2.onload = function(){return;};
		    },
		    this.createSegmentFrame=function(){
				try {
					this.segmentframe = document.createElement('<iframe name="stframe" allowTransparency="true" style="body{background:transparent;}" ></iframe>');
					//try is ie
				} catch(err) {
					//catch is ff and safari
					this.segmentframe = document.createElement('iframe');
				}
				this.segmentframe.id = 'stSegmentFrame';
				this.segmentframe.name = 'stSegmentFrame';
				var wrapper= document.body;
				var frameUrl=(("https:" == document.location.protocol) ? "https://seg." : "http://seg.")+"sharethis.com/getSegment.php?purl="+encodeURIComponent(document.location.href)+"&jsref="+encodeURIComponent(document.referrer)+"&rnd="+(new Date()).getTime();
				this.segmentframe.src=frameUrl;
				this.segmentframe.frameBorder = '0';
				this.segmentframe.scrolling = 'no';
				this.segmentframe.width = '0px';
				this.segmentframe.height = '0px';
				this.segmentframe.setAttribute('style', "display:none;");
				wrapper.appendChild(this.segmentframe);
			},
		    this.getBool= function(variable)    {
			    var vtype;
			    var toReturn;
			    if(variable != null)    {
			        switch(typeof(variable))    {
			            case 'boolean':    
			                vtype = "boolean";
			                return variable;
			                break;
			            case 'number':
			                vtype = "number";
			                if(variable == 0)    
			                    toReturn = false;
			                else toReturn = true;
			                break;
			            case 'string':
			                vtype = "string";
			                if(variable == "true" || variable == "1")
			                    toReturn = true;
			                else if(variable == "false" || variable == "0")
			                    toReturn = false;
			                else if(variable.length > 0)
			                    toReturn = true;
			                else if(variable.length == 0)
			                    toReturn = false;                
			                break;
			        }
			        return toReturn;        
				}
			},
		    		
			this.onStFrameLoad=function(){
				if(SHARETHIS.frameLoaded===false){	
					//SHARETHIS.postEntries();
					SHARETHIS.widgetCalled=true;
					SHARETHIS.frameLoaded=true;
					if(SHARETHIS.st_clicked==true){
						setTimeout("SHARETHIS.st_clicked_o.popup()",1000);								       
		       		}
				}
			}
			
			this.readyTest=function(){
				if(SHARETHIS.frameReady===true && SHARETHIS.ready===true){
					clearInterval(SHARETHIS.readyTestInterval);
					SHARETHIS.onStFrameLoad();
				}
			}
			
			this.sendEvent=function(name,value){
				var tmpSend="#widget/"+name+"="+value;
				try{window.frames['stframe'].location.replace(SHARETHIS.frameUrl+tmpSend);}catch(err){}
			}
	
			this.initialize=function(options){
					if(typeof(options['publisher'])=="undefined" && typeof(stLight)!=="undefined"){
						options.publisher=(typeof(stLight)!=="undefined") ? stLight.publisher:null
					}
					for(o in options){
						options[o]=options[o].toString();
					}	
					if(_thisScript==null){
						var _slist = document.getElementsByTagName('script');
			    		var _thisScript3 = _slist[_slist.length - 1];
			    		var ST_script_src=_thisScript3.src;
					}
					else{
						var ST_script_src=_thisScript.src;
					}
					this.frameUrl=(("https:" == document.location.protocol) ? "https://ws.sharethis.com/secure/index.html" : "http://edge.sharethis.com/share4x/index.0c28e566093cdf4e61347be59e0cb17d.html");
					// this.frameUrl="http://edge.sharethis.com/share4x/index.0c28e566093cdf4e61347be59e0cb17d.html";
					this.postUrl=(("https:" == document.location.protocol) ? "https://ws." : "http://wd.")+"sharethis.com/api/setCache_ws.php";
					this.options = options || {};
					if(this.options["button"]){this.options["button"]=this.getBool(this.options["button"].toString());}
					if(this.options["popup"]){this.options["popup"]=this.getBool(this.options["popup"].toString());}
					if(this.options["embeds"]){this.options["embeds"]=this.getBool(this.options["embeds"].toString());}
					if (this.options.publisher) {
						this.meta.publisher = this.options.publisher;
					}
	
					//var tmp_css=(("https:" == document.location.protocol) ? "https://wd.sharethis.com/button/css/secure.sharethis.f8aeb821aa52b7af5ae4d3675118594c.css" : "http://w.sharethis.com/button/css/sharethis.f8aeb821aa52b7af5ae4d3675118594c.css");
					var tmp_css=(("https:" == document.location.protocol) ? "https://ws.sharethis.com/button/css/sharethis-secure.css" : "http://w.sharethis.com/button/css/sharethis.f8aeb821aa52b7af5ae4d3675118594c.css");
					try{
						if(this.options.css){
						tmp_css=this.options.css.toString();
						}
					}
					catch(err){}
					var css = tmp_css;
					this.load('link', {
						href : (this.options.css ? this.options.css : css),
						rel  : 'stylesheet',
						type : 'text/css'
					});
					

					try {
						this.mainstframe = document.createElement('<iframe name="stframe" allowTransparency="true" style="body{background:transparent;}" ></iframe>');
						this.mainstframe.onreadystatechange=function() {
																	if(SHARETHIS.mainstframe.readyState==="complete"){
																		SHARETHIS.frameReady=true; 
																	}
																	};
						//try is ie
					} catch(err) {
					//catch is ff and safari
						this.mainstframe = document.createElement('iframe');
						this.mainstframe.allowTransparency="true";	
						this.mainstframe.setAttribute("allowTransparency", "true");
						this.mainstframe.onload=function() { SHARETHIS.frameReady=true; };
					}
					this.mainstframe.id = 'stframe';
					this.mainstframe.className = 'stframe';
					this.mainstframe.name = 'stframe';
					this.mainstframe.frameBorder = '0';
					this.mainstframe.scrolling = 'no';
					this.mainstframe.width = '350px';
					this.mainstframe.height = '450px';
					this.mainstframe.style.top = '0px';
					this.mainstframe.style.left = '0px';
					 //this works in ff and safari
					
					
					try {
			            this.fp = document.createElement('<iframe name="stpostframe" style="visibility:hidden"></iframe>');
			        } catch(err) {
			            this.fp = document.createElement('iframe');
			            this.fp.style.visibility = 'hidden';
			        }
			        this.fp.name = 'stpostframe';
			        this.fp.width = '0px';
			        this.fp.height = '0px';
			        this.fp.src = "";
			
					var init = "#init";
					this.newwinfrag = "#popup";
					for (var o in options){
						if(SHARETHIS_tstOptions(o)==true){	
							init = init+"/"+o+"="+encodeURIComponent(options[o]);
							this.newwinfrag = this.newwinfrag+ "/" +o +"-=-" +encodeURIComponent(options[o]);
		            	}
					}
					if(typeof(stLight)!=="undefined"){
						init=init+"/stLight=true";
						this.newwinfrag = this.newwinfrag+"/stLight-=-true";
					}
					this.initstr = init;
					this.sendInit.push(this.initstr);
					this.mainstframe.src=this.frameUrl+this.sendInit[0];
				//	this.sendNum++;
					this.wrapper= document.createElement('div');
					this.wrapper.id = 'stwrapper';
					this.wrapper.className = 'stwrapper';
					this.wrapper.style.visibility = 'hidden';
					this.wrapper.style.top = "-999px";
					this.wrapper.style.left = "-999px";
					this.closewrapper= document.createElement('div');
					this.closewrapper.className = 'stclose';
					this.closewrapper.onclick = stcloseWidget;
					this.wrapper.appendChild(this.closewrapper);
					this.wrapper.appendChild(this.mainstframe);

					this.defer(function(){
						//make button count call
						SHARETHIS.bodyLoaded=true;
						SHARETHIS.log('pview', null, null);
						SHARETHIS.trackTwitter();
						SHARETHIS.trackFB();
						SHARETHIS.createSegmentFrame();
						SHARETHIS.subscribe("click",SHARETHIS.gaTS);

						if(SHARETHIS_TOOLBAR===true){
							document.body.appendChild(SHARETHIS.fp);
						//	SHARETHIS.postPopup(); //posts data to set cache
							SHARETHIS_TOOLBAR_DIV.appendChild(SHARETHIS.wrapper);
						}
						if(SHARETHIS.popupExists===true && SHARETHIS.popupCalled===false){
							document.body.appendChild(SHARETHIS.fp);							
							//SHARETHIS.postPopup();
							SHARETHIS.popupCalled=true;
						}
						if(SHARETHIS.widgetCalled===false && SHARETHIS.widgetExists===true){
							document.body.appendChild(SHARETHIS.wrapper);
							setTimeout(function(){try{
								window.frames['stframe'].location.replace(SHARETHIS.mainstframe.src);
							}catch(err){}},100);
							SHARETHIS.readyTestInterval=setInterval(SHARETHIS.readyTest,250);
						}
						try{
							var stfrm=document.getElementById("stframe");
				        	stfrm.onmouseover=function(){stCancelClose();SHARETHIS.inTime=(new Date()).getTime();};
				        	stfrm.onmouseout=function(){SHARETHIS.outTime=(new Date()).getTime();SHARETHIS.openDuration=(SHARETHIS.outTime-SHARETHIS.inTime)/1000;stClose();};
				        	try{
					        	if(document.body.attachEvent){
					        		document.body.attachEvent('onclick',function(){if(SHARETHIS.buttonClicked==false){SHARETHIS.stopClosing=false;SHARETHIS.openDuration=0;stClose(100);}});
					    		}else{
					    			document.body.setAttribute('onclick','if(SHARETHIS.buttonClicked==false){SHARETHIS.stopClosing=false;SHARETHIS.openDuration=0;stClose(100);}');
					    		}
				        	}catch(err){
				        		document.body.onclick=function(){if(SHARETHIS.buttonClicked==false){SHARETHIS.stopClosing=false;SHARETHIS.openDuration=0;stClose(100);}}; //close widget instantly on body click	
				        	}
				        	
						}catch(err){}
					});
					if (typeof(window.addEventListener) != 'undefined') {
			            window.addEventListener("load", this.onReady, false);
			        } else if (typeof(document.addEventListener) != 'undefined') {
			            document.addEventListener("load", this.onReady, false);
			        } else if (typeof window.attachEvent != 'undefined') {
			            window.attachEvent("onload", this.onReady);
			        }
					if(typeof(__st_loadLate)=="undefined"){
						if (typeof(window.addEventListener) != 'undefined') {
						    window.addEventListener("DOMContentLoaded", this.onReady, false);
						} else if (typeof(document.addEventListener) != 'undefined') {
						    document.addEventListener("DOMContentLoaded", this.onReady, false);
						}
					}
					
					setTimeout(function(){
						for (var s in SHARETHIS.shareables) {
							if (SHARETHIS.shareables[s].options != undefined) {
								switch (SHARETHIS.shareables[s].options.style) {
								case 'vertical':
									var ifr;
									try {
										ifr = document.createElement('<iframe allowTransparency="true"></iframe>');
									} catch(err) {
										ifr = document.createElement('iframe');
										ifr.allowTransparency="true";
										ifr.setAttribute("allowTransparency", "true");
									}
									ifr.className = 'stcounter';
									ifr.frameBorder = '0';
									ifr.scrolling = 'no';
									ifr.width = '57px';
									ifr.height = '39px';
									ifr.src = (("https:" == document.location.protocol) ? "https://ws." : "http://wd.")+"sharethis.com/button/vcounter.php?url=" + encodeURIComponent(SHARETHIS.shareables[s].properties.url);
									SHARETHIS.shareables[s].button.parentNode.appendChild(ifr);
									break;
								case 'horizontal':
									var ifr;
									try {
										ifr = document.createElement('<iframe allowTransparency="true"></iframe>');
									} catch(err) {
										ifr = document.createElement('iframe');
										ifr.allowTransparency="true";
										ifr.setAttribute("allowTransparency", "true");
									}
									ifr.className = 'stcounter';
									ifr.frameBorder = '0';
									ifr.scrolling = 'no';
									ifr.width = '37px';
									ifr.height = '18px';
									ifr.src = (("https:" == document.location.protocol) ? "https://ws." : "http://wd.")+"sharethis.com/button/hcounter.php?url=" + encodeURIComponent(SHARETHIS.shareables[s].properties.url);
									SHARETHIS.shareables[s].button.parentNode.appendChild(ifr);
									break;
								}
							}
						}
					}, 1000);
				}
			this.initialize(options);
		}

		var closetimeout;

		function stClose(timer){
			if(!timer){
				timer=1000;
			}
			if(stautoclose==true && SHARETHIS_TOOLBAR==false){
				if(SHARETHIS.openDuration<0.5 && SHARETHIS.stopClosing==false){
					closetimeout = setTimeout("stcloseWidget()",timer);
				}else{
					SHARETHIS.stopClosing=true;
				}
			}
		}

		function stCancelClose() {
			clearTimeout(closetimeout);
        	SHARETHIS.buttonClicked=true;
        	setTimeout(function(){SHARETHIS.buttonClicked=false;},100);//manu
		}

		function stcloseWidget(){
			if(typeof(SHARETHIS.grayOut)!=="undefined"){
				SHARETHIS.grayOut(false);
			}
			st_showing = false;
			SHARETHIS.wrapper.style.visibility ='hidden' ;
			SHARETHIS.mainstframe.style.visibility = 'hidden';
			SHARETHIS.wrapper.style.top = "-999px";
			SHARETHIS.wrapper.style.left = "-999px";
			SHARETHIS.showEmbeds();
			SHARETHIS.sendEvent("screen","home");
			SHARETHIS.sendArray=[];//reset send array to be blank
		}
		
		function SHARETHIS_tstOptions(tstStr){
			var opt_arr=['type','title','summary','content','url','icon','category','updated','published','author','button','onmouseover','buttonText','popup','offsetLeft','offsetTop','embeds','autoclose','publisher','tabs','services','charset','headerbg','inactivebg','inactivefg','linkfg','style','send_services','exclusive_services','post_services','headerfg','headerType','headerTitle','sessionID','tracking','fpc','ads','pUrl','publisher','doneScreen','jsref','publisherGA'];
			var retVal=false;
				for(var i=0;i<opt_arr.length;i++){
					if(tstStr===opt_arr[i]){
					 retVal=true;
					}
				}
			return retVal;
		}
		

		function SHARETHIS_TEST(){
			SHARETHIS.mainstframe.src = SHARETHIS.frameUrl+"#test";
		}
		//main function for fpc cookie handling
		function _stFpc(){
			if(!document.domain || document.domain.search(/\.gov/) >0){
				return false;
			}
			var cVal=_stGetFpc("__unam");
			if(cVal==false){
				var bigRan=Math.round(Math.random() * 2147483647);
				bigRan=bigRan.toString(16);
				var time=(new Date()).getTime();
				time=time.toString(16);
				var guid="";
				var hashD=(typeof(_stDomain)=="undefined")?_stGetD() :_stDomain ;
				hashD=hashD.split(/\./)[1];
				if(!hashD){
					return false;
				}
				guid=_stdHash(hashD)+"-"+time+"-"+bigRan+"-1";
				cVal=guid;
				_stSetFpc(cVal);
			}else{
				var cv=cVal;
				var cvArray = cv.split(/\-/);
				if(cvArray.length==4){
					var num=Number(cvArray[3]);
					num++;
					cv=cvArray[0]+"-"+cvArray[1]+"-"+cvArray[2]+"-"+num;
					cVal=cv;
					_stSetFpc(cVal);
				}
			}			
			return cVal;
		}
		//sets fpc with value and exires in 9 months
		function _stSetFpc(value) {
			var name="__unam";
			var current_date = new Date;
			var exp_y = current_date.getFullYear();
			var exp_m = current_date.getMonth() + 9;// set cookie for 9 months into future
			var exp_d = current_date.getDate();
			var cookie_string = name + "=" + escape(value);
			if (exp_y) {
				var expires = new Date (exp_y,exp_m,exp_d);
				cookie_string += "; expires=" + expires.toGMTString();
			}
			var domain=(typeof(_stDomain)=="undefined")?_stGetD() :_stDomain ;
			cookie_string += "; domain=" + escape (domain)+";path=/";
			document.cookie = cookie_string;
		}
		//resolves domain for use in cookie
		function _stGetD(){
			var str = document.domain.split(/\./)
			var domain="";
			if(str.length>1){
			    domain="."+str[str.length-2]+"."+str[str.length-1];
			}
			return domain;
		}
		//gets cookie value with name or returns false
		function _stGetFpc(cookie_name) {
			var results = document.cookie.match('(^|;) ?' + cookie_name + '=([^;]*)(;|$)');
			if (results)
				return (unescape(results[2]));
			else
				return false;
		}
		//hashes dd and returns value
		function _stdHash(dd) {
			var hash=0,salt=0;
		 	for (var i=dd.length-1;i>=0;i--) {
			  var charCode=parseInt(dd.charCodeAt(i));
			  hash=((hash << 8) & 268435455) + charCode + (charCode << 12);
			  if ((salt=hash & 161119850)!=0){hash=(hash ^ (salt >> 20))};
			}
		 return hash.toString(16);
		}
		
		var _thisScript=null;
		function getShareThisScript(){
			var _slist = document.getElementsByTagName('script');
			var rScript=null;
			for(var i=0;i<_slist.length;i++)
			{	
				var temp=_slist[i].src;
				if( temp.search(/.*sharethis.*\/button/) >=0 ){	
					rScript=_slist[i];
				}
				else if(temp.search(/.*sharethis.*\/widget\/\?/) >=0 || temp.search(/.*sharethis.*\/widget\/index/) >=0 || temp.search(/.*sharethis.*\/widget\/\?&/) >=0){	
					rScript=_slist[i];
				}
			}
			return rScript;			
		}
		
		function dbrInfo(){
			var dbr=document.referrer;
			if(dbr && dbr.length>0){
				var domainReg=/\/\/.*?\//; //something between //something/
				var matches=dbr.match(domainReg);
				if(typeof(matches)!=="undefined" && typeof(matches[0])!=="undefined"){
					var reg=new RegExp(document.domain,'gi');
					if(reg.test(matches[0])==true){
						return false;
					}
				}
				var re1=/(http:\/\/)(.*?)\/.*/i;
				var re2=/(^.*\?)(.*)/ig;
				var retVal="";
				var domain=dbr.replace(re1, "$2");
				var reg=new RegExp(domain,'gi');
				if(domain.length>0){retVal+="&refDomain="+domain;}
				else{return false;}
				var query=dbr.replace(re2,"$2");
				if(query.length>0){retVal+="&refQuery="+encodeURIComponent(query);}
				return retVal;
			}
			else{
				return false;
			}
		}
		
		
		_thisScript=getShareThisScript();	
		if (_thisScript){
			SHARETHIS = new ShareThis(parseQueryString(_thisScript.src));
		} else {
			SHARETHIS = new ShareThis();
		}
		//SHARETHIS.log('pview', null, null);

	} // End !SHARETHIS

	// Don't run if called from HEAD, or if toolbar has been run
	
	var _slist = document.getElementsByTagName('script');
	var _thisScript2 = _slist[_slist.length - 1];
	if (_thisScript2 && _thisScript2.parentNode.tagName != "HEAD" && typeof(_sttoolbar) == "undefined") {
		var obj = SHARETHIS.addEntry();
	}

	SHARETHIS.trackFB=function(){
		try {
		    if (FB && FB.Event && FB.Event.subscribe) {
		      FB.Event.subscribe('edge.create', function(targetUrl) {
		    	  SHARETHIS.trackShare("fblike_auto",targetUrl);
		    	  SHARETHIS.callSubscribers("click","fblike",targetUrl);
		      });
		      FB.Event.subscribe('edge.remove', function(targetUrl) {
		    	  SHARETHIS.trackShare("fbunlike_auto",targetUrl);
		    	  SHARETHIS.callSubscribers("click","fbunlike",targetUrl);
		      });
		      FB.Event.subscribe('message.send', function(targetUrl) {
		    	  SHARETHIS.trackShare("fbsend_auto",targetUrl);
		    	  SHARETHIS.callSubscribers("click","fbsend",targetUrl);
		      });
		    }
		  }catch(err){}
	};

	SHARETHIS.trackTwitter=function(){
		try {
		    if (twttr && twttr.events && twttr.events.bind) {
		    	twttr.events.bind('click',function(){SHARETHIS.trackTwitterEvent("click");SHARETHIS.callSubscribers("click","twitter");}); 
		        twttr.events.bind('tweet',function(){SHARETHIS.trackTwitterEvent("tweet");}); 
		        twttr.events.bind('retweet',function(){SHARETHIS.trackTwitterEvent("retweet");SHARETHIS.callSubscribers("click","retweet");}); 
		        twttr.events.bind('favorite',function(){SHARETHIS.trackTwitterEvent("favorite");SHARETHIS.callSubscribers("click","favorite");}); 
		        twttr.events.bind('follow',function(){SHARETHIS.trackTwitterEvent("follow");SHARETHIS.callSubscribers("click","follow");}); 
		    }
		  }catch(err){}
	};

	SHARETHIS.trackTwitterEvent=function(name){
		SHARETHIS.trackShare("twitter_"+name+"_auto");
	};
	
	SHARETHIS.trackShare=function(destination,inUrl){
		if(typeof(inUrl)!=="undefined" || inUrl!==null){
			var outUrl=inUrl;
		}else{
			var outUrl=document.location.href;
		}
		var url = (("https:" == document.location.protocol) ? "https://ws" : "http://wd")+".sharethis.com/api/sharer.php?destination="+destination+"&url="+encodeURIComponent(outUrl);
		url+= "&publisher="+ encodeURIComponent(SHARETHIS.options.publisher);
		url+= "&hostname="+ encodeURIComponent(SHARETHIS.meta.hostname);
		url+= "&location="+ encodeURIComponent(SHARETHIS.meta.location);
		url+= "&ts=" + (new Date()).getTime();
		url+= "&sessionID="+SHARETHIS.sessionID;
		url+= "&fpc="+SHARETHIS.fpc;	
		var mImage = new Image(1,1);
		mImage.src = url;
		mImage.onload = function(){return;};
	};
	SHARETHIS.messageReceiver=function(event){
		if(event && (event.origin=="http://edge.sharethis.com" || event.origin=="https://ws.sharethis.com")){
			var data=event.data;
			data=data.split("|");
			if(data[0]=="ShareThis" && data.length>2){
				var url= (typeof(data[3])=="undefined") ? document.location.href : data[3];
				SHARETHIS.callSubscribers(data[1],data[2],url);
			}
				
		}
	};
	
	SHARETHIS.subscribe=function(evnt,fun){
		if(evnt=="click"){
			SHARETHIS.clickSubscribers.push(fun);
		}
	};

	SHARETHIS.callSubscribers=function(evnt,service,url){
		if(evnt=="click"){
			for(var i=0;i<SHARETHIS.clickSubscribers.length;i++){
				SHARETHIS.clickSubscribers[i]("click",service,url); //their function must accept event,service 
			}
		}
	};
	SHARETHIS.gaTS=function(type,service,url){
		if(service=="fblike"){
			network="ShareThis_facebook";
			action="Like";
		}else if(service=="fbunlike"){
			network="ShareThis_facebook";
			action="UnLike";
		}else if(service=="fbsend"){
			network="ShareThis_facebook";
			action="Send";
		}else if(service=="twitter"){
			network="ShareThis_twitter";
			action="Share";
		}else if(service=="retweet"){
			network="ShareThis_twitter";
			action="ReTweet";
		}else if(service=="favorite"){
			network="ShareThis_twitter";
			action="Favorite";
		}else if(service=="follow"){
			network="ShareThis_twitter";
			action="Follow";
		}else{
			network="ShareThis_"+service;
			action="Share";
		}
		if( typeof(_gaq) != "undefined") {
			_gaq.push(['_trackSocial', network,action,url]);
		}
	};
	
	//Message Receiver
	if (typeof(window.addEventListener) != 'undefined') {
	    window.addEventListener("message", SHARETHIS.messageReceiver, false);
	} else if (typeof(document.addEventListener) != 'undefined') {
	    document.addEventListener("message", SHARETHIS.messageReceiver, false);
	}else if (typeof window.attachEvent != 'undefined') {
	    window.attachEvent("onmessage", SHARETHIS.messageReceiver);
	}


}
catch(err){
}

