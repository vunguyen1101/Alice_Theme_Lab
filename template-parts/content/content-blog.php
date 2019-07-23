<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <a class="asideBlogger" href="<?php the_permalink( );?>" >
        <div class="ExpertTag">
            <?php $bookmark = get_field('add_bookmark'); ?>
            <?php if(is_sticky()): ?>
            <div class="blog__bookmark">
                <i class="ion-android-bookmark"></i>
                <i class="ion-paperclip"></i>
            </div>
            <?php endif ?>

            <?php	  
            if( has_post_thumbnail() ) {
                the_post_thumbnail();
            }
            ?>
            <div class="NameExpert OURBlogTagName"><?php the_title(); ?></div>
            <div class="OurtemThuminfo">
                    <span><i class="ion-android-person"></i> <?php the_author(); ?></span>
                    <span><i class="ion-calendar"></i> <?php the_date(); ?></span>
                </div>
                <div class="BlogDecript AsideDscrpt">
                    <?php
                    if ( ! is_single() && ! is_page() ) :
                        the_excerpt();
                    else :
                        the_content(
                            sprintf(
                                wp_kses(
                                    /* translators: %s: Name of current post. Only visible to screen readers */
                                    __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'alice' ),
                                    array(
                                        'span' => array(
                                            'class' => array(),
                                        ),
                                    )
                                ),
                                get_the_title()
                            )
                        );
                        wp_link_pages(
                            array(
                                'before' => '<div class="page-links">' . __( 'Pages:', 'alice' ),
                                'after'  => '</div>',
                            )
                        );
                    endif;
                    ?>
                </div>
        </div>
    </a>
    <?php
    if ( ! is_single() && ! is_page() ) :
    ?>
    <div class="readmore">
        <span><a href="<?php the_permalink( );?>"><?php echo __( 'READ MORE', 'alice' ); ?></a></span> 
    </div>
    <?php endif?>
</article><!-- #post-<?php the_ID(); ?> -->