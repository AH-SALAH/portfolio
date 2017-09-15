<!-- /**************************************************************************/ -->		

		<div id="ss-button-open-bg" class="ss-button-bg">
			<button id="ss-button-open" class="ss-button"><span class="glyphicon glyphicon-share-alt"></span></button>
		</div>
	<div id="ss-wrapper">

		<ul>
		<li>		
		<div id="ss-button-close-bg" class="ss-button-bg">
			<button id="ss-button-close" class="ss-button"><span class="glyphicon glyphicon-share-alt"></span></button>
		</div>
		</li>
		<!-- ************************************************** -->
		<li>
		<div class="colors-wrapper">
			<div class="colors-container">
				<ul>
					<li><input type="button" class="btn btn-default" id="seagreen" name="seagreen" value="" data-toggle="popover" data-placement="top" data-trigger="hover" data-content="<?php _e( 'seagreen', 'asns-internal' ); ?>"></li>
					<li><input type="button" class="btn btn-default" id="darkgoldenrod" name="darkgoldenrod" value="" data-toggle="popover" data-placement="top" data-trigger="hover" data-content="<?php _e( 'darkgoldenrod', 'asns-internal' ); ?>"></li>
					<li><input type="button" class="btn btn-default" id="darkslateblue" name="darkslateblue" value="" data-toggle="popover" data-placement="top" data-trigger="hover" data-content="<?php _e( 'darkslateblue', 'asns-internal' ); ?>"></li>
					<li><input type="button" class="btn btn-default" id="darkslategray" name="darkslategray" value="" data-toggle="popover" data-placement="top" data-trigger="hover" data-content="<?php _e( 'darkslategray', 'asns-internal' ); ?>"></li>
					<li><input type="button" class="btn btn-default" id="darkkhaki" name="darkkhaki" value="" data-toggle="popover" data-placement="top" data-trigger="hover" data-content="<?php _e( 'darkkhaki', 'asns-internal' ); ?>"></li>
					<li><button type="button" class="btn btn-default" id="reset" value="delete" data-toggle="popover" data-placement="top" data-trigger="hover" data-content="<?php _e( 'デフォルトに戻る', 'asns-internal' ); ?>" title=""><span class="glyphicon glyphicon-repeat"></span></button></li>
				</ul>
			</div>
		</div>
		</li>


		<!-- ************************************************** -->
		<li>
		<div class="social-share">
			<div class="socialCircle-container">

		  		<div class="socialCircle-item"><a href="https://plus.google.com/share?url=<?php echo esc_url( home_url() ); ?>" title="google plus +" target="new_tab"><i class="fa fa-google-plus"></i></a></div>
		  		<div class="socialCircle-item"><a href="https://github.com/share?url=<?php echo esc_url( home_url() ); ?>" title="github" target="new_tab"><i class="fa fa-github"></i></a></div>
		  		<div class="socialCircle-item"><a href="https://linkedin.com/share?url=<?php echo esc_url( home_url() ); ?>" title="linkedin" target="new_tab"><i class="fa fa-linkedin"></i></a></div>
		  		<div class="socialCircle-item"><a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo esc_url( home_url() ); ?>" target="new_tab" title="facebook"><i class="fa fa-facebook" ></i></a></div>
		  		<div class="socialCircle-item"><a href="https://twitter.com/share?url=<?php echo esc_url( home_url() ); ?>" title="twitter" target="new_tab"><i class="fa fa-twitter"></i></a></div>
		  		<div class="socialCircle-item"><a href="https://pinterest.com/share?url=<?php echo esc_url( home_url() ); ?>" title="pinterest" target="new_tab"><i class="fa fa-pinterest"></i></a></div>
		  		<div class="socialCircle-center closed"><i class="fa fa-share-alt" title="<?php echo __('share','asns-internal') ?>" ></i></div>

			</div>
		</div>
		</li>
			<!--/**********************************************/-->		
		<li>
		<div id="switch" class="switch demo4">
			<input type="checkbox" id="switch-input" data-toggle="popover" data-placement="top" data-trigger="hover" data-content="<?php _e( 'switch off/on', 'asns-internal' ); ?>" >
			<label><i class="fa fa-power-off"></i></label>
		</div>
		</li>
		</ul> <!-- ul -->
	</div> <!-- #ss-wrapper -->

<!--/**************************************************************************/-->		


	<div class="container">
			<div class="menu-wrap" id="footer-menu">
				<nav class="menu">
					<div class="icon-list">
<!--<i class="fa fa-copyright"></i>--><p><?php echo esc_html( asns_copyright() ); ?></p> <a href="#"><span>AS</span><span>NS </span></a> |<p> <?php _e( 'All rights reserved', 'asns-internal' );  ?></p>.
								
						<!--
						<a href="#"><i class="fa fa-fw fa-bell-o"></i><span>Alerts</span></a>
						<a href="#"><i class="fa fa-fw fa-envelope-o"></i><span>Messages</span></a>
						<a href="#"><i class="fa fa-fw fa-comment-o"></i><span>Comments</span></a>
						<a href="#"><i class="fa fa-fw fa-bar-chart-o"></i><span>Analytics</span></a>
						<a href="#"><i class="fa fa-fw fa-newspaper-o"></i><span>Reading List</span></a>
						-->
					</div>

				</nav>
				<span><?php echo __('わぁ~! 戻る...(~ょ~)','asns-internal'); ?></span>
				<button class="close-button" id="close-button">Close Menu</button>
				
				<div class="morph-shape" id="morph-shape" data-morph-open="M0,100h1000V0c0,0-136.938,0-224,0C583,0,610.924,0,498,0C387,0,395,0,249,0C118,0,0,0,0,0V100z">
					<svg xmlns="http://www.w3.org/2000/svg" id="wave" width="100%" height="100%" viewBox="0 0 1000 100" preserveAspectRatio="none">
						<path d="M0,100h1000l0,0c0,0-136.938,0-224,0c-193,0-170.235-1.256-278-35C399,34,395,0,249,0C118,0,0,100,0,100L0,100z"/>
					</svg>
				</div>
			</div>
	</div>

<!--/**************************************************************************/-->		



	</div><!-- row -->
</div><!-- container fluid -->


<!--/**************************************************************************/-->		




    <!-- Plugin JavaScript -->

<!-- <script type="text/javascript" src="https://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
 --><script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui-touch-punch/0.2.3/jquery.ui.touch-punch.min.js"></script>
<!----><!--<script type="text/javascript" src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/socialcircle.js"></script> 
<script type="text/javascript" src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/modernizr.custom.js"></script>
<script type="text/javascript" src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/classie.js"></script>
<script type="text/javascript" src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/jquery.easing.min.js"></script>
<script type="text/javascript" src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/mainLoader.js"></script>
<script type="text/javascript" src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/mainWave.js"></script>
<script type="text/javascript" src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/asns.js"></script>
<script type="text/javascript" src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/jquery.newsTicker.min.js"></script>
<script type="text/javascript" src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/typewriter.js"></script>
-->
<!--<script type="text/javascript" src="js/marquee.js"></script>-->

<!--/**************************************************************************/-->		

	</body>
</html>

