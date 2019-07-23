<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */

get_header();
?>
<section>
    <div class="BlogBRg">
        <div class="infomation BlogeHeadTit">
            <span><?php echo __('OUR BLOG','alice')?></span>
            <p>
                <?php
                printf(
                    '<a id="homeindexlink" href="%1$s">'.__('Home','alice').'</a>',
                    get_bloginfo( 'url' )
                );
                ?>
                <i class="ion-android-arrow-dropright"></i><span class="italical"><?php echo __('Blog','alice')?></span><i class="ion-android-arrow-dropright"></i><span class="italical"><?php the_title(); ?></span>
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
<?php if(function_exists('bac_PostViews')) { 
    echo bac_PostViews(get_the_ID()); 
}?>

<?php
get_footer();
