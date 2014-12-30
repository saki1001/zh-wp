<?php
/**
 *  Sub-Template:
 *  Loaded on several pages, including Home and Archive pages.
 *  For displaying artist posts in list-format.
 *
 * @package CleanSlate
 * @since CleanSlate 0.1
 */
?>

<!-- Content-Artists Template -->
<?php
    if ( $video_query->have_posts() ) :
?>  
    <div id="articles" class="browse-posts">
        <?php
            $i = 0;
        
            while ( $video_query->have_posts() ) : $video_query->the_post();
            
                if( $i % 4 == 0 ) :
                    // test for every fourth item
                    $class = 'first';
                elseif( $i & 1 ) :
                    // test if odd with bitwise operator
                    $class = 'odd';
                else :
                    $class = '';
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