<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package limeasyblog
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="row">

        <div id="page-0" class="page-section col-sm-12 col-md-12 ">
            <div class="">
                <div class="row">
                    <div class="col-sm-12 section-element-inside ">
                        <div class="row inside">
                            <div id="page-1rekpvean3a"
                                class="page-section col-sm-12 col-md-12 ">
                                <div class="row">
                                    <div
                                        class="col-sm-12 section-element-inside ">
                                        <div class="row inside">
                                            <header class="entry-header">
                                                <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
                                            </header><!-- .entry-header -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="page-fxzoj9rn23c"
                                class="page-section col-sm-12 col-md-12 ">
                                <div class="row">
                                    <div
                                        class="col-sm-12 section-element-inside ">
                                        <div class="row inside">
                                            <?php limeasyblog_post_thumbnail(); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="page-dnebovfdvbm"
                                class="page-section col-sm-12 col-md-12 ">
                                <div class="row">
                                    <div
                                        class="col-sm-12 section-element-inside ">
                                        <div class="row inside">
                                            <div class="entry-content">
                                                <?php
                                                    the_content();

                                                    wp_link_pages(
                                                        array(
                                                            'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'limeasyblog' ),
                                                            'after'  => '</div>',
                                                        )
                                                    );
                                                    ?>
                                            </div><!-- .entry-content -->

                                            <?php if ( get_edit_post_link() ) : ?>
                                            <footer class="entry-footer">
                                                <?php
                                                        edit_post_link(
                                                            sprintf(
                                                                wp_kses(
                                                                    /* translators: %s: Name of current post. Only visible to screen readers */
                                                                    __( 'Edit <span class="screen-reader-text">%s</span>', 'limeasyblog' ),
                                                                    array(
                                                                        'span' => array(
                                                                            'class' => array(),
                                                                        ),
                                                                    )
                                                                ),
                                                                wp_kses_post( get_the_title() )
                                                            ),
                                                            '<span class="edit-link">',
                                                            '</span>'
                                                        );
                                                        ?>
                                            </footer><!-- .entry-footer -->
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                            <div id="post-76s2tu2u812"
                                class="excerpt-section col-sm-12 col-md-12">
                                <div class="row">
                                    <div class="col-sm-12 section-element-inside ">
                                        <div class="row inside">
                                            <?php
                                                // If comments are open or we have at least one comment, load up the comment template.
                                                if ( comments_open() || get_comments_number() ) :
                                                    comments_template();
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
            
    </div>
</article><!-- #post-<?php the_ID(); ?> -->