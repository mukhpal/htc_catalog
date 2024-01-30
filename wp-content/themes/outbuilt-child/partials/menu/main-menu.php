<?php if (has_nav_menu('menu-1')) : ?>
    <nav class="main-navigation" id="site-navigation">

        <?php
        wp_nav_menu(
            array(
                'theme_location'  => 'menu-1',
                'menu_id'         => 'menu-primary-items',
                'menu_class'      => 'menu-primary-items menu',
                'container'       => false
            )
        );
        ?> 

        <!-- Login / My account -->
        <?php
        if (is_user_logged_in()) {
            // Display the "My Account" tab for logged-in users
            ?>
            <ul class="list-unstyled menu account-menu">
                <li><a href="#/Account">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="16" viewBox="0 0 14 16"><path id="username" d="M12.25,16v-.285A5.155,5.155,0,0,0,7,10.673a5.155,5.155,0,0,0-5.25,5.042V16H0v-.285a6.591,6.591,0,0,1,2.055-4.778A7.088,7.088,0,0,1,7,8.965a7.089,7.089,0,0,1,4.946,1.972A6.591,6.591,0,0,1,14,15.715V16ZM3.421,3.669A3.629,3.629,0,0,1,7,0a3.629,3.629,0,0,1,3.578,3.669A3.63,3.63,0,0,1,7,7.34,3.63,3.63,0,0,1,3.421,3.669Zm1.666,0a1.913,1.913,0,1,0,3.825,0,1.913,1.913,0,1,0-3.825,0Z" transform="translate(0)" fill="#333"></path></svg> My Account</a>
                    <ul class="list-unstyled sub-menu">
						<?php $current_user = wp_get_current_user(); ?>
                        <li><a href="<?php echo home_url('/my-account/'); ?>">Welcome, <?php echo esc_html($current_user->display_name); ?></a></li>
                        <li><a href="<?php echo home_url('/wishlist/'); ?>">Wishlist</a></li>
                        <li><a href="<?php echo wp_logout_url(home_url()); ?>">Logout</a></li>
                    </ul>
                </li>
            </ul>
            <?php
        } else {
            // Display the login link for users who are not logged in
            ?>
            <div class="list-unstyled group-menu">	
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="16" viewBox="0 0 14 16"><path id="username" d="M12.25,16v-.285A5.155,5.155,0,0,0,7,10.673a5.155,5.155,0,0,0-5.25,5.042V16H0v-.285a6.591,6.591,0,0,1,2.055-4.778A7.088,7.088,0,0,1,7,8.965a7.089,7.089,0,0,1,4.946,1.972A6.591,6.591,0,0,1,14,15.715V16ZM3.421,3.669A3.629,3.629,0,0,1,7,0a3.629,3.629,0,0,1,3.578,3.669A3.63,3.63,0,0,1,7,7.34,3.63,3.63,0,0,1,3.421,3.669Zm1.666,0a1.913,1.913,0,1,0,3.825,0,1.913,1.913,0,1,0-3.825,0Z" transform="translate(0)" fill="#333"></path></svg> <a href="<?php echo home_url('/login/'); ?>">Log in</a> <span>or</span> <a href="<?php echo home_url(''); ?>/register">Register</a>
            </div>
            <?php
        }
        ?>

        <?php if (has_nav_menu('mobile')) : ?>
            <a href="#" class="menu-mobile"><i class="icon-menu"></i></a>
        <?php endif; ?>

        <div class="right-navigation">
            <?php if (outbuilt_is_woocommerce_activated()) outbuilt_wc_header_cart(); ?>
            <?php if (has_nav_menu('social')) : ?>
                <?php wp_nav_menu(
                    array(
                        'container_class' => 'menu-social-container',
                        'theme_location'  => 'social',
                        'link_before'     => '<span class="screen-reader-text">',
                        'link_after'      => '</span>',
                        'depth'           => 1,
                        'menu_id'         => 'social-menu',
                        'menu_class'      => 'social-menu'
                    )
                ); ?>
            <?php endif; ?>
            <?php get_template_part('partials/menu/search'); ?>
        </div>

    </nav>
<?php endif; ?>
