<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="entry-content">
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
    </div><!-- .entry-content -->

</article><!-- #post-<?php the_ID(); ?> -->