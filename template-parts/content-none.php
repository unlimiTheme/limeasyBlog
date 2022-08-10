<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package limeasyblog
 */

?>

<section class="no-results not-found">
    <div class="row">

        <div id="post-0" class="excerpt-section col-sm-12 col-md-12 excerpt-wrap ">
            <div class="row">
                <div class="col-sm-12 section-element-inside ">
                    <div class="row inside">
                        <div id="post-1rekpvean3a" class="excerpt-section col-sm-12 col-md-12 ">
                            <div class="row">
                                <div class="col-sm-12 section-element-inside ">
                                    <div class="row inside">
                                        <header class="entry-header">
                                            <h1 class="page-title"><?php esc_html_e( 'Nothing Found', 'limeasyblog' ); ?></h1>
                                        </header>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="post-slfs07zbgrt" class="excerpt-section col-sm-12 col-md-12 ">
                            <div class="row">
                                <div class="col-sm-12 section-element-inside ">
                                    <div class="row inside">
                                        <?php
                                            if ( is_home() && current_user_can( 'publish_posts' ) ) :

                                                printf(
                                                    '<p>' . wp_kses(
                                                        /* translators: 1: link to WP admin new post page. */
                                                        __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'limeasyblog' ),
                                                        array(
                                                            'a' => array(
                                                                'href' => array(),
                                                            ),
                                                        )
                                                    ) . '</p>',
                                                    esc_url( admin_url( 'post-new.php' ) )
                                                );

                                            elseif ( is_search() ) :
                                                ?>

                                                <p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'limeasyblog' ); ?></p>
                                                <?php
                                                get_search_form();

                                            else :
                                                ?>

                                                <p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'limeasyblog' ); ?></p>
                                                <?php
                                                get_search_form();

                                            endif;
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</secction><!-- #post-<?php the_ID(); ?> -->
