<?php
get_header();
?>
<section>
    <div class="BlogBRg">
        <div class="infomation BlogeHeadTit">
            <span><?php the_title(); ?></span>
            <p>
                <?php
                printf(
                    '<a id="homeindexlink" href="%1$s">'.__('Home','alice').'</a>',
                    get_bloginfo( 'url' )
                );
                ?>
                <i class="ion-android-arrow-dropright"></i>
                <span class="italical">
                <?php
                printf(
                    '<a id="homeindexlink" href="%1$s">'.__('Service','alice').'</a>',
                    get_permalink( get_page_by_title('Service') )
                );
                ?>
                </span>
                <i class="ion-android-arrow-dropright"></i>
                <span class="italical"><?php the_title(); ?></span>              
            </p>
        </div>
    </div>
</section>

<section>
    <div class="container">

        <div class="row">
            <div class="col-lg-3 col-sm-6">
                sidebar
            </div>
            <div class="col-lg-9 col-sm-6">
                <div class="row">
                <?php
                    if ( have_posts() ) {

                        // Load posts loop.
                        while ( have_posts() ) {
                            the_post();
                            get_template_part( 'template-parts/content/content', 'service' );
                            
                        }
                    } else {

                        // If no content, include the "No posts found" template.
                        get_template_part( 'template-parts/content/content', 'none' );

                    }
                ?>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
get_footer();
