
<?php
    if ( is_active_sidebar('blog-sidebar') ) {
            dynamic_sidebar( 'blog-sidebar' );
    } else {
            _e('This is widget area. Go to Appearance -> Widgets to add some widgets.', 'alices');
    }
    
?>


