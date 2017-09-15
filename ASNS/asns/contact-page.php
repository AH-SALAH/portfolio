<?php /* Template Name: contact template */

//require_once get_template_directory() . '/inc/contact/contact-form.php';

?>

<!--<!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?> >
	<head>
		<meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php wp_title(); //_e( 'Write to Me', 'asns' ); ?></title>
        <meta name="description" content="ASNS contact form">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
        <link href='http://fonts.googleapis.com/css?family=Yanone+Kaffeesatz:400,700,300,200' rel='stylesheet' type='text/css'>
 		<link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() ); ?>/inc/contact/assets/css/base.css">
		</head>	
		<body>
 -->	

 <link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() ); ?>/inc/contact/assets/css/style.css">
	
		
		<h1 class="page-title"><?php _e( 'CONTACT', 'asns' ); ?></h1>
		<h2 class="page-description"><?php _e( 'コンタクト', 'asns' ); ?></h2>
		
		<div class="container">
		
<!-- 			<div class="loading">
				<div class="rect1"></div>
				<div class="rect2"></div>
				<div class="rect3"></div>
				<div class="rect4"></div>
				<div class="rect5"></div>
				<p>Sending..</p>
			</div>
 -->			
		<!--	<div class="input-container recipient-container">
			    <label for="emailRecipient">Insert your email address</label>
			    <input type="email" id="emailRecipient" placeholder="your email" class="first-input" required>
			</div>
			<p class="description">No worries! I won't store, save, or copy your email and you won't receive any email spam from me. I need an email so you can receive the message that you're going to send thru this form.<br />If you're not interested in seeing the message, <a href="#" class="no-recipient">click here</a></p>
			-->	
<!--  			<form id="form-send" method="post">
 -->				
				<div class="mail-container">
					
					<div class="mail-content">
						
						<div class="mail-front">
							
							<div class="mail-body">

								<?php 
									$page= get_page_by_title('contact');; 
									//$post = get_post($id); 
									$content = apply_filters('the_content', $page->post_content); 
									echo $content;  
								?>

<!-- 								<div class="input-container required name-input">
								    <label for="nameUser">Insert your name</label>
								    <input type="text" id="nameUser" placeholder="your name" class="send-input" required>
								</div>
								
								<div class="input-container required email-input">
								    <label for="emailUser">Insert your email address</label>
								    <input type="email" id="emailUser" placeholder="your email" class="send-input" required>
								</div>
								
								<div class="input-container required msg-input">
								    <label for="msgUser">How can I help you?</label>
								    <textarea id="msgUser" rows="3" placeholder="your message" class="send-input" required></textarea>
								</div>
								
							</div>
								<div class="input-container">
									<input id="foo" type="hidden" value=""> --><!-- leave this hidden input without values for SPAM prevention -->
									<!-- change the button with this one for your code => <button type="submit" class="btn send"><span>Send</span></button> -->
<!--  									<button type="submit" class="btn send"><span>Send</span></button>
								</div>
								<p id="error-technical" style="display:none;text-align:center;" >Some thing went wrong ...please try again...</p>
 -->					<br>

						</div>
					
 						<div class="mail-back">
						
							<div class="mail-body">
							
								<i class="fa fa-paper-plane fa-5x"></i>
								
								<p class="thanks-title"><?php _e( 'Thank you!', 'asns' ); ?></p>
								<p class="thanks-msg"><?php _e( 'Your email is on its way', 'asns' ); ?></p>
								
								<a href="#" class="reload"><?php _e( 'Send another one', 'asns' ); ?></a>
								
							</div>
							
						</div>
							
						</div>
 						
					</div>
					
				</div>
							
<!-- 			</form>
 -->		
		</div>
<!--  	</body>
</html> -->