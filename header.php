<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package limeasyblog
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <div id="page" class="site">
        <a class="skip-link screen-reader-text"
            href="#primary"><?php esc_html_e( 'Skip to content', 'limeasyblog' ); ?></a>

        <header id="masthead" class="site-header">

            <div id="header-0" class="header-section col-sm-12 col-md-12 header-wrapper">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 section-element-inside">
                            <div class="row inside">
                                <div id="header-lbf3wl3y1dn"
                                    class="header-section col-sm-12 col-md-12 header-wrap">
                                    <div class="row">
                                        <div class="col-sm-12 section-element-inside">
                                            <div class="row inside">
                                                <div id="header-kn60tvnatdn"
                                                    class="header-section col-sm-12 col-md-6 header-site-branding">
                                                    <div class="row">
                                                        <div class="col-sm-12 section-element-inside">
                                                            <div class="row inside">
                                                                <div class="site-branding">

                                                                    <div class="site-branding-logo">
                                                                        <?php the_custom_logo(); ?>
                                                                    </div>

                                                                    <div class="site-branding-title">
                                                                        <?php if ( is_front_page() && is_home() ) : ?>
                                                                        <h1 class="site-title"><a
                                                                                href="<?php echo esc_url( home_url( '/' ) ); ?>"
                                                                                rel="home"><?php bloginfo( 'name' ); ?></a>
                                                                        </h1>

                                                                        <?php else: ?>

                                                                        <p class="site-title"><a
                                                                                href="<?php echo esc_url( home_url( '/' ) ); ?>"
                                                                                rel="home"><?php bloginfo( 'name' ); ?></a>
                                                                        </p>

                                                                        <?php
                                                                            endif;
                                                                            $limeasyblog_description = get_bloginfo( 'description', 'display' );
                                                                            if ( $limeasyblog_description || is_customize_preview() ) :
                                                                                ?>
                                                                        <p class="site-description">
                                                                            <?php echo $limeasyblog_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                                                                        </p>
                                                                        <?php endif; ?>
                                                                    </div>

                                                                </div><!-- .site-branding -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="header-ph58qb08tjq"
                                                    class="header-section col-sm-12 col-md-6 header-sidebar">
                                                    <div class="col-sm-12 section-element-inside">
                                                        <?php dynamic_sidebar( 'header-1' ); ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="header-v7kuk0msspr"
                                    class="header-section col-sm-12 col-md-12 header-menu-wrap">
                                    <div class="col-sm-12 section-element-inside">
                                        <nav id="site-navigation" class="main-navigation">
                                            <button class="menu-toggle menu-toggle-animation classic-animation" aria-controls="primary-menu" aria-expanded="false">
                                                <span class="menu-toggle-text"><?php esc_html_e( 'Primary Menu', 'limeasyblog' ); ?></span>
                                                <span class="menu-toggle-icon">
                                                    <span></span>
                                                    <span></span>
                                                    <span></span>
                                                    <span></span>
                                                    <span></span>
                                                    <span></span>
                                                    <span></span>
                                                    <span></span>
                                                    <span></span>
                                                </span>
                                            </button>
                                            <?php
                                                wp_nav_menu(
                                                    array(
                                                        'theme_location'    => 'menu-1',
                                                        'menu_id'           => 'primary-menu',
                                                        'before'            => '<div class="ancestor-wrapper">',
                                                        'after'             => '<span class="dropdown-menu-icon"></span></div>'
                                                    )
                                                );
                                            ?>
                                        </nav><!-- #site-navigation -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
   
        </header><!-- #masthead -->