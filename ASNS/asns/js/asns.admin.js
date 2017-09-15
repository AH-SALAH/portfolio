jQuery(document).ready(function ($){


  function preloadFunc(){

  	if (sessionStorage.getItem('bodyIntro') !== 'true') {
 
		   $('body').addClass('body-intro');        
         		$(".intro-loader").css({display:'block'}); 
					$(".announce1").delay(7000).show("slide",{direction:"right"},"easeInOutExpo",300);


		sessionStorage.setItem('bodyIntro','true');
	}
			// ------------------------------//

	  	if (sessionStorage.getItem('wpadminbaropen') == 'true') {
			
			var val1 = "0px";
			$("#wpadminbar").css({transform:'translateX('+val1+')'});
				$("#wpadminbar #wp-admin-bar-root-default .adminmbtnopen").delay(500).hide("highlight",{"color":"#ffffff"},"easeInOutExpo",500);
					$("#wpadminbar #wp-admin-bar-root-default .adminmbtnopen").css({left:'-100%'});	
			}

}
     preloadFunc();

// -----------------------------------
$("#wpwrap,#wpbody").animate({opacity:'1'},700);

// -----------------------------------
	setTimeout(function(){

        $('body').removeClass('body-intro');       

			$(".intro-loader").fadeOut(1000);
			
				$('#wpwrap').animate({opacity:'1'},700);

	},5000);


// ***********************************************
	setTimeout(function(){
		$(".announce1").hide("slide",{direction:"right"},"easeInOutExpo",500);
	},14000);


// ***********************************************
//  announce js

$("a.a-mis").on('click',function(e){
	e.preventDefault();
	$(".announce1").hide("slide",{direction:"right"},"easeInOutExpo",500);
});


// setInterval(function(){
// 	$(".announce1").toggle("slide",{direction:"right"},"easeInOutExpo",300);
// },60000);


// ***********************************************

	var backVal = '0%';
	$(".asns-sidebar-preview").addClass('preview-back');
		$("form.asns-admin-page-form,form.theme-option").delay(500).addClass('form-back').css({transform:'translateY('+ backVal +')'});


	var mediaUploader;

	$("#pic-upload-button").on('click',function(e){
		e.preventDefault();
		if (mediaUploader) {
			mediaUploader.open();
			return;
		}

		mediaUploader = wp.media.frames.file_frame = wp.media({
			title:"Choose a Picture",
			button: {
				text: 'Choose Picture'
			},
			multiple: false //change to true if you want to upload a multiple files.
		});
		mediaUploader.on('select',function(){
			attachment = mediaUploader.state().get('selection').first().toJSON();
			$("#pic-upload-handler").val(attachment.url);
				$("#user-profile-pic").css({background:'url(' + attachment.url + ')',backgroundSize:'cover'}).hide().fadeIn(1000);
			});

		mediaUploader.open();			

	});

		$("#pic-upload-reset").on('click',function(e){
			e.preventDefault();
			var answer = confirm("Are you sure you want to remove the picture?");
			if (answer == true) {
    			var img = $(".asns-sidebar-preview img").attr('src');
				$("#pic-upload-handler").val(img); //reset the val to empty
					$("#user-profile-pic").css({background:'url(' + img + ')',backgroundSize:'cover',backgroundPosition:'center center',backgroundRepeat:'no-repeat'}).hide().fadeIn(1000);			
						//$(".asns-admin-page-form").submit();
			}
			return;
			});
//---------------------------------------------------
		$("input#first-name,input#last-name").keypress(function(e){
		var val1 = $("input#first-name").val();
		var val2 = $("input#last-name").val();
		$(".asns-username").text(val1 +' '+ val2);
		});

		$("#user-description").keypress(function(e){
		var val = $(this).val();
		var space = ' ';
		$(".asns-description").text(val + space);
		});

		jQuery(function(error){
		var setError = $("#setting-error-settings_updated"); 
		if (setError = error) {
			var mark = '<span class="dashicons dashicons-marker"></span>';
			$("#setting-error-settings_updated p:first strong").before(mark,' ');
		}
		});

//****************************************************
// fav-icon js

	var favMediaUploader;

	$("#fav-icon-upload-button").on('click',function(e){
		e.preventDefault();
		if (favMediaUploader) {
			favMediaUploader.open();
			return;
		}

		favMediaUploader = wp.media.frames.file_frame = wp.media({
			title:"Choose a Picture",
			button: {
				text: 'Choose Picture'
			},
			multiple: false //change to true if you want to upload a multiple files.
		});
		favMediaUploader.on('select',function(){
			attachment = favMediaUploader.state().get('selection').first().toJSON();
			$("#fav-icon-upload-handler").val(attachment.url);
				$(".theme-option #fav-icon-pic").css({background:'url(' + attachment.url + ')',backgroundSize:'cover',backgroundPosition:'center center',border:'none',borderRadius:'0px',backgroundRepeat:'no-repeat'}).hide().fadeIn(1000);
			});

		favMediaUploader.open();			

	});

		$("#fav-icon-upload-reset").on('click',function(e){
			e.preventDefault();
			var answer = confirm("Are you sure you want to remove the picture?");
			if (answer == true) {
    			var img = $(".asns-sidebar-preview img").attr('src');
				$("#fav-icon-upload-handler").val(img); //reset the val to empty
					$("#fav-icon-pic").css({background:'url(' + img + ')',backgroundSize:'cover',backgroundPosition:'center center',backgroundRepeat:'no-repeat'}).hide().fadeIn(1000);			
						//$(".theme-option").submit();
			}
			return;
			});

//======================================
//left-admin-color-picker

$('#left-color-picker').wpColorPicker({
	palettes:true,
	change: function(event,ui) {
        // change the preview bg-color
	//var currentColor = $('.wp-color-result').css("background-color");
	$('div.asns-sidebar-preview.left-author').css('background-color', ui.color.toString() );

    }
});

//-----------------------------

	$('.wp-picker-clear.leftclear').on('click',function() {
		$('#left-color-picker').val(null);
			$('.wp-color-result').css({backgroundColor:''});
	});

	$('.wp-picker-default').on('click',function() {
		var defaultColor = $('#left-color-picker').attr('data-default-color');
			$('.wp-color-result').css({backgroundColor:''+defaultColor+''});
	});

//-----------------------------------------------------
//right-admin-color-picker

$('#right-color-picker').wpColorPicker({
	palettes:true,
	change: function(event,ui) {
        // change the preview bg-color
	//var currentColor = $('.wp-color-result').css("background-color");
	$('div.asns-sidebar-preview.right-author').css('background-color', ui.color.toString() );

    }
});

//------------------------------------
	$('.wp-picker-clear.rightclear').on('click',function() {
		$('#right-color-picker').val(null);
			$('.wp-color-result').css({backgroundColor:''});
	});

	$('.wp-picker-default').on('click',function() {
		var defaultColor = $('#right-color-picker').attr('data-default-color');
			$('.wp-color-result').css({backgroundColor:''+defaultColor+''});
	});


//****************************************************
// left side M-uploader js

	var lSideMediaUploader;

	$("#left-bg-upload-button").on('click',function(e){
		e.preventDefault();
		if (lSideMediaUploader) {
			lSideMediaUploader.open();
			return;
		}

		lSideMediaUploader = wp.media.frames.file_frame = wp.media({
			title:"Choose a Picture",
			button: {
				text: 'Choose Picture'
			},
			multiple: false //change to true if you want to upload a multiple files.
		});
		lSideMediaUploader.on('select',function(){
			attachment = lSideMediaUploader.state().get('selection').first().toJSON();
			$("#left-bg-upload-handler").val(attachment.url);
				$(".asns-sidebar-preview.left-author").css({background:'url(' + attachment.url + ')',backgroundSize:'cover',backgroundPosition:'center center',border:'none',borderRadius:'0px',backgroundRepeat:'no-repeat'}).hide().fadeIn(1000);
			});

		lSideMediaUploader.open();			

	});

		$("#left-bg-upload-reset").on('click',function(e){
			e.preventDefault();
			var answer = confirm("Are you sure you want to remove the picture?");
			if (answer == true) {
    			var color = $(".asns-sidebar-preview.left-author").css('background-color');
				$("#left-bg-upload-handler").val(null); //reset the val to empty
					$(".asns-sidebar-preview.left-author").css({background:''+color+''}).hide().fadeIn(1000);			
						//$(".asns-admin-page-form").submit();
			}
			return;
			});


//****************************************************
// right side M-uploader js

	var rSideMediaUploader;

	$("#right-bg-upload-button").on('click',function(e){
		e.preventDefault();
		if (rSideMediaUploader) {
			rSideMediaUploader.open();
			return;
		}

		rSideMediaUploader = wp.media.frames.file_frame = wp.media({
			title:"Choose a Picture",
			button: {
				text: 'Choose Picture'
			},
			multiple: false //change to true if you want to upload a multiple files.
		});
		rSideMediaUploader.on('select',function(){
			attachment = rSideMediaUploader.state().get('selection').first().toJSON();
			$("#right-bg-upload-handler").val(attachment.url);
				$(".asns-sidebar-preview.right-author").css({background:'url(' + attachment.url + ')',backgroundSize:'cover',backgroundPosition:'center center',border:'none',borderRadius:'0px',backgroundRepeat:'no-repeat'}).hide().fadeIn(1000);
			});

		rSideMediaUploader.open();			

	});

		$("#right-bg-upload-reset").on('click',function(e){
			e.preventDefault();
			var answer = confirm("Are you sure you want to remove the picture?");
			if (answer == true) {
    			var color = $(".asns-sidebar-preview.right-author").css('background-color');
				$("#right-bg-upload-handler").val(null); //reset the val to empty
					$(".asns-sidebar-preview.right-author").css({background:''+color+''}).hide().fadeIn(1000);			
						//$(".asns-admin-page-form").submit();
			}
			return;
			});

// ===============================================
// video input on focus

$("#left-video-src,#right-video-src,#left-start-value,#left-end-value,#right-start-value,#right-end-value").on('focus',function(){
	$(".left-value-wrapper,.right-value-wrapper").fadeIn(1);
});
$("#left-video-src,#right-video-src,#left-start-value,#left-end-value,#right-start-value,#right-end-value").on('focusout',function(){
	$(".left-value-wrapper,.right-value-wrapper").fadeOut(1);
});



//*********************************
// niceScroll jq

$("body").niceScroll({ 
  autohidemode: true,
  cursorcolor: "#dc143c",
  cursorborder:"",
  background: "#4b0082",
  bouncescroll: true,
  boxzoom: false,
  dblclickzoom: true 
});

// *******************************
// admin menu bar button's js

$("#wpadminbar #wp-admin-bar-root-default .adminmbtnopen").on('click',function(e){
	e.preventDefault();
	var val1 = "0px";
			$("#wpadminbar").css({transform:'translateX('+val1+')'});
				$(this).delay(500).hide("highlight",{"color":"#ffffff"},"easeInOutExpo",500);
					$(this).css({left:'-100%'});	
						sessionStorage.setItem('wpadminbaropen','true');

});

$("#wpadminbar #wp-admin-bar-root-default .adminmbtnclose").on('click',function(e){
	e.preventDefault();
	var val2 = "-100%";
		$("#wpadminbar").css({transform:'translateX('+val2+')'});	
			$("#wpadminbar #wp-admin-bar-root-default .adminmbtnopen").css({left:'100%'});
				$("#wpadminbar #wp-admin-bar-root-default .adminmbtnopen").delay(500).show("highlight",{"color":"#ffffff"},"easeInOutExpo",500);
					sessionStorage.removeItem('wpadminbaropen','true');
});

// *****************************************


$("#wp-admin-bar-my-account").on('hover',function(){
	$("#wpadminbar .ab-top-secondary .menupop .ab-sub-wrapper").toggle("slide",{direction:"up"},"easeInOutExpo",300);
});


// *****************************************
// --------------------------------------
// avatar admin pic

var pic_hidden_input = $("#admin-avatar").val();

var input = $("td.defaultavatarpicker #avatar_admin-avatar");
var srcset = '?s=64&d=adminavatar&r=g&forcedefault=1 2x';
var src = '?s=32&d=adminavatar&r=g&forcedefault=1';

input.attr('value','adminavatar');

$("td.defaultavatarpicker label:last img").attr({'src':pic_hidden_input+src,'srcset':pic_hidden_input+srcset})

if ( input.is(':checked') ) {

	$("#wpadminbar #wp-admin-bar-my-account.with-avatar > a img").attr({'src':pic_hidden_input+src,'srcset':pic_hidden_input+srcset});
		$("#wp-admin-bar-user-info .avatar").attr({'src':pic_hidden_input+src,'srcset':pic_hidden_input+srcset});

if ($('.comment').hasClass('comment-author-admin') ) {
	$(".comment-author-admin .column-author img").attr({'src':pic_hidden_input+src,'srcset':pic_hidden_input+srcset});
}

if ( $("#dashboard_activity") && $('.comment').hasClass('comment-author-admin') ) {
		$(".comment-author-admin img").attr({'src':pic_hidden_input+src,'srcset':pic_hidden_input+srcset});
}
	
if ( $(".users") && $('input').hasClass('administrator') ) {
	$("table.users img").attr({"src":pic_hidden_input+src,"srcset":pic_hidden_input+srcset});
}


}


// ****************************
}); //doc ready end