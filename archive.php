<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
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
            <span>OUR BLOG</span>
            <p>Home<i class="ion-android-arrow-dropright"></i><span class="italical">BLog</span></p>
        </div>
    </div>
</section>
<section id="primary" class="content-area">
    <div class="container">
        <div class="archive-title">
                <h2>
                        <?php
                                if ( is_tag() ) :
                                        printf( __('Posts Tagged: %1$s','cherry'), single_tag_title( '', false ) );
                                elseif ( is_category() ) :
                                        printf( __('Posts Categorized: %1$s','cherry'), single_cat_title( '', false ) );
                                elseif ( is_day() ) :
                                        printf( __('Daily Archives: %1$s','cherry'), the_time('l, F j, Y') );
                                elseif ( is_month() ) :
                                        printf( __('Monthly Archives: %1$s','cherry'), the_time('F Y') );
                                elseif ( is_year() ) :
                                        printf( __('Yearly Archives: %1$s','cherry'), the_time('Y') );
                                endif;
                        ?>
                </h2>
        </div>
        <?php if ( is_tag() || is_category() ) : ?>
                <div class="archive-description">
                        <?php echo term_description(); ?>
                </div>
        <?php endif; ?>
        <div class="blogGrid">           
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
        </div>
    </div>      
</section><!-- .content-area -->

    

<?php
get_footer();
