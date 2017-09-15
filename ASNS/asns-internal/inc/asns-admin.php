<br>
<h1><?php bloginfo('name'); ?></h1>
<?php settings_errors(); ?>
<?php
	$get_picture = esc_attr( get_option('user_pic') );

	//$firstName = esc_attr( get_option('first_name' ) );
	//$lastName = esc_attr( get_option('last_name' ) );
	//$fullName = $firstName .' '.$lastName;

	//$description = esc_attr( get_option('user_description' ) );

	$get_logo = esc_attr( get_option('logo') );
	$fav = esc_attr( get_option('fav_icon') );
?>
<div class="asns-sidebar-preview">
	<div class="asns-sidebar">
		<div id="user-profile-pic" style="background: url(<?php print $get_picture; ?>); ">
			<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/profile1.jpg"/>
			<img src="https://encrypted-tbn3.gstatic.com/images?q=tbn:ANd9GcREfOozQXzzAPkEVGf4pva_sIWUiNO-zN5VWTvzpWVqDtDwNKMmHA"/>
		</div>
	<!--	<h1 class="asns-username"><?php print $fullName; ?></h1>
		<h2 class="asns-description"><?php print $description; ?></h2> -->
		<div class="icons-wrapper">	</div>
<hr>
		<h2 class="logo-h2">-<?php echo __('Logo Picture','asns-internal') ?>-</h2>
		<div id="logo-pic" style="background: url(<?php print $get_logo; ?>); ">
		</div>
<hr>
		<h2 class="fav-h2">- <?php echo __('Fav Icon','asns-internal') ?>-</h2>
		<div id="fav-icon-pic" style="background: url(<?php print $fav; ?>); ">
		</div>

	</div>
</div>


<form class="asns-admin-page-form" method="post" action="options.php">
	<?php settings_fields('asns-settings-group'); ?>
	<?php do_settings_sections('asns_option'); ?>
	<?php submit_button(); ?>
</form>
