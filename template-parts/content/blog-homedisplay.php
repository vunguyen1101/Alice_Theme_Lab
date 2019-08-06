<div class="col-lg-3 col-md-6">
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
                        the_excerpt();
                    ?>
                </div>
            </div>
        </a>

    </article><!-- #post-<?php the_ID(); ?> -->
</div>