<?php get_header(); ?>
<section>
    <div class="BlogBRg">
        <div class="infomation BlogeHeadTit">
            <span><?php echo __( 'OUR BLOG', 'alice' ); ?></span>
            <p>
                <?php
                printf(
                    '<a id="homeindexlink" href="%1$s">'.__('Home','alice').'</a>',
                    get_bloginfo( 'url' )
                );
                ?>
                <i class="ion-android-arrow-dropright"></i><span class="italical"><?php echo __( 'Blog', 'alice' ); ?></span>
            </p>
        </div>
    </div>
</section>
<section>
    <div class="container">
        <div class="row ">
            <div class="col-lg-8 col-md-6">
                <aside>
                    <?php
                    if ( have_posts() ) {
                        // Load posts loop.
                        while ( have_posts() ) {
                            the_post();
                            get_template_part( 'template-parts/content/content','blog' );
                        }
                    } else {

                        // If no content, include the "No posts found" template.
                        get_template_part( 'template-parts/content/content', 'none' );

                    }
                    ?>
                </aside>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="sidebar">
                    <?php get_sidebar(); ?>
            </div>
        </div>
    </div>
</section>
<?php get_footer( ); ?>