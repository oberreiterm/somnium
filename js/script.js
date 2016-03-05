(function($) {					   
	
$(window).ready(function(){
	$('#latest_posts').click(function(){
		var that = $(this);
		that.addClass('active');
		that.closest('.author_info_box').find('#latest_box').css({'display':'block'});
		that.closest('.author_info_box').find('#about_box').css({'display':'none'});
		that.siblings().removeClass('active');
	});
	$('#about_author').click(function(){
		var that = $(this);
		that.addClass('active');
		that.closest('.author_info_box').find('#about_box').css({'display':'block'});
		that.closest('.author_info_box').find('#latest_box').css({'display':'none'});
		that.siblings().removeClass('active');
	});
	if ($('#social_author').is(':empty')){
		$('.author_box').css({'min-height':'126px'});
	}
	
	$( ".postw_item_inner" ).hover(function() {
		var  object = $(this).find(".postw_descr" );
		var outerH = object.outerHeight();
		if(outerH <= 45){ outerH = 0;}
		object = 255- object.outerHeight() +45;
		$(this).find(".postw_descr" ).css({top:object+"px"});
		$(this).parent().siblings().find(".postw_descr" ).css({top:"255px"});
	},function() {
		$(this).find(".postw_descr" ).css({top:"255px"});
	});
	var dateH = $(".wid-first > a > p").outerHeight(true);
	$(".wid-first .date_wid").css({height:dateH+"px"});

});

	
$(window).ready(function(){ 	
	
	if ($('.lang_sw ul').is(':empty')){
		$('.lang_sw').css({'display':'none'});
		$('.butt').css({'display':'none'});
	}
	else {	   
		var myVar;				   
		var myVar2;					   
		$('.show_but').click(function(){
			$('.show_but').fadeOut();
			$('.lang_sw').fadeIn();					   
			$('.hide_but').fadeIn();				   
		});				   

		myVar2 = setTimeout( function(){
			$('.hide_but').fadeOut();
			$('.lang_sw').fadeOut();						   
			$('.show_but').fadeIn();
		  }  , 7000 );		 

		$('.show_but').click(function() {
			myVar = setTimeout( function(){ 
			$('.hide_but').fadeOut();
			$('.lang_sw').fadeOut();						   
			$('.show_but').fadeIn();
		  }  , 4500 );				   
		});	
	
		$('.hide_but').click(function() {
			clearTimeout(myVar);
			clearTimeout(myVar2);
			$('.hide_but').fadeOut();
			$('.lang_sw').fadeOut();						   
			$('.show_but').fadeIn();	
		});	
	
	}
});	
$(window).ready(function(){ 
	if($('#wpadminbar').length>0){
	$('#thsp-sticky-header').css({top:32});
	}
});	

	/*$('.inner').hover(function(){
		$(this).fadeIn();
	}, function() {
		//$(this).animate({ opacity:0 });
		$(this).fadeOut();
	});*/
	$(window).ready(function(){ 
		$('.single-img-ud').each(function(){
			var tldr = ($(this).innerHeight() - $(this).find('.ref-but').innerHeight())/2;	   
		 	$(this).find('.ref-but').css({'margin-top':tldr});
		});	   
		$('.ref-block').each(function(){		   
			$(this).siblings().find('.ref-img').css({'height':$(this).innerHeight()});
			$(this).siblings().find('.ref-but').css({'margin-top':($(this).siblings().find('.ref-img').innerHeight() - $(this).siblings().find('.ref-but').outerHeight())/2});
	});

	/*
	var winHH = $( window ).height();
	var slHH = $('#thsp-sticky-header').css('height').replace('px', '');
	var resHH = winHH - slHH;

	$('.cst-container').css({'height': resHH});		
	$('.button-hoSec').css({'height': resHH});	
	*/
});
		
	$(window).resize(function(){ 
	/*				   
	var winHH = $( window ).height();
	var slHH = $('#thsp-sticky-header').css('height').replace('px', '');
	var resHH = winHH - slHH;

	$('.cst-container').css({'height': resHH});		
	$('.button-hoSec').css({'height': resHH});	

	*/			   

	});				
	
 $(function() {
  $('a[href*=#]:not([href=#])').click(function() {
  console.log( location.hostname +'  ' +this.hostname);
	if(this.parents('.comments-area') != ''){
		if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
		  var target = $(this.hash);
		  target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
		  if (target.length) {
			$('html,body').animate({
			  scrollTop: target.offset().top - 100 
			}, 1000);
			return false;  
		  }
		}
	}
  });
});

$('.somnium-scroll-top').click(function(){
	$('html,body').animate({
			  scrollTop: 0
	}, 1000);
});												   
													   
})(jQuery);


var tag = document.createElement('script');

        tag.src = '//www.youtube.com/iframe_api';
        var firstScriptTag = document.getElementsByTagName('script')[0];
        firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
        var player;
        function onYouTubeIframeAPIReady() {
            player = new YT.Player('ytplayer', {
                events: {
                    'onReady': onPlayerReady
                }
            });
        }

        function onPlayerReady() {
            player.playVideo();
            player.mute();
        }	


var c =0;
function spin_call (that){
		
		
			
		setTimeout(function(){ that.find('.base').css({'opacity':1}); }, 500);
		var dated = new Date();
		var timer= dated.getTime();
		var stop = 0;
		var tim2 = 0;
		var bck='';
		
					if(that.closest('.section_wid').css('background-image') === undefined || that.closest('.section_wid').css('background-image')=='none' ){
						bck = 'white';
					}else{
						bck = that.closest('.section_wid').css('background-image');
					}
					//console.log(that.closest('.section_wid').css('background-image'));		
					that.find('.base3').css({'background':bck});
					var txtsp = that.find('.round').children('p').text();
					txtsp = txtsp.replace ( /[^\d.]/g, '' );
					txtsp = 360*(txtsp/100);
					jQuery('<style type=\'text/css\'>@keyframes rotW'+c+' {0% {transform:rotate(0deg);}100% {transform:rotate('+txtsp+'deg);}}</style>').appendTo("head");
					//console.log(txtsp);
					var duration = parseInt(that.find('.base2').attr("data-spin"));
					duration = duration || 0;
					//durArray[c]= duration;
					//console.log(duration);
					that.find('.base2').css({'animation': 'rotW'+c+' '+duration+'s cubic-bezier(0.85, 0, 0.3, 1) forwards'});
					c= c+1;
					
		
		setInterval(function(){ 
			
			var dat = new Date();
			tim2 =  dat.getTime();
					if((tim2-timer)<duration*1000){ //get duration from PHP
					var tr = that.find('.base2').css('transform');
					var vals = tr.split('(')[1].split(')')[0].split(',');
					var a = vals[0];var b = vals[1];var c = vals[2];var d = vals[3];
					var angle = Math.round((Math.atan2(b, a) * (180/Math.PI))*100)/100;

					//console.log(angle);

					if(angle>0){
						that.find('.base3').css({'display':'block'});
						that.find('.base4').css({'display':'none'});			   

					}
					else{
						that.find('.base3').css({'display':'none'});
						that.find('.base4').css({'display':'block'});  
					}	
					
					}
		
		},20);	
		
}


(function($) {
		
		function getPos() {

			var latlong = $('#gmaps').attr('data-maps');
			var latlongArr = latlong.split('/');
			var resLL= {lat: parseFloat(latlongArr[0]), lng: parseFloat(latlongArr[1])};
			
			return resLL;
		}
		
		function getZoom() {
		
			var latlong = $('#gmaps').attr('data-maps');
			var latlongArr = latlong.split('/');
			var zzz = parseInt(latlongArr[2]);
			
			return zzz;
		}
		
		
			
		function initMap() {
		  var myLatLng = getPos();
		  var zoomV = getZoom();
		  var hueHue = $('#gmaps').attr('data-maps-hue');
		  var satur = parseInt($('#gmaps').attr('data-maps-saturation'));
		var mapType = $('#gmaps').attr('data-map-type');
			var styleArray = [
			{
			  featureType: "all",
			  stylers: [
			  { hue: hueHue },
			   { saturation: satur }
			  ]
			}
		  ];
		
		  // Create a map object and specify the DOM element for display.
			if(mapType=='Satellite'){
				var map = new google.maps.Map(document.getElementById('gmaps'), {
					center: myLatLng,
					scrollwheel: false,
					mapTypeId: google.maps.MapTypeId.SATELLITE,
					styles: styleArray,
					zoom: zoomV,
				});
			}else if(mapType=='Hybrid'){
				var map = new google.maps.Map(document.getElementById('gmaps'), {
					center: myLatLng,
					scrollwheel: false,
					mapTypeId: google.maps.MapTypeId.HYBRID,
					styles: styleArray,
					zoom: zoomV,
				});
			}else if(mapType=='Terrain'){
				var map = new google.maps.Map(document.getElementById('gmaps'), {
					center: myLatLng,
					scrollwheel: false,
					mapTypeId: google.maps.MapTypeId.TERRAIN,
					styles: styleArray,
					zoom: zoomV,
				});
			}else{
				var map = new google.maps.Map(document.getElementById('gmaps'), {
					center: myLatLng,
					scrollwheel: false,
					styles: styleArray,
					zoom: zoomV,
				});
			}

		  // Create a marker and set its position.
		  var marker = new google.maps.Marker({
			map: map,
			position: myLatLng,
			
		  });
		}
		
		$(window).load(function(){
	
		if($('#gmaps').length>0){initMap();}		
		});

		
		
		
	$(window).ready(function(){

		
	if($('.wid-post').length>0){
	
			$('.wid-post').each(function( index ) {
				$(this).hover(function() {
					var in2 = index +1;
					$('.wid-post-img:nth-child('+in2+')').css({'opacity':1, 'z-index':3});
					$('.wid-post-img:not(:nth-child('+in2+'))').css({'opacity':0, 'z-index':1});

					$(this).addClass('hovered_tit');
					$(this).children('.wid-img-poi').css({'opacity':1});

					$('.wid-post').not(this).children('.wid-img-poi').css({'opacity':0});
					$('.wid-post').not(this).removeClass('hovered_tit');

					//$('.wid-post-img:nth-child('+in2+')').addClass('hovered_tit');
					//$('.wid-post-img:not(:nth-child('+in2+'))').removeClass('hovered_tit');	
				});

			});

			var hn = $('.wid-news').outerHeight() - parseInt($('.wid-images').css('padding-bottom')) +7;		$('.wid-post-img').css({'height':hn});
	}
	});
	
	$(window).load(function(){
	
	
	if($('.owl-wrapper-outer').length>0){
	var xyc = ($('.owl-wrapper-outer').innerHeight() - $('.arrow-owl').innerHeight())/2;
	$('.arrow-owl').css({marginTop:xyc});
	}
	});
	
	$(window).load(function(){
		var ln =$('.wid-post-img').length;
		var heiM, heiI, res, ln2, curr, currds;
		
		for(i=0;i<ln;i++){
			ln2=i+1;			   
			curr = 	$('.wid-post-img:nth-child('+ln2+')');
			currds = $('.wid-post-img:nth-child('+ln2+') .wid-post-dsc');		
			heiM =curr.innerHeight();
			heiI = currds.innerHeight();		   
			res = heiM - heiI;
			currds.css({'padding-top':res});
		}
	});	
	
	

	var orbit_call = function () {
		if($('.orbit_class').length>0){
		var ttr = $('.framec').innerWidth()/2 +25;
		$('.orbit').css({'max-width':ttr});
		var trrr = $('.framec').innerWidth();
		$('.framec').css({'height':trrr});

		var tt = ($('.framec').innerWidth() - parseFloat($('.centerC').css('width')))/2;
		$('.centerC').css({'left':tt});
		tt = tt + ($('.centerC').outerWidth())/2;
		$('.o_line').css({'left':tt});

		var tty = ($('.framec').innerHeight() - parseFloat($('.centerC').css('height')))/2;
		$('.centerC').css({'top':tty});
		tty = tty + ($('.centerC').outerHeight())/2;
		$('.o_line').css({'top':tty});

		var orb_ln = $('.orbit').length;
		var sec = [];
		var radius = [];
		var widx = [];
		var heix = [];
		var rad_str =[];
		var orb_str =[];
		var cc_str = $('.orbit_class').attr( "data-orbit" );
		cc_str = cc_str.split('-');
		
		for (i=0; i<orb_ln; i++){
			cc_str[i] = parseInt(cc_str[i]);					
			iCC = i+1;						
			orb_str[i] = $('.orbit:nth-child('+iCC+')').attr( "data-orbit" );
			rad_str[i] = $('.orbit:nth-child('+iCC+')').attr( "data-orbit" );							
			sec[i] = orb_str[i].split('s')[1];
			radius[i] = rad_str[i].split('s')[2];

		}


		var cx = parseFloat($('.centerC').css('left'));
		var cy = parseFloat($('.centerC').css('top'));

		var cxc = cx + parseFloat($('.centerC').css('width'))/2;
		var cyc = cy + parseFloat($('.centerC').css('height'))/2;

		$('.orbit').css({'left':cxc+'px'});
		//$('.orbit').css({'top':cyc+'px'});  

		
		for (i=0; i<orb_ln; i++){
			iCC = i+1;			  
			widx[i] = parseFloat($('.orbit:nth-child('+iCC+')').css('width'))/2;
			heix[i] = parseFloat($('.orbit:nth-child('+iCC+')').css('height'))/2;
			$('.o_line:nth-child('+iCC+')').css({'width':radius[i]-widx[i]});
			$('.orbit:nth-child('+iCC+')').css({'width':radius[i]});

			var ccc =  (parseFloat($('.centerC').css('height')) - parseFloat($('.orbit:nth-child('+iCC+')').css('height')))/2;
			$('.orbit:nth-child('+iCC+')').css({'top':(cy+ccc)+'px'}); 
			//console.log(parseFloat($('.centerC').css('height'))+'  '+parseFloat($('.orbit:nth-child('+iCC+')').css('height'))+'  cy '+cy+' ccc '+ccc);

			if (cc_str.indexOf(iCC) > -1){
				$('.o_line:nth-child('+iCC+')').css({'animation': 'spinCC ' +sec[i] +'s linear infinite'});
				$('.orbit:nth-child('+iCC+')').css({'animation': 'orbitCC ' +sec[i] +'s linear infinite'});
				$('.orbit:nth-child('+iCC+') .content_holder').css({'animation': 'orbit2CC ' +sec[i] +'s linear infinite'});
			}
			else{
				$('.o_line:nth-child('+iCC+')').css({'animation': 'spin ' +sec[i] +'s linear infinite'});
				$('.orbit:nth-child('+iCC+')').css({'animation': 'orbit ' +sec[i] +'s linear infinite'});
				$('.orbit:nth-child('+iCC+') .content_holder').css({'animation': 'orbit2 ' +sec[i] +'s linear infinite'});
			}

		}
}
	};


	$(window).load(orbit_call);
	$(window).resize(orbit_call);						   

						   
					
$(window).load(function(){

	if($( window ).width() >= 991 && $('.like-box').attr("float")=="true" ){
			var stad = $('#secondary ');
			if (stad.length != 0) {
				var windw = this;
				var sta = $('.footer_class');
				if (sta.length != 0) {
					var stp = sta.offset();
					var dataHeight = parseInt($('.like-box').attr("data-height")) || 250;
					stp= stp.top - dataHeight - 100 ;
					var startT = $('#secondary ').offset().top -100 ;
					//console.log(dataHeight);
					var startT2 = $('#secondary ').outerHeight();
					//console.log(startT + "  "+ startT2+"  " + stp);
					startT3 = startT + startT2;
				}
				$.fn.followTo = function ( pos ) {
					var $this = this,
						$window = $(windw);

					$window.scroll(function(e){
						if ($window.scrollTop() < startT3) {
							   $('.like-box').css({position: 'relative',top: 0,right:0});}
						if ($window.scrollTop() > startT3 && $window.scrollTop() < stp && $(window).width() > 1000) {
							   $('.like-box').css({position: 'relative',top: $window.scrollTop() - startT3});}

						if ($window.scrollTop() > stp ) {
							$('.like-box').css({position: 'relative',top: -10000});}
						});
				}

				$('.like-box').followTo(stp);
			}
	}
});
						   
						   
})(jQuery);


(function($){


$(document).ready(function() {
 
	var owl = $("#owl-demo");
	var iNumber = parseInt($(".car_container").attr('data-elements-number'));
	var iTime = parseInt($(".car_container").attr('data-autoplay-time'));
  owl.owlCarousel({
      items : iNumber, //10 items above 1000px browser width
      itemsDesktop : [1000,4], //5 items between 1000px and 901px
      itemsDesktopSmall : [900,3], // betweem 900px and 601px
      itemsTablet: [600,2], //2 items between 600 and 0
      itemsMobile: [600,2], // itemsMobile disabled - inherit from itemsTablet option
		autoPlay : iTime,
 navigation:true,
navigationText : ['<div class="arrow-owl owl-nav fa fa-chevron-left"></div>','<div  class="arrow-owl owl-nav fa fa-chevron-right"></div>']

  });
 
  // Custom Navigation Events
  $(".next").click(function(){
    owl.trigger('owl.next');
  })
  $(".prev").click(function(){
    owl.trigger('owl.prev');
  })

 
});


$(document).ready(function(){
	var timing = parseInt(customizer.slider_time);
	var currentIndex = 0,
	items = $('.cst-sl');
	itemAmt = items.length;
	function cycleItems() {
		var item = $('.cst-sl').eq(currentIndex);
		var itemN = $('.cst-sl').not(':eq(currentIndex)');
		itemN.fadeOut();
		//itemN.css({zIndex: '1'});
		item.fadeIn();		
	}

	var autoSlide = setInterval(function() {
	  currentIndex += 1;
	  if (currentIndex > itemAmt - 1) {
		currentIndex = 0;
	  }
	  cycleItems();
	}, timing);


	$('.cst-next').click(function() {
	  clearInterval(autoSlide);
	  currentIndex += 1;
		if (currentIndex > itemAmt - 1) {
		currentIndex = 0;
	  }
	  cycleItems();
	});

	$('.cst-prev').click(function() {
	  clearInterval(autoSlide);
	  currentIndex -= 1;
	  if (currentIndex < 0) {
		currentIndex = itemAmt - 1;
	  }
	  cycleItems();
	});
			   
					   
});				   
					   
})(jQuery);		
		

		
(function($) {

	
	function HeaderRecalculate(){
			
			var AmenuW = $("#fixed-header-menu").outerWidth(true), titleW = $('#fixed-header-name').outerWidth(true);
			var innerW = $("#fixed-header-inner").css("max-width"), MenuLN = $("#fixed-header-menu > .menu-item:visible").length, menuW, F2;
			var searchForm = 0;
			if($('.search-form-header').length>0){
				searchForm = $('.search-form-header').outerWidth(true);
				//console.log(searchForm);
			}
			innerW = parseInt(innerW);
			if ($(window).width() < innerW) {
				menuW = $(window).width() - titleW -30 - searchForm;
			}
			if ($(window).width() > innerW) {
				menuW = innerW - titleW - 30 - searchForm;
			}
			//console.log(menuW);
			$("#fixed-header-menu").css({width: menuW});
			F2 = (menuW - AmenuW)/(MenuLN*2);
			//console.log('Menu space:' + ' ' + innerW + ' ' + titleW +  ' ' + menuW + ' ' + AmenuW + ' ' + F2+'  '+$(window).width());
			//console.log(MenuLN);
		//	$("#fixed-header-menu > li > a").css({paddingLeft: F2});
		//	$("#fixed-header-menu > li > a").css({paddingRight: F2});
	}
	
	
	function titleAdjust(){
		if( $('.sidebar-left-side').length > 0 && $(window).outerWidth() > 991){
			var divWid = $('.outer-container-title').outerWidth();
			var wid2 = 30;
			var wid1 = (divWid*0.25) + wid2*0.75;
			$('.outer-container-title').css({'padding-left':wid1});
		}
	}
	
	function switchLeftSidebar(){
		if( $('.sidebar-left-side').length > 0 && $(window).outerWidth() <= 991){
			var sidebar = $('.sidebar-left-side').contents();
			$('.sidebar-left-side').remove();
			sidebar.insertAfter( ".content-left-wrap" );
		
		}
	}
	
	function subMenuRecalculate(){
		var widHd = $("#fixed-header-menu .sub-menu").siblings('a').outerWidth();
		$("#fixed-header-menu .sub-menu").css({'width':widHd});
	}
	
	$(window).ready(function(){
		switchLeftSidebar();
		HeaderRecalculate();
		titleAdjust();
		subMenuRecalculate();
		if($(window).width() > 991){
		$('#fixed-header-menu .sub-menu').parent().hover(function(){
				$("#fixed-header-menu .sub-menu").stop().slideToggle(300);
				$('#fixed-header-menu .sub-menu').parent().children('a').toggleClass( "highlight-border" );
		});
			}else{
				$("#fixed-header-menu .sub-menu").css({'display':'block'});
			}
		


		
});
	$(window).resize(function () {
		$("#fixed-header  li a").css({paddingLeft: 0});
		$("#fixed-header  li a").css({paddingRight: 0});
		HeaderRecalculate();
		titleAdjust();
		subMenuRecalculate();
	});
	$(window).load(function(){	
	
	});




$(window).ready(function() {
	 $('[data-toggle="tooltip"]').tooltip();   
	 
	 
	function getRootUrl() {
		return window.location.origin?window.location.origin+'/':window.location.protocol+'/'+window.location.host+'/';
	}
	var locale = document.documentElement.lang.substring(0,2);
	var FnS= getRootUrl(), baseURL = FnS.toString(), windowHref = window.location.href;
	var Lang1 = locale +'/#';
	var Lang11 = locale +'/';
	
	var Lang1NL = '#';
	var Lang11NL = '';
	
	var LangPlain1 = '?lang='+locale + '#'
	var LangPlain11 ='?lang='+locale
	
	Lang1 = baseURL.concat(Lang1);
	Lang11 = baseURL.concat(Lang11);
	
	Lang1NL = baseURL.concat(Lang1NL);
	Lang11NL = baseURL.concat(Lang11NL);
	
	LangPlain1 = baseURL.concat(LangPlain1);
	LangPlain11 = baseURL.concat(LangPlain11);
	
	//console.log(baseURL+' '+Lang1+ '   '+Lang1NL+' ' + ' '+window.location.href);
	if (windowHref.indexOf(Lang1) < 0 && windowHref !== Lang11 || windowHref.indexOf(LangPlain1) < 0 && windowHref !== LangPlain11 || windowHref.indexOf(Lang1NL) < 0 && windowHref !== Lang11NL ){
		$('.menu-item').children().click(function() {
			var a_href = $(this).attr('href');
			window.location.href = a_href;	
		});
	}
	

	$(window).scroll(function () {
			if (windowHref.indexOf(Lang1) >= 0 || windowHref == Lang11 || windowHref==baseURL || windowHref.indexOf(LangPlain1) >= 0 || windowHref == LangPlain11 || windowHref.indexOf(Lang1NL) >= 0 || windowHref == Lang11NL){								
				var a = 1;
				var pos = $(window).scrollTop();
				var frontPageSlider = $('#fixed-header').attr('data-front-page-slider');
				if(pos <= a  && $(window).width() > 991 && customizer.slider_display!=0 ) {
					if(frontPageSlider=='false'){
						$("#content-sidebar").css({paddingTop:'50px'});
					}
					$("#fixed-header ").addClass("whitTr"); 
					$(".srcbt ").addClass("whitTr");
					$("#srcdv ").addClass("whitTr");
					$(".srcfi").addClass("whitTrS");
					$("#fixed-header").css({height:'100px'});
					$("#fixed-header-inner").css({marginTop:'20px'});
					if(customizer.header_gradient!=0){$("#fixed-header ").addClass("whitTrGrad");};
					
					$('.restLogo').stop().fadeOut("fast", function() {
						$('.topLogo').stop().fadeIn();	
					});
					HeaderRecalculate();
				}
				else {
					if(frontPageSlider=='false'){
						$("#content-sidebar").css({paddingTop:'50px'});
					}
					
					$(".srcbt ").removeClass("whitTr");
					$("#srcdv ").removeClass("whitTr");
					$(".srcfi").removeClass("whitTrS");
					$("#fixed-header-inner").css({marginTop:'0px'});
					$("#fixed-header").css({height:'50px'});
					if(customizer.header_gradient!=0){$("#fixed-header ").removeClass("whitTrGrad");};
					
					$('.topLogo').stop().fadeOut("fast", function() {
						$("#fixed-header ").removeClass("whitTr");
						$('.restLogo').stop().fadeIn();
					});
					HeaderRecalculate();
				
				}
				if ($(window).width() < 991 ){
					$("#fixed-header-menu").css({top:'50px'});
					$("#fixed-header-menu").css({marginTop:'0px'});
					$("#fixed-header-menu").children().css({marginTop:'0px'});
				}
				else if(pos >= a && $(window).width() < 991 && customizer.slider-display==1){
						$("#fixed-header-menu").css({marginTop:'0px'})				  
										   }
			}else{
					$('.restLogo').css({'display':'block'});
			}
		});	
	});		


	
	
	
	$(window).ready(function () {
		
		$(window).scrollTop(1);
		$("#fixed-header-menu-image-image").click(function(){
			$("#fixed-header-menu").slideToggle("fast");
    	});
		$(".srcinput > .srcim").click(function(){
			$(".search-form-header").slideToggle("fast");
    	});
		
		$("#fixed-header-menu").onePageNav({
  currentClass: 'current',
  changeHash: false,
  scrollSpeed: 750
 });		
		jQuery('img.svg').each(function(){
            var $img = jQuery(this);
            var imgID = $img.attr('id');
            var imgClass = $img.attr('class');
            var imgURL = $img.attr('src');

            jQuery.get(imgURL, function(data) {
                // Get the SVG tag, ignore the rest
                var $svg = jQuery(data).find('svg');

                // Add replaced image's ID to the new SVG
                if(typeof imgID !== 'undefined') {
                    $svg = $svg.attr('id', imgID);
                }
                // Add replaced image's classes to the new SVG
                if(typeof imgClass !== 'undefined') {
                    $svg = $svg.attr('class', imgClass+' replaced-svg');
                }

                // Remove any invalid XML tags as per http://validator.w3.org
                $svg = $svg.removeAttr('xmlns:a');

                // Replace image with new SVG
                $img.replaceWith($svg);

            }, 'xml');

        });
	
	});
	
	
$(window).load(function() {
	var lastScrollTop = 0;
	if(customizer.header_type=='scrollUp'){
		$(window).scroll(function(event){
			var st = $(this).scrollTop();
			if (st > lastScrollTop){
				//console.log('down');
				$('#fixed-header').removeClass('scroll_up');
				$('#fixed-header').addClass('scroll_down');
				if ($(window).width() < 991 ){
					$("#fixed-header-menu").fadeOut();
					$(".search-form-header").stop().fadeOut();
				}
			} else {
				//console.log('up');
			
				$('#fixed-header').removeClass('scroll_down');
				$('#fixed-header').addClass('scroll_up');
			}
			lastScrollTop = st;
		});	
	}
		var lastScrollTopX = 0;
		if(customizer.scroll_top=='select-yes'){
			$(window).scroll(function(event){
				var stX = $(this).scrollTop();
				var winVH = ($(window).height())/2;
				if (stX > lastScrollTopX || winVH > stX ){
					$('.somnium-scroll-top').fadeOut(100);
				}else {
					$('.somnium-scroll-top').fadeIn(100);
				}
				lastScrollTopX = stX;
			});
		}
});	
		
$(window).ready(function() {		
		$('.youtube iframe').each(function(){
			var XX = $(this).width();
			var X1 = XX*9/16;
			$(this).css({height: X1});
		});
		$('.iconCont').each(function(){
			var svgColor = $(this).attr('data-svg-color');
			//console.log(svgColor);
			$(this).find('path').css({'fill':svgColor});
		});
		
		$('.boxXicon').each(function(){
			var svgColor = $(this).attr('data-svg-color');
			//console.log(svgColor);
			$(this).find('path').css({'fill':svgColor});
		});
		$(".drive.horizontal iframe").each(function(){
			var XX1 = $(this).width();
			var X11 = (XX1*210)/297 +30;
			$(this).css({height: X11});
		});
		$(".drive.vertical iframe").each(function(){
			var XX2 = $(this).width();
			var X12 = (XX2*297)/210 +30;
			$(this).css({height: X12});
		});
});

})(jQuery);










		
		