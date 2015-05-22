<?php
/**
 *  Sub-Template:
 *  All posts display on page.
 *  For displaying artist posts in list-format.
 *
 * @package CleanSlate
 * @since CleanSlate 0.1
 */
?>

<!-- Content-Artists Template -->
<?php
    if ( $post_query->have_posts() ) :
?>  
    <div id="articles" class="browse-posts">
        <?php
            $i = 0;
        
            while ( $post_query->have_posts() ) : $post_query->the_post();

                $class = '';

                if( $i % 4 == 0 ) :
                    // test for every fourth item
                    $class .= 'first';
                elseif( $i & 1 ) :
                    // test if odd with bitwise operator
                    $class .= 'odd';
                else :
                    // do nothing
                endif;
                // _log($post);
                $terms = wp_get_post_terms( $post->ID, 'category', $args );
                
                if( empty($terms) ) :
                    _log('custom');
                    $class .= ' ' . $post->post_type;
                else :
                    _log('post');
                    $class .= ' ' . $terms[0]->slug;
                endif;
        ?>
                <article class="thumb column <?php echo $class; ?>">
                    <?php
                        get_template_part( 'content-thumb-square', get_post_format() );
                    ?>
                </article>
        <?php
            $i++;
            endwhile;
        ?>
    </div>
<?php
    else :
        // Content Not Found Template
        include('content-not-found.php');
    endif;
?>