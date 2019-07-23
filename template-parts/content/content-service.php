<?php if(is_page() ):?>
<div class="col-lg-4 col-sm-6">
<?php endif ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php if(is_page() ):?>
        <a class="asideBlogger" href="<?php the_permalink( );?>" >
            <div class="ExpertTag">
    <?php endif ?>
                <?php if(is_single()): ?> 
                <div class="single-service-content">
                <?php endif ?>
                <?php	  
                if( has_post_thumbnail() ) {
                    the_post_thumbnail();
                }
                ?>
                <?php if ( is_page() ) : ?>
                <div class="NameExpert OURBlogTagName"><?php the_title(); ?></div>
                <div class="BlogDecript AsideDscrpt">
                <?php endif ?>
                    <?php if(is_single()): ?> 
                    <div class="single-service__description">
                        <span>Destription</span>
                        <p><?php $description = get_field('description');echo $description ?></p>
                    <?php endif ?>
                        <?php
                        if ( is_page() ) :
                            the_excerpt();
                        else :
                            ?>
                            <span>Our Mission</span>
                            <?php
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
        
                        endif;
                        ?>
                    <?php if(is_single()): ?> 
                    </div>
                    <?php endif ?>
                </div>
        <?php if(is_page() ):?>
            </div>
        </a>
        <?php endif ?>
        <?php if ( is_page() ) : ?>
        <div class="readmore service__readmore">
            <a href="<?php the_permalink( );?>">READ MORE</a>
        </div>
        <?php endif ?>
    </article><!-- #post-<?php the_ID(); ?> -->
<?php if(is_page() ): ?>
</div>
<?php endif ?>
