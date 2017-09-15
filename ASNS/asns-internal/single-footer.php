<?php 
/*
	===========================
	single-footer template
	===========================
*/
 ?>

<section class="shita">
	<center>
	<p id="copy"><?php echo esc_html( asns_copyright() ); ?>  <span>AS</span>NS | <?php _e( 'All rights reserved', 'asns-internal' );  ?>.</p>
	</center>
</section>

        <div id="toTop"><i class="fa fa-arrow-up fa-2x"></i></div>

	<!-- Modal -->

  <div class="modal fade" id="single-modal" role="dialog">
	<div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-body">

        	<button type="button" class="close single-close" id="close-x" data-dismiss="modal"><i class="fa fa-power-off"></i></button>    

        </div>
      </div>
    </div>
  </div>

<!-- Modal -->

</div><!-- /container -->

<!-- <script type="text/javascript" src="https://code.jquery.com/ui/1.11.4/jquery-ui.js"></script> -->
<script type="text/javascript" src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/classie.js"></script>
<!-- <script type="text/javascript" src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/jquery.nicescroll.js"></script> -->
<script type="text/javascript" src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/single-js.js"></script>



	</body>
</html>

