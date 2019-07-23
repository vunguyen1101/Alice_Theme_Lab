<?php
/*
 Template Name: Service
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

<section id="single-service">
  <div class="container">
    <div class="row">
      <div class="col-lg-3">
        <div class="service-sidebar__area">
          <?php dynamic_sidebar('service-sidebar' ) ?>
        </div>  
      </div>
      <div class="col-lg-9 col-sm-6">
        <div class="sectionTitle service service--grid">
            <span>SERVICES FROM ALICEMAID</span>
            <p>WE BRING BEST EXPERIENCE TO OUR BELOVED CUSTOMERS</p>
        </div>
        <div class="row">
        <?php
          $args = array(
            'post_type'   => 'service',
            'post_status' => 'publish',
          );
          
          $service = new WP_Query( $args );
          if( $service->have_posts() ) :
          ?>
        
            <?php
              while( $service->have_posts() ) :
                $service->the_post();
                get_template_part( 'template-parts/content/content','service' );
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
<div class="cleaningTeamBrg">
  <div class="container">
      <div class="row">
          <div class="col-lg-6 col-sm-6"><img class="advertiseImg" src="<?php echo esc_url( get_template_directory_uri() ); ?>/disc/images/coupleClean.png" alt="coupleClean"></div>
          <div class="col-lg-6 col-sm-6">
              <div class="advertise">
                  <div class="need">
                      NEED A CLEANING TEAM
                  </div>
                  <div class="forUhome">
                      FOR YOUR HOME SWEET HOME
                  </div>
                  <div class="heretobe">
                      We’re here to he. Just call us at:
                  </div>
                  <div class="telephone">
                      (+064)-3484-58294
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>
<?php get_footer( ); ?>