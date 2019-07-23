
<?php if(is_page()) : ?>
<div class="col-lg-3 col-sm-6 <?php $categories = get_the_category();
    if ( ! empty( $categories ) ) {
        echo esc_html( $categories[0]->slug );   
    }
    else the_category();
    ?>
    ">

<?php endif ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <a class="asideBlogger" href="<?php the_permalink( );?>" >
            <?php if(is_page()) : ?>
            <div class="portfolio-category">
            <?php else : ?>
            <div class="portfolio-category--single">
            <?php endif ?>                
                <?php	  
                if( has_post_thumbnail()  ) {
                    the_post_thumbnail();
                }
                ?>
                <?php if(is_page()) : ?>
                       
                <div class="NameExpert OURBlogTagName port-cate-name"><?php the_title(); ?></div>
                <div class="OurtemThuminfo">
                    <span>
                        <i class="fa fa-folder-o"></i>
                        <?php 
                        $categories = get_the_category();
                        if ( ! empty( $categories ) ) {
                            echo esc_html( $categories[0]->name );   
                        }
                        else the_category();
                        ?>
                    </span>
                    <span><i class="fa fa-eye "></i>
                    <?php if(function_exists('bac_PostViews')) { 
                        echo bac_PostViews(get_the_ID()); 
                    }?>
                        </span>
                </div>
                <?php endif ?>
                <div class="BlogDecript AsideDscrpt single-portfilio__content">
                    <?php if(is_single()): ?>
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-8 col-sm-6">
                                <span class="NameExpert OURBlogTagName portfolio-description">Description</span>
                                <?php
                                    the_content();
                                 ?>
                            </div>
                            <div class="col-lg-4 col-sm-6">
                                <span class="NameExpert OURBlogTagName portfolio-description">Client Info </span>
                                <div class="single-portfolio__clientinfo">
                                    <ul id="client__field">
                                        <li>Name:</li>
                                        <li>Address:</li>
                                        <li>Bedrooms:</li>
                                        <li>Bathrooms:</li>
                                        <li>Area:</li>
                                    </ul>
                                    <ul id="client__data">
                                        <li><?php $name = get_field('name');echo $name ?></li>
                                        <li><?php $address = get_field('address');echo $address ?></li>
                                        <li><?php $bed_room = get_field('bed_room');echo $bed_room ?></li>
                                        <li><?php $bath_room = get_field('bath_room');echo $bath_room ?></li>
                                        <li><?php $area = get_field('area');echo $area ?></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endif ?>
                </div>
            </div>
        </a>

    </article><!-- #post-<?php the_ID(); ?> -->
<?php if(is_page()) : ?>
</div>
<?php endif ?>

