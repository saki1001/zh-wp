<?php
/**
 * The template to display square thumbnails.
 *
 * @package CleanSlate
 * @since CleanSlate 0.1
 */
?>

<figcaption>
    <h4 class="post-title">
        <?php the_title(); ?>
    </h4>
</figcaption>

<figure class="post-thumb">
    <?php
        $thumb = get_thumbnail_custom($post->ID, 'thumbnail');
    ?>
    <a href="<?php the_permalink(); ?>" style="background: url('<?php echo $thumb; ?>') no-repeat 0 0;"></a>
        
</figure>