$(document).ready(function() {
	

// ***************************** //
	// bootstrap carousel jq
// ***************************** //

$("#mycarousel,#mycarousel-1").carousel();

/*auto-generate carousel indicator html*/

var myCarousel = $(".header-carousel");
	myCarousel.append("<ol class='carousel-indicators'></ol>");
var indicators = $(".carousel-indicators"); 
	myCarousel.find(".carousel-inner").children(".item").each(function(index) {
	    (index === 0) ? 
	    indicators.append("<li data-target='#myCarousel' data-slide-to='"+index+"' class='active'></li>") : 
	    indicators.append("<li data-target='#myCarousel' data-slide-to='"+index+"'></li>");
	});     


// ***************************** //
	// bootstrap affix jq
// ***************************** //


// $('.top-navi').affix({offset: {top: 305} });
// $(".top-navi").on('affix.bs.affix', function(){
//         $(this).addClass('affix-fromtop-anime');
//     });
$(window).on('scroll DOMMouseScroll mousewheel resize', function(event) {
	/* Act on the event */


	if ( $(this).scrollTop() > 300 ) {

		if ( $(window).width() < 768 || $(window).innerWidth() < 768 ) {
			return;
		}else{

			$(".top-navi").addClass('affix-fromtop-anime affix');

			$(".nav-container").css({
						'-webkit-transform': 'translateY(35%)',
						'-moz-transform': 'translateY(35%)',
						'-ms-transform': 'translateY(35%)',
						'-o-transform': 'translateY(35%)',
						'transform': 'translateY(35%)'
					});
						$(".top-navi").css({marginTop: '-2%'});
		}
		



			if ( $('.to-top').hasClass('visible') == false ) {
				// $('.to-top').css({'visibility':'visible'});
					$('.to-top').stop().animate({right: '3%',opacity:'1'}, 500);
						$('.to-top').addClass('visible');

							$('.to-top').on('click', function(event) {
								event.preventDefault();
								/* Act on the event */
								$('html,body').animate({scrollTop: 0}, 1000);
							});
			}
			
			
	}



	if ( $(this).scrollTop() == 0 ) {
		if ( $(window).width() < 768 || $(window).innerWidth() < 768 ) {
			return;
		}else{

		$(".top-navi").removeClass('affix-fromtop-anime affix');
			$(".top-navi").css({right: '0',left:'0',marginTop: '0'});

					$(".nav-container").css({
						'-webkit-transform': 'translateY(0%)',
						'-moz-transform': 'translateY(0%)',
						'-ms-transform': 'translateY(0%)',
						'-o-transform': 'translateY(0%)',
						'transform': 'translateY(0%)'
					});
		}
	}




	if ( $(this).scrollTop() < 300 ){
		
		if ( $('.to-top').hasClass('visible') == true) {
				$('.to-top').stop().animate({right: '-10%',opacity:'0'}, 500);
					// $('.to-top').css({'visibility':'hidden'});
						$('.to-top').removeClass('visible');
							$('html,body').animate({scrollTop: 0} , 1000);
		}
	}



}); //scroll event end


$(window).on('scroll DOMMouseScroll mousewheel resize',function(){
	if ( $(window).width() < 768 ) {
		
		if ( $(this).scrollTop() > 300 ) {

			if ( $('.to-top').hasClass('visible') == false ) {
					$('.to-top').stop().animate({bottom: '10%',right: '3%',opacity:'1'}, 500);
						$('.to-top').addClass('visible');
			}
						
		}else{
			if ( $(this).scrollTop() < 300 ){
		
				if ( $('.to-top').hasClass('visible') == true) {
						$('.to-top').stop().animate({right: '-10%',opacity:'0'}, 500);
							$('.to-top').removeClass('visible');
								$('html,body').animate({scrollTop: 0} , 1000);
				}
			}
		}

	}else{
		return;
	}
});

// ********************************
// bootstrap multi slide jq

$('#myCarousel-1 .item').each(function(){
  var next = $(this).next();
  if (!next.length) {
    next = $(this).siblings(':first');
  }
  next.children(':first-child').clone().appendTo($(this));
  
  for (var i=0;i<4;i++) {
    next=next.next();
    if (!next.length) {
    	next = $(this).siblings(':first');
  	}
    
    next.children(':first-child').clone().appendTo($(this));
  }
});





// ***************************** //
		// search input jq
// ***************************** //



$('.search-icon').on('click',function(event) {
	event.preventDefault();
	/* Act on the event */
	$('.search-input').toggleClass('show-search-input');
		$('.form-group').toggleClass('show-form-group');

});


// ***************************** //
		// ruler jq
// ***************************** //
	var ruler = $('.ruler');

for (var i = 0; i <= 6; i++) {
		ruler.clone().insertAfter(ruler);

}

// ***************************** //
		// gallery jq
// ***************************** //

	$(function() {
		$('#dg-container').gallery({
			autoplay	:	true,
			interval	: 4000
		});
	});



// ================================ //
		//svgs FUNCTIONS
// ================================ //

					// ================================ //
								//PREPARE FUNCTIONS
					// ================================ //


function isVisible ( element ) {
  
  var scroll_pos = $(window).scrollTop();
  var window_height = $(window).height();
  var el_top = $(element).offset().top;
  var el_height = $(element).height();
  var el_bottom = el_top + el_height;
  return ( (el_bottom - el_height*0.25 > scroll_pos ) && ( el_top < ( scroll_pos+0.5+window_height ) ) );

}


function counter(){

	var count = 0;
    var count1 = 0;
    var count2 = 0;
    var count3 = 0;
    var counting = setInterval(function(){
      
        if (count1 < 41){
            $('.counter').text(count1 + '%');
            count1++
        } else if (count < 71){
        	$('.counter3').text(count + '%');
        	count++
        } else if (count3 < 81){
        	$('.counter2').text(count3 + '%');
        	count3++
        } else if (count2 < 101){
        	$('.counter1').text(count2 + '%');
        	count2++
        } else {
            clearInterval(counting);
        }
    }, 10);
}



function crcl_anime(){

	var el40 = crcldiv.find('.counter');
	var el100 = $('.main:first-child').find('.counter1');
	var el70 = $('.main:nth-last-child(2)').find('.counter2');
	var el80 = $('.main:nth-last-child(3n)').find('.counter3');

	if (el40) {
		// console.log("40");
		$('.main:nth-child(2)').find('svg .anime-crcl').addClass('anime40');
	}
	 if (el100) {
		// console.log("100");
		$('.main:last-child').find('svg .anime-crcl').addClass('anime100');
	}
	 if (el80) {
		// console.log("70");
		$('.main:nth-last-child(3n)').find('svg .anime-crcl').addClass('anime70');
	}
	 if (el100) {
		// console.log("80");
		$('.main:nth-last-child(2)').find('svg .anime-crcl').addClass('anime80');
	}


}

					// ================================ //
								//ACTION GROUND
					// ================================ //

	var mousewheelevt=(navigator.userAgent.indexOf("firefox") != -1 ) ? mozscrolltop : scrolltop ; //FF doesn't recognize mousewheel as of FF3.x
	var isWebkit = ('WebkitAppearance' in document.documentElement.style);

	var webkitanim = scrolltop > svgOffset;
	var el = $('#half-circle');
	var elH = $('#half-circle').height();
	var wHeight = $(window).innerHeight();
	var svgOffset = $('#half-circle').offset().top;
	var scrolltop = $(window).scrollTop();
	var mozscrolltop = $(document).scrollTop();
	var fired = false;

$(window).on('scroll DOMMouseScroll mousewheel',function(){
		
		if ( isVisible( el ) && fired === false ) {
			// $(window).off('scroll');
				crcl_anime();
			    counter();

			    fired = true;

			console.log("true");
		}


		//for webkit(chrome) to trigger the event!

		if (  isWebkit && fired === false && scrolltop >= svgOffset  ) {
			console.log("chrome");

					crcl_anime();
					counter();

					fired = true;
			}

});


// repeating the main div

var crcldiv = $('.main');

for(var i=1; i < 4; i++ ){
	//var new1 = '<div>';
	crcldiv.clone().insertAfter(crcldiv).addClass('new1');
	// crcldiv.eq(4).find('.counter').attr({'class':'counter4'});
}

	// changing the counter div classes to assign specific event each

	$('.main:last-child').find('.counter').attr({'class':'counter1'});
	$('.main:nth-last-child(2)').find('.counter').attr({'class':'counter2'});
	$('.main:nth-last-child(3n)').find('.counter').attr({'class':'counter3'});



	// assign the right style to the 100% div alignment
	$('.main:last-child').find('foreignObject').attr({'x':'153'});
	

// ================================ //
		//CONTENT-ANIME FUNCTIONS
// ================================ //


	var cont		= $(".slidy"),
		lip 		= $('.lip-pic');
		// cont2		= $(".services"),
		// cont3		= $(".showcase");
		// contH 		= cont.outerHeight(true),
		// winH 		= $(window).height(),
		// top 		= $(window).scrollTop(),
		// offset 		= cont.offset().top,
		// winBottom 	= top + winH,
		// contBottom 	= offset + contH;

$(window).on('scroll DOMMouseScroll mousewheel', function(event) {
	/* Act on the event */

		cont.each(function(i, el) {
			var el = $(el);
				if (isVisible(el)) {

					// if (el.hasClass('showcase') == true ) {
					// 	el.addClass("showcase-come-in");
					// 		el.removeClass("come-in");
					// 	}

					el.addClass("come-in");
					el.addClass("already-visible");

				} 
		});


		lip.each(function(i, el) {
			var el = $(el);
				if (isVisible(el)) {
					el.addClass("basos");
					el.addClass("already-visible");

				} 
		});



});

// out of scroll too for the already visible one at the top nav
		lip.each(function(i, el) {
			var el = $(el);
				if (isVisible(el)) {
					el.addClass("basos");
					el.addClass("already-visible");

			} 
		});



// $$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$

}); //doc ready end...