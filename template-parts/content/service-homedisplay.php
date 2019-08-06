
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <a class="asideBlogger" href="<?php the_permalink( );?>" >
        <div class="ExpertTag">
            <div class="home-service-content">
            <?php	  
            if( has_post_thumbnail() ) {
                the_post_thumbnail();
            }
            ?>
            <div class="NameExpert OURBlogTagName"><?php the_title(); ?></div>
            <div class="BlogDecript AsideDscrpt">
                <?php the_excerpt(); ?>
            </div>
        </div>
    </a>
</article><!-- #post-<?php the_ID(); ?> -->

