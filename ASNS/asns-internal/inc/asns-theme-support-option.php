<br>
<h1><?php bloginfo('name');  _e(' Theme Option','asns-internal'); ?></h1>
<?php settings_errors(); ?>

<form class="theme-option" method="post" action="options.php">
	<?php settings_fields('asns-theme-option-page'); ?>
	<?php do_settings_sections('asns_theme_support_option'); ?>
	<?php submit_button( 'Save Changes', 'primary', 'btnSubmit'); ?>
</form>
