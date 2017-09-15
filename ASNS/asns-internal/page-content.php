<?php
/*
 * The template for displaying page-content
 *
 * @author: Ahmed Salah |
 */
?>


<article class="content">
    <div class="hidari col-xs-12">
        <div class="hidari-content">

        <?php if(have_posts()) : ?>
            <?php while(have_posts()) : the_post(); ?>

                <?php if(function_exists('asns_breadcrumbs')) asns_breadcrumbs(); ?>
                    <?php the_content(); ?> 
            <?php endwhile; ?>  
        <?php endif; ?>
                <?php
                  // Use rewind_posts() to use the query a second time.
            rewind_posts();
         
            // Start a new loop
            while ( have_posts() ) : the_post();          
                if (function_exists("wp_pagination")) {
                    wp_pagination();
                } 
            endwhile;
        ?>    

           
<!--        <div class="post-tags"><span class="glyphicon glyphicon-tags"></span>&nbsp;
       <?php
        $title = the_post_thumbnail( array(40,40) );
        $tags = wp_get_post_tags($post->ID);
             if ($tags) {
               foreach($tags as $tag) {
                   echo '<p>' . $title . '<a href="' . get_term_link( $tag, 'post_tag' ) . '" title="' . sprintf( __( 'View all posts in %s','asns-internal' ), $tag->name ) . '" ' . '>' . $tag->name.'</a>
                        has ' . $tag->count . ' post(s). </p> ';
               }
             }
        ?>
        </div> <!-- .post-tags -->

            <?php
            $original_post = $post;
            $tags = wp_get_post_tags($post->ID);
            if($tags)
            {
                echo  '<h4 class="related-posts-title">| '. __( 'You may interested in', 'asns-internal' ) .' :</h4>';
                  echo '<div class="related-posts-content-container">';
                    echo '<button id="related-posts-lb">&#8826;</button>';
                       echo '<div class="related-posts-content-wrapper">';
                          echo '<div class="related-posts-content">';
                $sendTags = array();
                foreach($tags as $tag)
                    $sendTags[] = $tag->term_id;
                     
                $args = array(
                    'tag__in' => $sendTags,
                    'post__not_in' => array($post->ID),
                    'showposts' => 7,
                    'ignor_sticky_posts' => 1,
                    'orderby' => 'rand',
                );
                 
                $queryDb = new WP_Query($args);
                if($queryDb->have_posts())
                {
                            echo '<ul>';
                    while ($queryDb->have_posts()) { $queryDb->the_post();
            ?>
                        <li><a id="img-link" href="<?php esc_url( the_permalink() ); ?>"rel="related-posts" title="<?php the_title_attribute(); ?>"><?php if ( has_post_thumbnail() ) { the_post_thumbnail('thumbnail'); } ?></a>
                            <div class="related-subcontent">
                                <div class="inner">
                                    <h4><a id="data-link" href="<?php esc_url( the_permalink() ); ?>" rel="related-posts" title="<?php the_title(); ?>"><?php the_title(); ?></a></h4>
                                    <time><span class="glyphicon glyphicon-time"></span> <?php the_time( esc_html( 'M j, Y' ) ); ?> </time>
                                    <br> <span><?php setPostViews(get_the_ID()); ?><?php printf( esc_html( ' %d ', 'asns-internal' ), getPostViews( get_the_ID()) );  ?> <i class="fa fa-eye" aria-hidden="true"></i></span>
                                </div>
                            </div>
                        </li>
            <?php  }
                    
                            echo '</ul>';
                        echo '</div>';
                     echo '</div>';
                   echo '<button id="related-posts-rb">&#8827;</button>';
                echo '</div>';

                }
            }
            $post = $original_post;
            wp_reset_query();
            ?>
<br>
        <div class="qr-code" style="width:100%;height:100%;display:block;border-top:1px solid;padding:1%;">
         <img src="http://api.qrserver.com/v1/create-qr-code/?size=500x500&data=<?php the_permalink() ?>" alt="QR Code for <?php  the_title_attribute(); ?>" style="width:50px;height:50px;"/>
        </div>

        </div> <!-- .hidari-content -->

        <?php if ( comments_open() ) { ?>
            
        <div class="cmnt">
            <div class="cmnt-content">
                <?php comments_template(); ?>
            </div>
        </div>
       <?php } ?>

    </div><!-- .hidari -->
    
</article>
