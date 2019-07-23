
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    
    <div class="Carouselitem">
        <div class="qouteDescript container">
            <div class="col-lg-8">
                <?php the_content(); ?>
            </div>
        </div>
        <div class="AccountCmt">
            <?php
            if ( has_post_thumbnail() ) :
                the_post_thumbnail();
            endif;
            ?>
            <div class="AcountInfo">
                <?php $testimonial = get_field('testimonial'); ?>
                <div class="Cmtname"><?php echo $testimonial['name']  ?></div>
                <div class="CmtAdd"><?php echo $testimonial['address']  ?></div>
            </div>
        </div>
    </div>

    

</article><!-- #post-<?php the_ID(); ?> -->
