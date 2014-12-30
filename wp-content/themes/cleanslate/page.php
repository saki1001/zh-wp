<?php
/**
 *  Template:
 *  Determines which page sub-template to display.
 *  For displaying all pages.
 *
 * @package RazorAndTie
 * @since RazorAndTie 0.1
 */
?>

<?php get_header(); ?>

<!-- Page Template -->
<?php
    if( is_page('videos') ) :
?>
    <section class="primary">
      <div class="section-inner artists-inner">
        <h2><?php the_title(); ?></h2>
      </div><!-- .section-inner -->
      
<?php
        // Set arguments
        $args = array(
            'post_type' => 'video',
            'order' =>  'ASC',
            'posts_per_page' => -1
        );
        
        // Check user status for permission to view protected posts
        if( is_user_logged_in() === false ) :
            $args['has_password'] = false;
        endif;
        
        // Query Artist Post Type
        $video_query = new WP_Query( $args );
        include('content-videos.php');
?>
    </section>
<?php
    else :
        get_template_part( 'content', 'page' );
    endif;
?>

<?php get_footer(); ?>