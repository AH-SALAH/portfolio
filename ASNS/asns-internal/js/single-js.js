
(function() {

	// detect if IE : from http://stackoverflow.com/a/16657946		
	var ie = (function(){
		var undef,rv = -1; // Return value assumes failure.
		var ua = window.navigator.userAgent;
		var msie = ua.indexOf('MSIE ');
		var trident = ua.indexOf('Trident/');

		if (msie > 0) {
			// IE 10 or older => return version number
			rv = parseInt(ua.substring(msie + 5, ua.indexOf('.', msie)), 10);
		} else if (trident > 0) {
			// IE 11 (or newer) => return version number
			var rvNum = ua.indexOf('rv:');
			rv = parseInt(ua.substring(rvNum + 3, ua.indexOf('.', rvNum)), 10);
		}

		return ((rv > -1) ? rv : undef);
	}());


	// disable/enable scroll (mousewheel and keys) from http://stackoverflow.com/a/4770179					
	// left: 37, up: 38, right: 39, down: 40,
	// spacebar: 32, pageup: 33, pagedown: 34, end: 35, home: 36
	var keys = [32, 37, 38, 39, 40], wheelIter = 0;

	function preventDefault(e) {
		e = e || window.event;
		if (e.preventDefault)
		e.preventDefault();
		e.returnValue = false;  
	}

	function keydown(e) {
		for (var i = keys.length; i--;) {
			if (e.keyCode === keys[i]) {
				preventDefault(e);
				return;
			}
		}
	}

	function touchmove(e) {
		preventDefault(e);
	}

	function wheel(e) {
		// for IE 
		//if( ie ) {
			//preventDefault(e);
		//}
	}

	function disable_scroll() {
		window.onmousewheel = document.onmousewheel = wheel;
		document.onkeydown = keydown;
		document.body.ontouchmove = touchmove;
	}

	function enable_scroll() {
		window.onmousewheel = document.onmousewheel = document.onkeydown = document.body.ontouchmove = null;  
	}

	var docElem = window.document.documentElement,
		scrollVal,
		isRevealed, 
		noscroll, 
		isAnimating,
		container = document.getElementById( 'container' ),
		trigger = container.querySelector( 'button.trigger' );

	function scrollY() {
		return window.pageYOffset || docElem.scrollTop;
	}
	
	function scrollPage() {
		scrollVal = scrollY();
		
		if( noscroll && !ie ) {
			if( scrollVal < 0 ) return false;
			// keep it that way
			window.scrollTo( 0, 0 );
		}

		if( classie.has( container, 'notrans' ) ) {
			classie.remove( container, 'notrans' );
			return false;
		}

		if( isAnimating ) {
			return false;
		}
		
		if( scrollVal <= 0 && isRevealed ) {
			toggle(0);
		}
		else if( scrollVal > 0 && !isRevealed ){
			toggle(1);
		}
	}

	function toggle( reveal ) {
		isAnimating = true;
		
		if( reveal ) {
			classie.add( container, 'modify' );
		}
		else {
			noscroll = true;
			disable_scroll();
			classie.remove( container, 'modify' );
		}

		// simulating the end of the transition:
		setTimeout( function() {
			isRevealed = !isRevealed;
			isAnimating = false;
			if( reveal ) {
				noscroll = false;
				enable_scroll();
			}
		}, 600 );
	}

	// refreshing the page...
	var pageScroll = scrollY();
	noscroll = pageScroll === 0;
	
	disable_scroll();
	
	if( pageScroll ) {
		isRevealed = true;
		classie.add( container, 'notrans' );
		classie.add( container, 'modify' );
	}
	
	window.addEventListener( 'scroll', scrollPage );
	trigger.addEventListener( 'click', function() { toggle( 'reveal' ); } );
})();

//============================================================
$(document).ready(function(){


$(function singlePageScroll() {

    $(window).scroll(function() {

        if($(this).scrollTop() != 0) {

            $('#toTop').fadeIn(500);    

        } else {

            $('#toTop').fadeOut(500);

        }

//**********
// $('.asns-top').affix({offset: {top: 500} }); 
	$(".asns-top").on('affixed.bs.affix', function(){
        $('[data-spy="affix"]').css({background:'#dc143c',opacity:'0.7',position:'fixed'});
        	$('[data-spy="affix"]').addClass('affix-fromtop-anime');

        	if ($(".asns-top").hasClass('affix')) {
        		$(".nav-ul li a").hover(function(){
        			$(this).css({color:'#4b0082'});
        			});
        				$(".nav-ul li a").mouseout(function(){
        					$(this).css({color:'#ffffff'});
        			}); 
        		}
    });


	if($(this).scrollTop() == 0){
        $('[data-spy="affix"]').css({background:'transparent',opacity:'1',position:'absolute'});
        	$('[data-spy="affix"]').removeClass('affix-fromtop-anime');
        		$(".nav-ul li a").hover(function(){
	        		$(this).css({color:'#dc143c'});
	        		});
	        	$(".nav-ul li a").mouseout(function(){
	        		$(this).css({color:'#ffffff'});
        			}); 
	}


    }); //\\ window scroll fn
}); //\\single page fn

//*****************

$("a").on('click',function(){
	var scale = '1.2';
	  $('body').animate({background:'#000',transform:'scale('+scale+')'},500,function(){
    	$("img.ajax-loader").fadeIn(200);
      		//$("img.ajax-loader").hide( "pulsate", "easeInOutElastic", "slow" );
  });
  });

$("nav a").on('mouseup',function(){
	$("nav a").css({background:'none'});
});

//****************************

//$('[rel="prev"],[rel="next"]').addClass('col-xs-12 col-sm-4 col-md-4');

 //******************************

    $('#toTop').click(function() {
        $('body,html').animate({scrollTop:0},800);
    });    

//********************
 $("img.ajax-loader").fadeIn(200);
  if ($(window).load()) {
       $("img.ajax-loader").fadeOut(200);   
  }

//****************************

    $(".related-posts-content-wrapper").on('mousewheel',function(event) {
       var o = '';
       if (event.deltaY > 0){
         $(".related-posts-content ul").animate({scrollLeft : -$(".related-posts-content ul li").outerWidth(true)}, 'slow');
       } else if (event.deltaY < 0) {
         $(".related-posts-content ul").animate({scrollLeft : +$(".related-posts-content ul li").outerWidth(true)}, 'slow');
       }
    });

//*********************************
// related posts js

$("#related-posts-rb").on('click',function () { 
  	var liouter = $(".related-posts-content ul li").outerWidth(true);
  	var outer = $('.related-posts-content-wrapper');
  	var leftPos = outer.scrollLeft();
  	i = 5;
  	if (liouter <= i) {
  		$("#related-posts-rb").animate({opacity:'0.3'},500);
		return false;
  	}else{
  	outer.stop().animate({scrollLeft: leftPos + liouter}, 500,function(){
           //$(".related-posts-content ul li:last").insertBefore(".related-posts-content ul li:first").hide().show("size",{"direction":"left"},"easeInOutElastic","slow");
		});
  	}
});


$("#related-posts-lb").on('click',function () {	
  	var liouter = $(".related-posts-content ul li").outerWidth(true);
  	var outer = $('.related-posts-content-wrapper');
  	var leftPos = outer.scrollLeft();
  	i = 5;
  	if (liouter <= i) {
  		$("#related-posts-lb").animate({opacity:'0.3'},500);
		return false;
  	}else{
  	outer.stop().animate({scrollLeft: leftPos - liouter}, 500,function(){
            //$(".related-posts-content ul li:first").insertAfter(".related-posts-content ul li:last").hide().show("slide",{"direction":"left"},"easeInOutElastic","slow");
		});
  	}
});

//********************************
//*********************************

 //***********************
//bootstrap tooltip 

    $('[data-toggle="popover"]').popover();

//**********************************
//page anime scroll bar js

function getDocHeight() {
    var D = document;
    return Math.max(
        D.body.scrollHeight, D.documentElement.scrollHeight,
        D.body.offsetHeight, D.documentElement.offsetHeight,
        D.body.clientHeight, D.documentElement.clientHeight
    );
}

   $(function singlePageScrollBar() {

    $(window).scroll(function() {

		var $bar = $('#scrollbar');
        var st = $(this).scrollTop();
        $bar.height( Math.round( st *20)/100);

        if( st == 0 ) {
            $bar.hide("pulsate",{color:"#fff"},"easeInOutElastic",100);
        } else {
            $bar.show("pulsate",{color:"#fff"},"easeInOutElastic",500);
        }
		if($(window).scrollTop() + $(window).height() == getDocHeight()) {
		           $bar.animate({height:'97%'},500);
		       }    
   }).scroll();

    });

//*****************


  $("html").niceScroll({   
	  autohidemode: true,
	  cursorcolor: "#dc143c",
	  background: "#4b0082",
	  bouncescroll: true,
	  boxzoom: true,
	  dblclickzoom: true 
	});


}); //* doc ready fn //\\

