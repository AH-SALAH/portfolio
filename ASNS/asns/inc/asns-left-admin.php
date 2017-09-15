<br>
<h1><?php bloginfo('name');  _e(' Left Author Setting','asns'); ?></h1>
<?php settings_errors(); ?>
<?php
	$get_left_picture = esc_attr( get_option('left_user_pic') );

	$leftFirstName = esc_attr( get_option('left_first_name' ) );
	$leftLastName = esc_attr( get_option('left_last_name' ) );
	$leftFullName = $leftFirstName .' '.$leftLastName;

	$leftDescription = esc_attr( get_option('left_user_description' ) );

	$leftColor = esc_attr( get_option('left_color_picker_handler' ) );
	$get_left_bg_img = esc_attr( get_option('left_bg_handler') );
	$left_video_src = esc_attr( get_option('left_video_src' ) );
?>
<div class="asns-sidebar-preview left-author" style="background-color:<?php print $leftColor; ?>;background-image:url(<?php print $get_left_bg_img; ?>);">
	<?php if ( !empty($left_video_src) ) : 
		echo '<div class="vid">';
		echo '<iframe 
		        id="yt-video" src="https://www.youtube.com/embed/'.$left_video_src.'?rel=0&amp;showinfo=0&amp;controls=0&amp;autoplay=0&amp;autohide=1&amp;modestbranding=0&amp;showinfo=0&amp;disablekb=1&amp;enablejsapi=0&amp;iv_load_policy=3&amp;loop=1&amp;fs=0&amp;cc_load_policty=0&amp;start=&amp;end=" width="100%" height="100%" style="background:whitesmoke;" frameborder="0" allowtransparency="true" allowfullscreen>
		        </iframe>';
		echo  '</div>';
	 endif; ?>

		<div class="asns-sidebar">
		<div id="user-profile-pic" style="background: url(<?php print $get_left_picture; ?>); ">
			<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/profile3.jpg"/>
			<img src="https://encrypted-tbn3.gstatic.com/images?q=tbn:ANd9GcREfOozQXzzAPkEVGf4pva_sIWUiNO-zN5VWTvzpWVqDtDwNKMmHA"/>
		</div>
		<h1 class="asns-username"><?php print $leftFullName; ?></h1>
		<h2 class="asns-description"><?php print $leftDescription; ?></h2>
		<div class="icons-wrapper">
			
		</div>
	</div>
</div>

<form class="asns-admin-page-form" method="post" action="options.php">
	<?php settings_fields('asns-settings-left-user-group'); ?>
	<?php do_settings_sections('asns_left_settings'); ?>
	<?php submit_button( 'Save Changes', 'primary', 'btnSubmit'); ?>
</form>

<!-- ************************************************* -->
