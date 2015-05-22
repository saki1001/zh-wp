<?php
/**
 * The main template file.
 *
 * @package CleanSlate
 * @since CleanSlate 0.1
 */
?>

<?php get_header(); ?>
        
    <section id="content" role="main">
        
        <?php
            if ( have_posts() ) :

            // Set arguments
            $args = array(
                'post_type' => array( 'post', 'video' ),
                'order' =>  'ASC',
                'posts_per_page' => -1
            );
            
            // Query All Post Types
            $post_query = new WP_Query( $args );
            include('content-all.php');
            
            else :
            // Content Not Found Template
            include('content-not-found.php');
            
            endif;
        ?>
    </section>
    
<?php get_footer(); ?>