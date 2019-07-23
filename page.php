<?php get_header(); ?>
<section>
    <div class="BlogBRg">
        <div class="infomation BlogeHeadTit">
            <span><?php the_title(); ?></span>
            <p>Home<i class="ion-android-arrow-dropright"></i><span class="italical"><?php the_title(); ?></span></p>
        </div>
    </div>
</section>
    <?php
    if ( have_posts() ) {

        // Load posts loop.
        while ( have_posts() ) {
            the_post();
            get_template_part( 'template-parts/content/content','page' );
        }
    } else {

        // If no content, include the "No posts found" template.
        get_template_part( 'template-parts/content/content', 'none' );

    }
    ?>
<?php get_footer( ); ?>