<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="Sidebarcomt">
        <?php the_content(); ?>
    </div>
    <div class="siderbarAccount">
        <?php
        if ( has_post_thumbnail() ) :
            the_post_thumbnail();
        endif;
        ?>
        <div class="AcoutInfoSidebar">
        <?php $testimonial = get_field('testimonial'); ?>
            <span><?php echo $testimonial['name']  ?></span>
            <p><?php echo $testimonial['career']  ?></p>
        </div>
        <div class="cleardix"></div>
    </div>
</article><!-- #post-<?php the_ID(); ?> -->