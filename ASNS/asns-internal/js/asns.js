	
//*******************************
//body entry fade event
  /* <![CDATA[ */
/*
  function preloadFunc()
    {
        $(".loading").delay(15000).toggle( "pulsate", "easeInOutElastic",1000 );

    }
    window.onpaint = preloadFunc();
*/

/*
document.getElementById('mySVG').addEventListener('load', function (e) {
    var svgObj = e.currentTarget;
    var svgDoc = svgObj.getSVGDocument();
    var svg = svgDoc.childNodes[0];
    svgObj.parentNode.replaceChild(svg, svgObj);
}, false);

svgObjectHelper.replaceAll($('.Container')[0], function () {
    // all svg <object>s have been replaced
});

*/

$(document).ready(function() {

    $("body").css("display", "none");
      $("body").fadeIn(2000);

//**************
    $("img.ajax-loader").fadeIn(200);
  if ($(window).load()) {
        $("img.ajax-loader").fadeOut(200);   
  };



//*********************************
//link clicked body anim event then redirect

/*
    $(".nav li a").click(function(event){

        event.preventDefault();

        linkLocation = this.href;

        $(".bg").animate({width: '120%',height: '120%', opacity: '0.7',fontSize:'70%'},3000,redirectPage); 

    

    function redirectPage() {

        window.location = linkLocation;

    }
});
  
*/



/* ]]> */





//***************************************
//background auto change on refresh

    /* <![CDATA[ */
//var templateUrl = '<?= get_bloginfo("template_url"); ?>';

    var images = ['demo-12-bg.jpg', 'demo-11-bg.jpg', 'demo-10-bg.jpg', 'demo-9-bg.jpg', 'demo-4-bg.jpg', 'demo-7-bg.jpg'];

    $(".bg").css({'background-image': 'url('+SiteParameters.theme_directory+'/img/header-img/' + images[Math.floor(Math.random() * images.length)] + ')','filter':'blur(2)'});


   

   /* ]]> */


//************************
//logo appearance js


$(".header").delay(15000).animate({opacity:"1"},2000);





//******************************
//upper content js


//********************

$(".down-toggle-btn").click(function(){

revealPosts();

  $(".content-wrapper").animate({right:'-110%'},500);
    $(".upper-content-wrapper").toggle("fold","easeInOutElastic",1500);
      $(".content-wrapper").css({display:'none'});
        $(".up-toggle-btn").css({display:'block'});
        $(".down-toggle-btn").css({display:'none'});
          //$(".up-toggle-btn #up-toggle-btn").addClass('fa-arrow-up');
          //$(".up-toggle-btn #up-toggle-btn").removeClass('fa-arrow-down'); 
                   });

            $(".up-toggle-btn").click(function(){
                $(".upper-content-wrapper").toggle("fold","slow");
                  $(".content-wrapper").css({display:'block'});
                  $(".content-wrapper").animate({right:'0'},500);
                    $(".up-toggle-btn").css({display:'none'});
                    $(".down-toggle-btn").css({display:'block'});
                      //$(".up-toggle-btn #up-toggle-btn").addClass('fa-arrow-down');
                      //$(".up-toggle-btn #up-toggle-btn").removeClass('fa-arrow-up');
});


$(".down-toggle-btn,.up-toggle-btn").hover(function(){
  $(".down-toggle-btn,.up-toggle-btn").addClass('heartlike');
});
    $(".down-toggle-btn,.up-toggle-btn").mouseout(function(){
      $(".down-toggle-btn,.up-toggle-btn").removeClass('heartlike');   
});

//*********************************
// niceScroll jq

// $("#video-modal .modal-body").niceScroll({ 
//   autohidemode: true,
//   cursorcolor: "#dc143c",
//   cursorborder:"",
//   background: "#4b0082",
//   bouncescroll: true,
//   boxzoom: true,
//   dblclickzoom: true 
// });


/*
//***********************
//repeating for dblclick defoue

$(".down-toggle-btn").dblclick(function(){
  $(".content-wrapper").css({top:'100%'});
    $(".upper-content-wrapper").toggle("fold","slow");
      //$(".upper-content-wrapper").css({display:'block',top:'13%'});
        $(".up-toggle-btn").css({display:'block'});
        $(".down-toggle-btn").css({display:'none'});
          //$(".up-toggle-btn #up-toggle-btn").addClass('fa-arrow-up');
          //$(".up-toggle-btn #up-toggle-btn").removeClass('fa-arrow-down');
            $(".up-toggle-btn").dblclick(function(){
                $(".upper-content-wrapper").toggle("fold","slow");
                  $(".content-wrapper").css({top:'13%'});
                    $(".up-toggle-btn,.upper-content-wrapper").css({display:'none'});
                    $(".down-toggle-btn").css({display:'block'});
                      //$(".up-toggle-btn #up-toggle-btn").addClass('fa-arrow-down');
                      //$(".up-toggle-btn #up-toggle-btn").removeClass('fa-arrow-up');
                      
          });
});

*/




//**********************
// content-wrapper appearance js

$("body").hover(function(){
  $(".content-wrapper").animate({right:'0',opacity:'1'},1000);
    $("#logo").animate({top:'0',opacity:'1'},1500);
      $(".cbp-vimenu").delay(1000).animate({top:'0',opacity:'1'},2000);
});



//*****************************
// newsticker plugin js

//*******example 1

var nt_example1 = $('#nt-example1').newsTicker({
    row_height: 70,
    max_rows: 4,
    speed: 600,
    direction: 'down',
    duration: 4000,
    autostart: 1,
    pauseOnHover: 1,
    prevButton: $('#nt-example1-prev'),
    nextButton: $('#nt-example1-next'),
   /*  movingDown:function(){
     $('#nt-example1 li').toggleClass('droppy');
            $('#nt-example1 li a').toggle( "bounce", "easeInOutElastic",300 );
    },*/
    hasMoved: function(){
      $('#nt-example1 li').toggleClass('droppy');
           /* $('#nt-example1 li a').toggle( "bounce", "easeInOutElastic",300 );*/
    }
});
/*
    $('#nt-example1 li').hover(function(){
          $('#nt-example1 li').toggleClass('heartlike');
        });
*/


//******* example 2
/*var src = $('#nt-example2 li').children("img").attr('src'); 
var imgLength = $('#nt-example2 li img').length;
var id = $('#nt-example2 li img').attr('id').length;
var img = '<img src="'+src+'">';
var data = $('#nt-example2 li').children("img").attr("data-source",src);*/
 
 var nt_example2 = $('#nt-example2').newsTicker({
  row_height: 60,
  max_rows: 1,
  speed: 300,
  duration: 6000,
  prevButton: $('#nt-example2-prev'),
  nextButton: $('#nt-example2-next'),
  hasMoved: function () {
    // var x_back = '(0%)';
    // var x_go = '(110%)';
          // $("#nt-example2-infos .infos-text").css({transform:'translateX'+x_go+''});
          // $("#nt-example2-infos .infos-text").animate({marginLeft:'110%'},320);                  
          $('#nt-example2-infos-container').hide( "clip", "easeInOutElastic",300, function(){
          $('#nt-example2-infos .infos-hour').html($('#nt-example2 li:first span').html());
          $('#nt-example2-infos .infos-text').html($('#nt-example2 li:first section').html());
          $('#nt-example2-infos .image').html($('#nt-example2 li:first h1').html());
          $(this).toggle( "clip", "easeInOutElastic",300 );
          // $("#nt-example2-infos .infos-text").animate({marginLeft:'0%'},320);    
          // $("#nt-example2-infos .infos-text").css({transform:'translateX'+x_back+''});    

      });
    },
    pause: function() {
      $('#nt-example2 li i').removeClass('fa-play').addClass('fa-pause');
    },
    unpause: function() {
      $('#nt-example2 li i').removeClass('fa-pause').addClass('fa-play');
    }
});
$('#nt-example2-infos').hover(function() {
    nt_example2.newsTicker('pause');
}, function() {
    nt_example2.newsTicker('unpause');
});



//******************************************
// horizontal marquee ticker /*

$(function(){
$(".marquee-content-items li a").hover(function(){
  $(".marquee-content-items li").css({animationPlayState:'paused'});
    });

    $(".marquee-content-items li a").mouseout(function(){
      $(".marquee-content-items li").css({animationPlayState:'running'});
});
});




//*****************************
/*
$(function(){
$("div.marquee-sibling").on('click',function(){
  $(".marquee-container").animate({right:'90%',left:'0',width:'10%',opacity:'1'},500); 
    $(".marquee-content").animate({right:'90%',left:'0',width:'10%'},1000).animate({right:'100%',left:'-100%',opacity:'0'},1000);  
});
});
*/

/************/

$(".cbp-vimenu #icon-images").on('click focusin',function(){
//sound/audio play js
//setInterval

$(function(){
        var audioElement = document.createElement('audio');
        audioElement.setAttribute('src', ''+SiteParameters.theme_directory+'/img/beep-07.mp3');
        $($this).prop("currentTime",0);
        var $this = audioElement,
        sound = $this;
        $($this)[0].play();
        sound.pause();
        sound.currentTime = 0;
        //audioElement.setAttribute('autoplay', 'autoplay');
        //audioElement.load()
/* 
        $.get();

        audioElement.addEventListener("load", function() {
            audioElement.play();
        }, true);

       $('.play').click(function() {
            audioElement.play();
        });

        $('.pause').click(function() {
            audioElement.pause();
        });
*/

  
  $(".marquee-content").removeClass('roadrunner');
    $(".marquee-content").animate({right:'0',left:'0',width:'100%',opacity:'1'},500);
  //.delay(19500).animate({right:'80%',left:'0',width:'20%',opacity:'1'},500); 
audioElement.play('',function(){audioElement.pause(); audioElement.stop(); });
      $(".marquee-container").delay(300).animate({right:'0',left:'0',width:'100%',opacity:'1'},500);
        $(".marquee-content-items").delay(500).animate({right:'0',left:'0',width:'100%',opacity:'1'},300); 
          $(".marquee-sibling").delay(700).animate({right:'0',opacity:'1'},500);
            $("#pic-frame").addClass("pic-frame-anime");

  //  .delay(20000).animate({right:'80%',left:'0',width:'20%'},500).animate({right:'100%',left:'-100%',opacity:'0'},1000);
/*
$(".cbp-vimenu #icon-pencil,.marquee-content").focusout(function(){
if(document.activeElement.id!=='icon-pencil'){
  $(".marquee-container").animate({right:'80%',left:'0',width:'20%',opacity:'1'},500); 
    $(".marquee-content").animate({right:'80%',left:'0',width:'20%'},700).animate({right:'100%',left:'-100%',opacity:'0'},1000);  
  }
});*/
$(".marquee-container span").click(function(){
//if(document.activeElement.id!=='icon-pencil'){
$(".marquee-content").addClass('roadrunner');
  $(".marquee-sibling").animate({right:'87%',opacity:'0.7'},900);
    $(".marquee-content-items").animate({right:'80%',left:'0',width:'20%',opacity:'1'},300); 
      $(".marquee-container").animate({right:'80%',left:'0',width:'20%',opacity:'1'},500); 
        $(".marquee-content").animate({right:'80%',left:'0',width:'20%'},700).animate({right:'100%',left:'-300%',opacity:'0'},1000);  
          $("#pic-frame").removeClass("pic-frame-anime");
  //}
});


//},45000);

});
});

$(".marquee-sibling").hover(function(){
  $("#pic-frame").addClass('heartlike');
});
    $(".marquee-sibling").mouseout(function(){
      $("#pic-frame").removeClass('heartlike');   
});


//************************************
// typewriter plugin
/*
$(function(){

//$(".marquee-container li a").addClass('typewriter');

  setInterval(function(){
  
$(".typewriter").typewriter({

'speed':200, // default: 300
});
},10000);
});

*/



//*****************************
// move the image along with the movement of the cursor 1
/*
$(".image").mousemove(function(event) {
  $(".image > a img").css({"position":"fixed","left" : event.pageX, "top" : event.pageY});
});
$(".image").mouseleave(function(event) {
  $(".image > a img").css({"position":"none","left" : "0", "top" : "0"});
});
*/
//*********************************
// move the image along with the movement of the cursor 2

/*
$(".image > a img").mousemove(function(e){
    var amountMovedX = (e.pageX * 1 / 20);
    var amountMovedY = (e.pageY * 1 / 20);
    $(this).css('background-position', amountMovedX + 'px ' + amountMovedY + 'px');
});
*/



//*************************************
// move the image along with the movement of the cursor 3
/*
//$(document).ready(function() {
var movementStrength = 25;
var height = movementStrength / $(window).height();
var width = movementStrength / $(window).width();
$(".image > a img").mousemove(function(e){
          var pageX = e.pageX - ($(window).width() / 2);
          var pageY = e.pageY - ($(window).height() / 2);
          var newvalueX = width * pageX * -1 - 25;
          var newvalueY = height * pageY * -1 - 50;
          $(".image > a img").css("background-position", newvalueX+"px     "+newvalueY+"px");
});
//});
*/

//***********************************
// move the image along with the movement of the cursor 4

/*

$(".about-circle-div").on('mousemove','image', function(ev){
    var $this = $(this),
        posX = ev.pageX, 
        posY = ev.pageY,
        data = $this.data('cache');
  //cache necessary variables
      if(!data){
        data = {};
        data.marginTop = - parseInt($this.css('top')),
        data.marginLeft = - parseInt($this.css('left')),
        data.parent = $this.parent('.about-circle-div'),
        $this.data('cache', data); 
      }
 
  var originX = data.parent.offset().left,
      originY =  data.parent.offset().top;
   
     //move image
     $this.css({
        'left': -( posX - originX ) / data.marginLeft,
        'top' : -( posY - originY ) / data.marginTop
     }); 
});


$(".about-circle-div").on('mouseleave','svg', function(e){
  $(this).find('image').css({
    'left': '0', 
    'top' : '0'
  });
});

*/

//*************************************

	$(".menu-logo").dblclick(function(){

		  $(".nav,.search-form,.sound").hide( "scale",1000 );	
        $(".menu-icons").toggle( "bounce",1000 );  
          $(".menu-icons li").delay(5000).animate({background:'#'},1000);
  });




//*********************
//mouseup+down cursor change

  $(".menu-logo").mousedown(function(){
    $(".menu-logo").css({'cursor':'grabbing'});
  });


      $(".menu-logo").mouseup(function(){
            $(".menu-logo").css({'cursor':'grab'});
});


	

//****************************
//jq-ui-effects=> blind-bounce-clip-drop-explode-fold-highlight-puff-pulsate-scale-shake-size-slide

	$(".icon-menu").click(function(){
      $(".nav li").toggleClass('nav-anime');
        $(".nav").animate({width:'toggle'},300);
});


		$(".remain-icons").click(function(){
				$(".nav").hide( "shake", { direction: "left" }, "slow" );
          $(".nav li").removeClass('nav-anime');
});

    $(".icon-menu").click(function(){
        $(".search-form,.sound").hide( "clip", "slow" );
});

    $(".icon-search").click(function(){
        $(".sound").hide( "clip", "slow" );
});

    $(".icon-sound").click(function(){
        $(".search-form").hide( "explode", "slow" );

      });

    $(".sound,.audio").mouseover(function(){
            $(".menu-button,.social-share,.switch").animate({opacity:'0'},100);
    });

    $(".sound,.audio").mouseout(function(){
            $(".menu-button,.social-share,.switch").animate({opacity:'1'},100);
    });

/*
    $(".menu-button").click(function(){
          $(".menu-wrap").fadeIn(500);
});
*/

    $(".icon-video").click(function(){
        $(".nav,.search-form,.sound").hide( "explode", "slow" );
});

    $(".icon-images").click(function(){
        $(".nav,.search-form,.sound").hide( "shake", { direction: "left" }, "slow" );

});
   




//***********

    $(".icon-sound,.sound-close").click(function(){
        $(".sound").toggle( "clip","easeInOutElastic",1000 );

});


//*****************************
//search-box js

    $(".icon-search").click(function(){
        $(".search-form").toggle( "explode","easeInOutElastic",1000 );

});

/*
  $(".search-wrap").click(function(){

    var val = '1, 0, 0, 0deg';

    $("#searchfield").delay(5000).css({ 'transform':'rotate3d('+ val +')', 'transition': 'all 0.7s ease-in-out'});
            $(".wrap").css({'border':'0px','background':'none','transition': 'all 0.7s ease-in-out'});

});

    $(".search-form label i").click(function(){
    var val3 = '1, 0, 0, 90deg';

    $("#searchfield").css({ 'transform':'rotate3d('+ val3 +')', 'transition': 'all 0.7s ease-in-out'});
        //$(".wrap").css({'border':'1px solid red','background':'#000','transition': 'all 0.7s ease-in-out'});
});
*/

//***************************
// switch-button

 // $(".fa-power-off").addClass('fa-checked');

    $(".switch").click(function(){
      $("#switch-input").prop('checked');
      var checked = $("#switch-input").prop('checked');
  if(checked) {
      $(".cover").show( "pulsate","easeInOutElastic",500);
    } else {
          $(".cover").hide( "pulsate","easeInOutElastic",500);
  }

});

//*********

$(".cover").load(''+SiteParameters.theme_directory+'/fonts/asns-11.svg');


//***************************************
//ss-button

$("#ss-button-open").click(function() {
  $("#ss-wrapper").show("slide",{direction:"right",color:'#4b0082'},"easeInOutElastic",500);
    $("#ss-button-open-bg").hide("slide",{direction:"right"},"easeInOutElastic",100);
      $("#ss-button-close-bg").animate({right:'3%'},100);
        $("#ss-button-close-bg").animate({right:'8%'},300);
        // if ($(window).width() == 1366 ){
          $("#ss-button-close-bg").animate({right:'107%'},300);
        // }
          $("#ss-button-close-bg").removeClass('roadrunner');
});
$("#ss-button-close").click(function() {
  $("#ss-button-close-bg").animate({bottom:'20%'},100);
    $("#ss-button-close-bg").animate({bottom:'0'},100);
      $("#ss-button-close-bg").addClass('roadrunner');
        $("#ss-wrapper").delay(500).hide("slide",{direction:"right",color:'#4b0082'},"easeInOutElastic",500);
          $("#ss-button-open-bg").delay(1000).show("slide",{direction:"right"},"easeInOutElastic",100);
});

//******************************
//lc-menu name js


$(".lc-name").click(function(){

    $(".lc-name").addClass('lc-name-animate',function(){
      $(".left-credit .lc-name").addClass('clicked');
        $(".para").delay(1400).animate({opacity:'1'},1000);
            $(".para").css({'display':'block'});

              $(".lc-name").click(function(){
                $(".lc-name").removeClass('lc-name-animate');
                  $(".left-credit .lc-name").removeClass('clicked');
                    $(".para").animate({opacity:'0'},500);
                      $(".para").css({'display':'none'});

        });
    });
});











//******************************
//lc-menu arrow js


$(".lc-arrow1").click(function(){

      $(".left-credit").toggle( "drop","easeInOutElastic",300 ,function(){
                $(".lc-arrow1").animate({left:'-50px'},10);
                    $(".lc-arrow2").addClass('lc-arrow-animate');

        });
      });



$(".lc-arrow2").click(function(){

      $(".left-credit").toggle( "drop","easeInOutElastic",300 ,function(){
            $(".lc-arrow2").removeClass('lc-arrow-animate');
                $(".lc-arrow2").animate({left:'-50px'},350);
                    $(".lc-arrow1").animate({left:'0'},450);

      });
    });


//***
//repeating with dblclick to avoid defoe of dblclick event


$(".lc-arrow1").dblclick(function(){

      $(".left-credit").toggle( "drop","easeInOutElastic",300 ,function(){
                $(".lc-arrow1").animate({left:'-50px'},10);
                    $(".lc-arrow2").addClass('lc-arrow-animate');

        });
      });



$(".lc-arrow2").dblclick(function(){

      $(".left-credit").toggle( "drop","easeInOutElastic",300 ,function(){
            $(".lc-arrow2").removeClass('lc-arrow-animate');
                $(".lc-arrow2").animate({left:'-50px'},350);
                    $(".lc-arrow1").animate({left:'0'},450);

      });
    });








//******************************
//left-menu js

$(".l-open").click(function(){
  var val = '1, 0, 0, 90deg';
  var val2 = '0, 0, 0, 0deg';

$(".l-menu li").toggleClass('lmenuli-anime');
      $(".l-menu").animate({height:'toggle'},300 ,function(){
             $(".l-open").css({'transform':'rotate3d('+ val +')'});
                  $(".l-close").css({'transform':'rotate3d('+ val2 +')'});
                      $(".l-close").fadeIn(250);

});
});

$(".l-close").click(function(){
  var val = '1, 0, 0, 90deg';
  var val2 = '0, 0, 0, 0deg';

$(".l-menu li").removeClass('lmenuli-anime');
      $(".l-menu").animate({height:'toggle'},300 ,function(){
             $(".l-close").css({'transform':'rotate3d('+ val +')'});
                  $(".l-open").css({'transform':'rotate3d('+ val2 +')'});
                      $(".l-open").fadeIn(250);
});
});


//***
//repeating with dblclick to avoid defoe of dblclick event

$(".l-open").dblclick(function(){
  var val = '1, 0, 0, 90deg';
  var val2 = '0, 0, 0, 0deg';

$(".l-menu li").toggleClass('lmenuli-anime');
      $(".l-menu").animate({height:'toggle'},300 ,function(){
             $(".l-open").css({'transform':'rotate3d('+ val +')'});
                  $(".l-close").css({'transform':'rotate3d('+ val2 +')'});
                      $(".l-close").fadeIn(250);

});
});

$(".l-close").dblclick(function(){
  var val = '1, 0, 0, 90deg';
  var val2 = '0, 0, 0, 0deg';

$(".l-menu li").removeClass('lmenuli-anime');
      $(".l-menu").animate({height:'toggle'},300 ,function(){
             $(".l-close").css({'transform':'rotate3d('+ val +')'});
                  $(".l-open").css({'transform':'rotate3d('+ val2 +')'});
                      $(".l-open").fadeIn(250);
             
});
});


//***************************************
//copyright anime

$("#open-button").click(function(){
  $(".icon-list").animate({top:'-10%'},500);
    $(".icon-list").delay(500).animate({top:'-1000%'},3500);
      $("#footer-menu > span").delay(3500).fadeIn(500); 
        $(".icon-list").animate({top:'0%'},200);
          $(".icon-list").animate({top:'-20%'},100);
            $(".icon-list").animate({top:'-10%'},100);
              $("#footer-menu > span").delay(2000).fadeOut(1500); 
});

//*********************************



/*******
jQuery(".l-open,.l-close").bind('dblclick',function(e){
    e.preventDefault();
});
*/

/************************* ^  /*
    //Disable text selection by Chris Barr, of chris-barr.com

$.fn.disableTextSelect = function() {
    return this.each(function(){
        if($.browser.mozilla){//Firefox
            $(this).css('MozUserSelect','none');
        }else if($.browser.msie){//IE
            $(this).bind('selectstart',function(){return false;});
        }else{//Opera, etc.
            $(this).mousedown(function(){return false;});
        }
    });
}

*/

//*************************
//bootstrap modal js

$(".icon-video").click(function(){
  $(".main-content").animate({opacity:'1'},500);
    $("#video-modal").modal({keyboard: true,backdrop: true}); 

});

//**********//

  $(".video-close").click(function(){

          $(".main-content").animate({opacity:'0.9'},500);

//First get the  iframe URL

var url = $('#yt-video').attr('src');


//Then assign the src to null, this then stops the video been playing

$('#yt-video').attr('src', '');


// Finally you reasign the URL back to your iframe, so when you hide and load it again you still have the link

$('#yt-video').attr('src', url);   

});


//********************
// content links open in modal js
/*
$("ul.nav a").click(function(e){
  //e.preventDefault();
  var url = $(this).attr('href');
  //$("#general-modal").modal({keyboard: true,backdrop: true,Esc:true});
    $("img.ajax-loader").delay(1000).fadeIn(500);
      //$("#general-modal .inai-koto").load(url,function(){
        $("img.ajax-loader").hide( "pulsate", "easeInOutElastic", "slow" );
          $(".modal-shut").click(function(){
            //$("#general-modal").addClass('roadrunner');
            $("#general-modal").hide("clip","slow");
              //$("html").load('index');
          });
      //});
});

    $(".modal-shut").dblclick(function(e){
      e.preventDefault();
});

*/
//*************************
$(".nav a,#nt-example2-container a,.marquee-container a,#nt-example1-container a").click(function(){
  $(".main-content").animate({opacity:'0.5'},500,function(){
    $("img.ajax-loader").delay(500).fadeIn(500);
      $("img.ajax-loader").hide( "pulsate", "easeInOutElastic", "slow" );
  });
});
//***********************
//bootstrap popover 


    $('[data-toggle="popover"]').popover();
   

//***********************
//jq ui tooltip 

/*
var at = 'right';
var my = 'right';
    $(".l-menu li a").tooltip({position: { my: '('+ my +')', at: '('+ at +')' }});

*/

//************************************
//draggable items


$( ".cbp-vimenu" ).draggable();


//********************************************
//search popup modal on enterkey press
/*
$("form input").keypress(function (e) {
  //e.preventDefault();
 // var url = 'search'; 

 if (((e.which && e.which == 13) || (e.keyCode && e.keyCode == 13)) && ($("#searchfield").filter(function() { return $(this).val(); }).length == 0)) {
      alert("please,write a query in order to search!");
      return false;
 }else if (((e.which && e.which == 13) || (e.keyCode && e.keyCode == 13)) && ($("#searchfield").filter(function() { return $(this).val(); }).length > 0)) {  
      //alert("you can go!");
      e.preventDefault();
    var  modal = $("#general-modal").modal({keyboard: true,backdrop: true,Esc:true});
        $("img.ajax-loader").delay(1000).fadeIn(500);
          $.ajax({
            url: ''+SiteParameters.theme_directory+'/search.php',
            type: "GET",
            success:function(data){
                    $("#general-modal .inai-koto").dialog(modal);
                    $("#general-modal .inai-koto").html(data);            
                  },
            error:function (){
                alert("Error!!! Please refresh the page and try again!");
            }
        });

            $("img.ajax-loader").hide( "pulsate", "easeInOutElastic", "slow" );
              $(".modal-shut").click(function(){
                $("#general-modal").addClass('roadrunner');
                  $("#general-modal").hide("clip","slow");
      });

}  else {
        return true;
    }
});
*/
//******************************
//main-content skewing
/*
$(".l-menu a").on('click',function(){

  $(".main-content").toggleClass('skew after');

});


$(".main-content,.after").click(function(){
    $(".main-content").removeClass('skew after');
});

$(".main-content,.after").dblclick(function(){
    $(".main-content").removeClass('skew after');
});

*/

//********************************************************
//jq load remote files js


  $(".l-menu .l-location").on('click',function(e){
    e.preventDefault();
    var val = '4px';
    var val2 = '0';    
  $(".main-content,.about-circle-div,.playcard-note").removeClass('skewright after about-crcle-anime playcard-transformy skewdown');
    $(".map-container").show("slide","easeInOutElastic",700);
      $(".map").css({filter:'blur('+ val +')',pointerEvents:'none'});
        $(".map").load('map');
          setTimeout(function(){
            $(".map").css({filter:'blur('+ val2 +')',pointerEvents:'auto'});
          },5000);
    });
      //$(this).off('click');
    $(".shut").on('click',function(e){
      e.preventDefault();
      $(".main-content,.about-circle-div,.playcard-note").removeClass('skewright after about-crcle-anime playcard-transformy skewdown');
        $(".map-container").hide("clip","easeInOutElastic",500);
          // $(".map").css({filter:'blur('+ val +')',pointerEvents:'none'});
          //   setTimeout(function(){
          //     $(".map").css({filter:'blur('+ val2 +')',pointerEvents:'auto'});
          //   },3000);

  }); 
    
  $(".shut").dblclick(function(e){
        e.preventDefault();
  });

//************* ^

$(".main-content").on('click',function(){
  $(".main-content,.playcard-note,.about-circle-div").removeClass('skewright skewdown after about-crcle-anime playcard-transformy');
});


//*********


$(".l-menu .l-about").click(function(){

  $(".playcard-note,.main-content").removeClass('playcard-transformy skewdown');
    $(".about-circle-div").addClass('about-crcle-anime');
      $(".main-content").addClass('skewright after',function(){
        $(".l-menu .l-about").click(function(){
          $(".playcard-note,.main-content").removeClass('playcard-transformy skewdown');
            $(".about-circle-div").toggleClass('about-crcle-anime');
              $(".main-content").toggleClass('skewright after');
        });
      });

      /*
        $(this).off('click');
  
        $(".after,.l-menu .l-about").click(function(){
            $(".about-circle-div").toggleClass('about-crcle-anime',function(){
              $(".main-content").toggleClass('skew after');
            });                
    });
  */
});



        $(".l-menu .l-note").on('click',function(){
            $(".about-circle-div,.main-content").removeClass('about-crcle-anime skewright');
              //$(".playcard-note").animate({top:'0'},500,function(){
                $(".playcard-note").addClass('playcard-transformy');
              //});
                $(".main-content").addClass('skewdown after',function(){
                  $(".l-menu .l-note").click(function(){
                    $(".about-circle-div,.main-content").removeClass('about-crcle-anime skewright');
                      $(".playcard-note").toggleClass('playcard-transformy');
                      //$(".playcard-note").animate({height:'toggle'},500);
                          $(".main-content").toggleClass('skewdown after');
              });
            });          
          });        


//**************

$("#l-comments,.l-comments").on('click',function(){
  $(".main-content,.playcard-note,.about-circle-div").removeClass('skewright skewdown after about-crcle-anime playcard-transformy');
    $(".upper-content-wrapper").hide("fold","slow"); 
    $(".content-wrapper").css({display:'block'});
    $(".content-wrapper").animate({right:'0'},500);
    $(".up-toggle-btn").css({display:'none'});
    $(".down-toggle-btn").css({display:'block'});   
      $(".content-left-wrapper").show("size","slow").focus();

if(document.activeElement.id!=='l-comments'){
    $(".content-left-wrapper").hide("size","slow");
  }

 /*     if (this.id == 'l-comments') {
        $(".content-left").show("size","slow");
    }
    else if(this.id == 'l-comments'){
        $(".content-left").hide("size","slow");
    }
*/
});

$("#cl-close").on('click',function(){
      $(".content-left-wrapper").hide("size","slow");  
});




//**************
//div playcard

/*
$(".note-after").click(function(){
  
  var val2 = '0, 1, 0, 180deg';

  $("#svg-onna").css({backfaceVisibility:'hidden'});
    $(".backnote").css({transform:'rotate3d(' + val2 + ')',opacity:'0.9'});
      $(".playcard-note").toggleClass('playcard-transformx note-after',function(){


$(".backnote").click(function(){

  var val = '0, 1, 0, 90deg';

  $("#svg-onna").css({backfaceVisibility:'visible'});
    $(".backnote").css({transform:'rotate3d(' + val + ')',opacity:'0'});
      $(".playcard-note").removeClass('playcard-transformx note-after');
});
});
});

*/


//*********************************
//********************************
//socialCircle js

  /* <![CDATA[ */



$( ".socialCircle-center" ).socialCircle({

  rotate: 180,

  radius:100,

  circleSize: 2,

  speed:450

});



/* ]]> */

// $( ".socialCircle-center" ).on('click',function(){
//   $("#ss-wrapper").toggleClass('sswb');
// });

//*************************************************************
                //===============//
                /* color-palette-js */
                //===============//

var seagreen = '#2e8b57';
var darkgoldenrod = '#b8860b';
var darkslateblue = '#483d8b';
var darkslategray = '#2f4f4f';
var darkkhaki = '#bdb76b';
var crimson = '#d4003c';

$("#seagreen").on('click',function(){
  $("#nt-example2-infos,#ss-wrapper,.left-credit,.icon-list,#ss-button-open-bg,#ss-button-close-bg,.content-left .rc-title,.marquee-content-items").animate({backgroundColor:seagreen},300);
    $(".morph-shape").css({fill: seagreen});
      $("#nt-example2-infos-triangle").animate({borderBottomColor: seagreen},300);
        $(".l-menu a,.socialCircle-item a,#nt-example2-infos .infos-text a,.menu-icons li a,.custom-template-contents-wrapper a").animate({color:seagreen},300);

});

$("#darkgoldenrod").on('click',function(){
  $("#nt-example2-infos,#ss-wrapper,.left-credit,.icon-list,#ss-button-open-bg,#ss-button-close-bg,.content-left .rc-title,.marquee-content-items").animate({backgroundColor:darkgoldenrod},300);
    $(".morph-shape").css({fill: darkgoldenrod});
      $("#nt-example2-infos-triangle").animate({borderBottomColor: darkgoldenrod},300);
        $(".l-menu a,.socialCircle-item a,#nt-example2-infos .infos-text a,.menu-icons li a,.custom-template-contents-wrapper a").animate({color:darkgoldenrod},300);

});

$("#darkslateblue").on('click',function(){
  $("#nt-example2-infos,#ss-wrapper,.left-credit,.icon-list,#ss-button-open-bg,#ss-button-close-bg,.content-left .rc-title,.marquee-content-items").animate({backgroundColor:darkslateblue},300);
    $(".morph-shape").css({fill: darkslateblue});
      $("#nt-example2-infos-triangle").animate({borderBottomColor: darkslateblue},300);
        $(".l-menu a,.socialCircle-item a,#nt-example2-infos .infos-text a,.menu-icons li a,.custom-template-contents-wrapper a").animate({color:darkslateblue},300);

});

$("#darkslategray").on('click',function(){
  $("#nt-example2-infos,#ss-wrapper,.left-credit,.icon-list,#ss-button-open-bg,#ss-button-close-bg,.content-left .rc-title,.marquee-content-items").animate({backgroundColor:darkslategray},300);
    $(".morph-shape").css({fill: darkslategray});
      $("#nt-example2-infos-triangle").animate({borderBottomColor: darkslategray},300);
        $(".l-menu a,.socialCircle-item a,#nt-example2-infos .infos-text a,.menu-icons li a,.custom-template-contents-wrapper a").animate({color:darkslategray},300);

});

$("#darkkhaki").on('click',function(){
  $("#nt-example2-infos,#ss-wrapper,.left-credit,.icon-list,#ss-button-open-bg,#ss-button-close-bg,.content-left .rc-title,.marquee-content-items").animate({backgroundColor:darkkhaki},300);
    $(".morph-shape").css({fill: darkkhaki});
      $("#nt-example2-infos-triangle").animate({borderBottomColor: darkkhaki},300);
        $(".l-menu a,.socialCircle-item a,#nt-example2-infos .infos-text a,.menu-icons li a,.custom-template-contents-wrapper a").animate({color:darkkhaki},300);

});

$("#reset").on('click',function(){
  $("#nt-example2-infos,#ss-wrapper,#ss-button-open-bg,#ss-button-close-bg,.content-left .rc-title").animate({backgroundColor:crimson},300);
    $(".morph-shape").css({fill: '#696969'});
      $("#nt-example2-infos-triangle").animate({borderBottomColor: crimson},300);
        $(".socialCircle-item a,.menu-icons li a,.custom-template-contents-wrapper a").animate({color:crimson},300);
          
          $(".left-credit,.icon-list").animate({backgroundColor:'#696969'},300);
            $(".marquee-content-items").animate({backgroundColor:'#000080'},300);
              $("#nt-example2-infos .infos-text a").animate({color:'#4b0082'},300);
                $(".l-menu a").animate({color:'#fff'},300);

});

//*************************************************************
                //===============//
                /* wp-ajax-loading-js */
                //===============//


$(document).on('click','.load-more-btn',function(){
  var that = $(this);
  var page = that.data('page');
  var newPage = page+1;
  var ajaxUrl = that.data('url');

  $(".asns-load-more .load-more-btn .load-icon").addClass('load-btn-magnet-anime');
    that.css({pointerEvents:'none'}).find('.load-more-text').css({opacity:'0.5'}).delay(1000).slideUp(320);

  $.ajax({
    url: ajaxUrl,
    type: 'post',
    data:{
      page: page,
      action:'load_more_btn'
    },
    error: function( response ){
      console.log( response );
    },
    success: function( response ){

      if ( response == 0 ) {
          $(".w1").append( '<div class="text-center" style="margin:0 auto;width:20%;"><h4 style="margin-bottom:0;border:1px solid;"> No more posts to load.(x~x) </h4></div>' );
            that.slideUp(320);
      } else {

            setTimeout(function(){

        that.data('page', newPage);
          $(".w1").append( response );
  
              $(".asns-load-more .load-more-btn .load-icon").removeClass('load-btn-magnet-anime');
                that.css({pointerEvents:'auto'}).find('.load-more-text').slideDown(320).delay(1000).css({opacity:'1'});

                revealPosts();

        },2000);
  
      }
      
    }

  });
});

/* scroll function */

var last_scroll = 0;

$(window).scroll( function(){

  var scroll = $(window).scrollTop();

  if (Math.abs( scroll - last_scroll ) > $(window).height()*0.1 ) {
    last_scroll = scroll;

    $('.page-limit').each(function(index){

      if ( isVisible( $(this) ) ) {

        history.replaceState( null, null, $(this).attr("data-page") );
        return(false);

      }

    });
  }

});


/* helper functions */

function revealPosts() {

  var posts = $('.custom-template-contents:not(.reveal)');
  var i = 0;

  setInterval(function(){

    if (i >= posts.length) return false;

      var el = posts[i];
      $(el).delay(1000).addClass('reveal');

      i++

  },320);
}


/* isvisible func */

function isVisible ( element ) {
  
  var scroll_pos = $(window).scrollTop();
  var window_height = $(window).height();
  var el_top = $(element).offset().top;
  var el_height = $(element).height();
  var el_bottom = el_top + el_height;
  return ( (el_bottom - el_height*0.25 > scroll_pos ) && ( el_top < ( scroll_pos+0.5+window_height ) ) );

}


//**************************************



  });    // <= document ready close..     <<<<<<<<<<///////\


//*********************
//svg js

var clicker = document.querySelector('#about-circle');

clicker.addEventListener('click', function(){
  
this.classList.toggle('clickit');

});

//*************









//*******************
//mobile @ media query js 

/*
$(window).resize(function(){     

       if ($(".socialCircle-container").width() == 320 ){

              // is mobile device
       }

});

*/

//****************************************************************************
//video bg js
/*
var tag = document.createElement('script');
    tag.src = 'https://www.youtube.com/player_api';
var firstScriptTag = document.getElementsByTagName('script')[0];
    firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
var tv,
    playerDefaults = {autoplay: 0, autohide: 1, modestbranding: 0, rel: 0, showinfo: 0, controls: 0, disablekb: 1, enablejsapi: 0, iv_load_policy: 3};
var vid = [
      {'videoId': 'VSbIHKs0gEQ', 'startSeconds': 5, 'endSeconds': 180, 'suggestedQuality': 'hd720'},
      {'videoId': 'QnaMOPYKXR4', 'startSeconds': 60, 'endSeconds': 657, 'suggestedQuality': 'hd720'}/*,
      {'videoId': 'OWsCt7B-KWs', 'startSeconds': 0, 'endSeconds': 240, 'suggestedQuality': 'hd720'},
      {'videoId': 'qMR-mPlyduE', 'startSeconds': 19, 'endSeconds': 241, 'suggestedQuality': 'hd720'}*//*
    ],
    randomvid = Math.floor(Math.random() * (vid.length - 1 + 1));

function onYouTubePlayerAPIReady(){
  tv = new YT.Player('tv', {events: {'onReady': onPlayerReady, 'onStateChange': onPlayerStateChange}, playerVars: playerDefaults});
}

function onPlayerReady(){
  tv.loadVideoById(vid[randomvid]);
  tv.mute();
}

function onPlayerStateChange(e) {
  if (e.data === 1){
    $('#tv').addClass('active');
  } else if (e.data === 0){
    tv.seekTo(vid[randomvid].startSeconds)
  }
}

function vidRescale(){

  var w = $(window).width()+50,
    h = $(window).height()+50;

  if (w/h > 16/9){
    tv.setSize(w, w/16*9);
    $('.tv .screen').css({'left': '0px'});
  } else {
    tv.setSize(h/9*16, h);
    $('.tv .screen').css({'left': -($('.tv .screen').outerWidth()-w)/2});
  }
}

$(window).on('load resize', function(){
  vidRescale();
});

$('.screen').on('click', function(){
  $('#tv').toggleClass('mute');
  if($('#tv').hasClass('mute')){
    tv.mute();
  } else {
    tv.unMute();
  }
});
*/

//****************************************************




function date_time(id)
{
        date = new Date;
        year = date.getFullYear();
        month = date.getMonth();
        months = new Array('January', 'February', 'March', 'April', 'May', 'June', 'Jully', 'August', 'September', 'October', 'November', 'December');
        d = date.getDate();
        day = date.getDay();
        days = new Array('Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday');
        h = date.getHours();

        var meridiem = " AM"

    // convert to 12-hour time format
    if (h > 12) {
      h = h - 12
      meridiem = ' PM'
    }
    else if (h === 0){
      h = 12
    }
//*********
/*
        if(h<10)
        {
                h = "0"+h;
        }
        m = date.getMinutes();
        if(m<10)
        {
                m = "0"+m;
        }
        s = date.getSeconds();
        if(s<10)
        {
                s = "0"+s;
        }*/
        //result = ''+days[day]+' '+months[month]+' '+d+' '+year+' '+h+':'+m+':'+s;
        //var eastern = $("#date_time span").attr('id','eastern');
        result = (date.toLocaleTimeString()+"<br>"+date.toTimeString().replace(/:\d+ /, ' '));//.replace(/.*(\d{2}:\d{2}:\d{2}).*/, "$1"));
        document.getElementById(id).innerHTML = result;
        setTimeout('date_time("'+id+'");','1000');
        return true;
}

window.onload = date_time('date_time');

  //*********
  setInterval(function(){
  $("#date_time").animate({top:'85%'},500);
    $("#date_time").animate({left:'-77%'},500).delay(6500).animate({left:'10.5%'},500);
      $("#date_time").animate({top:'68%'},500);
},15000);

// other values to use to display date:
// thisDate.toDateString() --> Thu Mar 17 2016
// thisDate.toISOString()  --> 2016-03-17T13:12:18.519Z
// thisDate.toGMTString()  --> Thu, 17 Mar 2016 13:12:18 GMT
// thisDate.toUTCString()  --> Thu, 17 Mar 2016 13:12:18 GMT
// thisDate.toTimeString() --> 09:12:18 GMT-0400 (Eastern Daylight) 
// thisDate.toTimeString().replace(/:\d+ /, ' ') --> 09:12 GMT-0400 (Eastern Daylight)
// thisDate.toLocaleTimeString() --> 9:12:18 AM 
// thisDate.toLocaleTimeString(navigator.language, {hour: '2-digit', minute:'2-digit'}) --> 9:12 AM


//****************************************************************************












//**********************************
//mouse click bg change right-c or left-c


$(".menu-icons li").on("mousedown", "a",
    function (e) {
        if (e.button == 0) {
            $(this).css("color", "crimson");
            return false;
        }
          else if (e.button == 2) {

          $(this).css("color", "black");

          }

        return true;
    });




/*

//******************************************
//bootstrap-scrollspy js

// Add scrollspy to <body>
$('body').scrollspy({target: ".cbp-vimenu", offset: 50});


// Add smooth scrolling to all links inside a navbar
$(".").on('click', function(event){

  // Prevent default anchor click behavior
  event.preventDefault();

  // Store hash (#)
  var hash = this.hash;

  // Using jQuery's animate() method to add smooth page scroll
  // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area (the speed of the animation)
  $('html, body').animate({
    scrollTop: $(hash).offset().top
  }, 1000, 'easeInOutExpo',function(){

    // Add hash (#) to URL when done scrolling (default click behavior)
    window.location.hash = hash;

  });
});
*/

//*********************************
// infinite loop ,rotating images  
/*


          $(window).load(function() { //start after HTML, images have loaded
          var InfiniteRotator =
    {
        init: function ()
        {
            //initial fade-in time (in milliseconds)
            var initialFadeIn = 300;
 
            //interval between items (in milliseconds)
            var itemInterval = 5000;
 
            //cross-fade time (in milliseconds)
            var fadeTime = 300;
 
            //count number of items
            var numberOfItems = $('#nt-example2 li img').length;
 
            //set current item
            var currentItem = 0;
 
            //show first item
            $(img).eq(currentItem).fadeIn(initialFadeIn);
 
            //loop through the items
            var infiniteLoop = setInterval(function(){
                $(img).eq(currentItem).fadeOut(fadeTime);
 
                if(currentItem == numberOfItems -1){
                    currentItem = 0;
                }else{
                    currentItem++;
                }
                $(img).eq(currentItem).fadeIn(fadeTime);
 
            }, itemInterval);
        }
    };
 
    InfiniteRotator.init();
 })


*/



//**********************************

//prevent-default-behaviour-of-hashed-anchor-tag-with-jquery


/* <![CDATA[ *//*
( function( $ ) {
   $( 'a[href="#"]' ).click( function(e) {
      e.preventDefault();
   } );
} )( jQuery );*/
/* ]]> */




