<footer>
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
            
            <div class="row">
            <?php
                if ( is_active_sidebar('footer-sidebar') ) {
                        dynamic_sidebar( 'footer-sidebar' );
                } else {
                        _e('This is widget area. Go to Appearance -> Widgets to add some widgets.', 'alices');
                }
                
            ?>
            </div>
        </div>
    </footer>
    <div class="copyright">
        <div>
            <div class="media">
                <?php alice_menu('social-menu'); ?>
            </div><br>
            <span><?php echo get_theme_mod('copyright-setting'); ?></span>
        </div>
    </div>
    <?php wp_footer(); ?>
</body>
</html>