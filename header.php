<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="profile" href="https://gmpg.org/xfn/11" />
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?> >
    <header id="HOME">
        <div class="container">
            <div class="logo">
                <?php 
                if ( is_home() ) {
                printf(
                    '<a id="homeindex" href="%1$s"><span>'.get_theme_mod('site-setting-right').'</span>'.get_theme_mod('site-setting-left').'</a>',
                    get_bloginfo( 'url' )
                );
                } else {
                printf(
                    '<a id="homeindex" href="%1$s"><span>'.get_theme_mod('site-setting-right').'</span>'.get_theme_mod('site-setting-left').'</a>',
                    get_bloginfo( 'url' )
                );
                } // endif ?>
           
            </div>    
            <div class="hamburger">
                <span class="slice"></span>
                <span class="slice"></span>
                <span class="slice"></span>
            </div>    
            <nav class="MoblieNav">
                <div class="MobilebagContainer">
                    <div class="ion-bag"></div>
                    <div class="SearchDesk ion-ios-search"></div>
                    <form role="search" method="get" class="search-form" action="http://localhost:8080/alicemaid/">  
                        <input type="search" class="search-field" placeholder="Your search here..." value="" name="s">
                    </form>
                </div>
                <?php alice_menu('mobile-menu'); ?>
            </nav>
            <div class="main-menu">
                <?php alice_menu('DeskTopNav'); ?>
                <div class="bagContainer">
                    <div class="headerDot">.</div>
                    <?php global $woocommerce; ?>
                    <a href="<?php echo wc_get_cart_url(); ?>" class="Deskbag ion-bag">         
                        <span class="cart-contents"><?php echo $woocommerce->cart->cart_contents_count; ?></span>
                    </a>
                    <div class="SearchDesk ion-ios-search"></div>
                </div>
                <form role="search" method="get" class="search-form" action="http://localhost:8080/alicemaid/">  
                    <input type="search" class="search-field" placeholder="Your search here..." value="" name="s">
                </form>
            </div>
        </div>
    </header>

    