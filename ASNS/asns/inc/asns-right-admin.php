<br>
<h1><?php bloginfo('name'); _e(' Right Author Setting','asns'); ?></h1>
<?php settings_errors(); ?>
<?php
	$get_right_picture = esc_attr( get_option('right_user_pic') );

	$rightFirstName = esc_attr( get_option('right_first_name' ) );
	$rightLastName = esc_attr( get_option('right_last_name' ) );
	$rightFullName = $rightFirstName .' '.$rightLastName;

	$rightDescription = esc_attr( get_option('right_user_description' ) );

	$rightColor = esc_attr( get_option('right_color_picker_handler' ) );
	$get_right_bg_img = esc_attr( get_option('right_bg_handler') );
	$right_video_src = esc_attr( get_option('right_video_src' ) );
?>
<div class="asns-sidebar-preview right-author" style="background-color:<?php print $rightColor; ?>;background-image:url(<?php print $get_right_bg_img; ?>);">
	<?php if ( !empty($right_video_src) ) : 
		echo '<div class="vid">';
		echo '<iframe 
		        id="yt-video" src="https://www.youtube.com/embed/'.$right_video_src.'?rel=0&amp;showinfo=0&amp;controls=0&amp;autoplay=0&amp;autohide=1&amp;modestbranding=0&amp;showinfo=0&amp;disablekb=1&amp;enablejsapi=0&amp;iv_load_policy=3&amp;loop=1&amp;fs=0&amp;cc_load_policty=0&amp;start=&amp;end=" width="100%" height="100%" style="background:whitesmoke;" frameborder="0" allowtransparency="true" allowfullscreen>
		        </iframe>';
		echo  '</div>';
	 endif; ?>

	<div class="asns-sidebar">
		<div id="user-profile-pic" style="background: url(<?php print $get_right_picture; ?>); ">
			<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/profile3.jpg"/>
			<img src="https://encrypted-tbn3.gstatic.com/images?q=tbn:ANd9GcREfOozQXzzAPkEVGf4pva_sIWUiNO-zN5VWTvzpWVqDtDwNKMmHA"/>
		</div>
		<h1 class="asns-username"><?php print $rightFullName; ?></h1>
		<h2 class="asns-description"><?php print $rightDescription; ?></h2>
		<div class="icons-wrapper">
			
		</div>
	</div>
</div>

<form class="asns-admin-page-form" method="post" action="options.php">
	<?php settings_fields('asns-settings-right-user-group'); ?>
	<?php do_settings_sections('asns_right_settings'); ?>
	<?php submit_button( 'Save Changes', 'primary', 'btnSubmit'); ?>
</form>

<!-- ************************************************* -->
