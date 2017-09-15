<?php
/*
 * The template for displaying search forms
 *
 * @author Ahmed Salah |
 */
 ?>


<style type="text/css">
	@import url("<?php echo esc_url( get_template_directory_uri() ); ?>/css/article-intro-css/component.css");
</style>



<form role="search" method="get" class="search-form form-inline" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>" >
	<div class="form-group">
<span class="wrap" onclick="document.getElementById('searchfield').style.transform = 'perspective(1000px) rotate3d(1, 0, 0, 0deg)'" >
		<input type="search" class="search-field form-control" id="searchfield" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'asns-internal' ); ?>" value="<?php echo esc_attr( get_search_query() ); ?>" name="s" title="<?php _ex( 'Search for:', 'label', 'asns-internal' ); ?>">
		<label class="search"><i class="fa fa-search"></i></label></span>
	</div>
	<!--<input type="submit" class="search-submit btn btn-default" value="<?php echo esc_attr_x( 'Search', 'submit button', 'asns-internal' ); ?>">-->
</form>

<script type="text/javascript">
	//*******************************

$("#searchfield").on('focusout',function(){
	if(document.activeElement.id!=='searchform'){
    	  var val3 = '1, 0, 0, 90deg';
    	$("#searchfield").css({ 'transform':'rotate3d('+ val3 +')', 'transition': 'all 0.7s ease-in-out'});
	}
});

//***********************************
//search popup modal on enterkey press

$("form input").keypress(function (e) {
  //e.preventDefault();
 // var url = 'search'; 

 if (((e.which && e.which == 13) || (e.keyCode && e.keyCode == 13)) &&
  ($("#searchfield").filter(function() { return $(this).val(); }).length == 0)) {
      alert("please,write a query or any word in order to search! \n 検索するために、クエリを書いて,または何らの言葉を書いて下さい！");
      return false;
 } else {
        return true;
    }
});

</script>
