<?php
/*
 Template Name: Portfolio
 */
?>
<?php get_header(); ?>
<section>
    <div class="BlogBRg">
        <div class="infomation BlogeHeadTit">
            <span class="ultimate-tittle"><?php the_title(); ?></span>
            <p>
                <?php
                printf(
                    '<a id="homeindexlink" href="%1$s">'.__('Home','alice').'</a>',
                    get_bloginfo( 'url' )
                );
                ?>
                <i class="ion-android-arrow-dropright"></i>
                <span class="italical"><?php the_title(); ?></span>              
            </p>
        </div>
    </div>
</section>
<section id="portfolio-content">
  <div class="container">
    <div class="tag-portfolio">
        <span class="active-portfolio" data-filter="*">All</span>
        <span data-filter=".move-in-out ">Move in/out</span>
        <span data-filter=".carpet">Carpet</span>
        <span data-filter=".house">House</span>
        <span data-filter=".construction">Construction</span>
    </div>
    <div class="row">

      <?php
      $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
      $args = array(
        'post_type'   => 'portfolio',
        'post_status' => 'publish',
        'posts_per_page' => 12,
        'paged'          => $paged
      );
      
      $portfolio = new WP_Query( $args );
      if( $portfolio->have_posts() ) :
      ?>
     
        <?php
          while( $portfolio->have_posts() ) :
            $portfolio->the_post();
            get_template_part( 'template-parts/content/content','portfolio' );
            
          endwhile;
          wp_reset_postdata();

        ?>

      <?php
      else :
        esc_html_e( 'No testimonials in the diving taxonomy!', 'alice' );
      endif;
      ?>
    </div>
    <div class="readmore load-more">
        <span><a href="<?php the_permalink( );?>">LOAD MORE</a></span> 
    </div>
  </div>
</section>
<section>
  <div class="container">
    <div class="testimonial-brg">
      <div class="qouteCover">
        <span class="ion-quote"></span>
        <div class="sectionTitle Comment">
            <p>DON’T HEAR FROM US ONLY</p>
            <span>TESTIMONIAL</span>
        </div>
        <div class="CommentCaousel">
          <?php
          $args = array(
            'post_type'   => 'testimonials',
            'post_status' => 'publish',
          );
          
          $testimonial = new WP_Query( $args );
          if( $testimonial->have_posts() ) :
          ?>
          
            <?php
              while( $testimonial->have_posts() ) :
                $testimonial->the_post();
                get_template_part( 'template-parts/content/content','testimonial' );
            ?>

            <?php
              endwhile;
              wp_reset_postdata();
            ?>

          <?php
          else :
            esc_html_e( 'No testimonials in the diving taxonomy!', 'alice' );
          endif;
          ?>
        </div>
      </div>
    </div>
  </div>
</section>
    
<?php get_footer( ); ?>