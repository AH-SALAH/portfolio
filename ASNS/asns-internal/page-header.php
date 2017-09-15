<?php
/*
 * The template for displaying page-header
 *
 * @author: Ahmed Salah |
 */
?>


<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
        <meta name="viewport" content="width=device-width, initial-scale=1"> 
        <title><?php wp_title(); ?></title>
        <meta name="description" content="next generation of web design" />
        <meta name="keywords" content="personal,design,web,web design,designs,site,website,slick,slick web design,new,unique,fun,fresh design," />
        <meta name="author" content="AS" />
        <link rel="shortcut icon" href="<?php echo esc_url( get_template_directory_uri() ); ?>/../ASNS/img/asns-11.png">     

        <link rel="stylesheet" type="text/css" href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/article-intro-css/normalize.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/article-intro-css/demo.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/article-intro-css/component.css" />
<!--        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" type="text/css">
 <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">-->
<?php wp_head(); ?>
<!-- <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
 -->
        <!--[if IE]>
        <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
    </head>
    
    <body class="demo-2" <?php body_class(); ?>>

        <div id="container" class="container intro-effect-fadeout">
            <!-- Top Navigation -->
            <nav id="asns-top" class="asns-top clearfix" data-spy="affix" data-offset-top="500">
              <div class="container-fluid">
                <div class="navbar-header">
                  <button type="button" class="navbar-toggle mini-menu-button" data-toggle="collapse" data-target="#myNavbar">
                    <span class="glyphicon glyphicon-menu-hamburger"></span>
                  </button>
                  <!--<a class="navbar-brand" href="#">WebSiteName</a>-->
                </div>

                <div class="collapse navbar-collapse nav-div" id="myNavbar">
                  <ul id="nav-ul" class="nav-ul nav navbar-nav">
                  <?php $page1 = get_page_by_title('about');
                        $page2 = get_page_by_title('map');    
                    ?> 
                      <li><?php wp_list_pages('sort_column=menu_order&depth=1&title_li=&exclude='.$page1->ID.','.$page2->ID); ?></li>
                  </ul>

                  <ul class="nav navbar-nav navbar-right">
                    <li><a href="<?php echo home_url(); ?>" class="home glyphicon glyphicon-home fa-2x"></a></li>
                  </ul>

                </div>
              </div>
            </nav>

            <header class="header">

                <div class="bg-img">                    
                            <?php 
                    if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
                        the_post_thumbnail();
                    } 
                    ?>
                <div class="title">
                    <h1><?php the_title(); ?></h1>
                </div> <!-- .title -->

            </header>
                
                <button class="trigger" data-info="読む続き"><span><i class="fa fa-arrow-down fa-1x"></i><?php _e( 'Trigger', 'asns-internal' ); ?></span></button>
