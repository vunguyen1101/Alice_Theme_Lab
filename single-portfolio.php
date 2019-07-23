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
                    '<a id="homeindexlink" href="%1$s">'.__('Portfilio','alice').'</a>',
                    get_permalink( get_page_by_path( 'portfolio' ) )
                   
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
        <div class="single-portfolio__category">
            <span >
                <?php $categories = get_the_category();
                if ( ! empty( $categories ) ) {
                    echo esc_html( $categories[0]->slug );   
                }
                else the_category();
                ?>
            </span>    
        </div>
        <div class="pagination">
            <?php next_post_link( '%link', '<i class="ion-ios-arrow-left"></i>'); ?>
            <?php
            printf(
                '<a id="homeindexlink" class="ion-ios-keypad-outline" href="%1$s"></a>',
                get_permalink( get_page_by_path( 'portfolio' ) )
            
            );
            ?>
            <?php previous_post_link('%link', '<i class="ion-ios-arrow-right"></i>'); ?>
        </div>    
    <?php
    if ( have_posts() ) {
        // Load posts loop.
        while ( have_posts() ) {
            the_post();
            get_template_part( 'template-parts/content/content','portfolio' );
        }
    } else {

        // If no content, include the "No posts found" template.
        get_template_part( 'template-parts/content/content', 'none' );

    }
        
    ?>
    </div>
</section>
<section id="FEATURES" >
    <div class="single-portfolio__related-brg">
        <div class="container">
            <div class="sectionTitle featureprojectTit">
                <span>RELATED PROJECTS</span>
                <p>YOU MIGHT ALSO LIKE THESE</p>
            </div>
            <div class="single-portfolio__related-post">
                <?php
                $args = array(
                    'post_type' => 'portfolio',
                    'post_status' => 'publish',
                    'category_name' =>  esc_html( $categories[0]->slug ),
                    'posts_per_page' => 4,
                );
                $arr_posts = new WP_Query( $args );
                
                if ( $arr_posts->have_posts() ) :
                
                    while ( $arr_posts->have_posts() ) :
                        $arr_posts->the_post();
                        ?>
                        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                            <a href="<?php the_permalink( );?>">
                                <div class="ImgExpertHover">
                                    <?php
                                    if ( has_post_thumbnail() ) :
                                        the_post_thumbnail();
                                    endif;
                                    ?>
                                    <div class="ExpertTagHover"><span class="ion-ios-eye"></span></div>
                                </div>
                            </a>
                        </article>
                        <?php
                    endwhile;
                endif;
                ?>
            </div>
        </div>
    </div>
</section>

<?php
get_footer();