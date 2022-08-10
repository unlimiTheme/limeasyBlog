<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package limeasyblog
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
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
                                            <?php
                                                if ( is_singular() ) :
                                                    the_title( '<h1 class="entry-title">', '</h1>' );
                                                else :
                                                    the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
                                                endif;
                                            ?>
                                        </header>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="post-slfs07zbgrt" class="excerpt-section col-sm-12 col-md-12 ">
                            <div class="row">
                                <div class="col-sm-12 section-element-inside ">
                                    <div class="row inside">
                                        <div id="post-6ddeso36k4v"
                                            class="excerpt-section col-sm-auto col-md-auto ">
                                            <div class="row">
                                                <div class="col-sm-12 section-element-inside ">
                                                    <div class="row inside">
                                                        <?php if ( 'post' === get_post_type() ) : ?>
                                                            <div class="entry-meta">
                                                                <?php
                                                                    limeasyblog_posted_on();
                                                                ?>
                                                            </div><!-- .entry-meta -->
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="post-3h1iw5ouicm"
                                            class="excerpt-section col-sm-autos col-md-auto ">
                                            <div class="row">
                                                <div class="col-sm-12 section-element-inside ">
                                                    <div class="row inside">
                                                        <?php if ( 'post' === get_post_type() ) : ?>
                                                            <div class="entry-meta">
                                                                <?php
                                                                    limeasyblog_posted_by();
                                                                ?>
                                                            </div><!-- .entry-meta -->
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="post-fxzoj9rn23c" class="excerpt-section col-sm-12 col-md-12 ">
                            <div class="row">
                                <div class="col-sm-12 section-element-inside ">
                                    <div class="row inside">
                                        <?php limeasyblog_post_thumbnail(); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="post-dnebovfdvbm" class="excerpt-section col-sm-12 col-md-12 ">
                            <div class="row">
                                <div class="col-sm-12 section-element-inside ">
                                    <div class="row inside">
                                        <div class="entry-content">
                                            <?php
                                                the_content(
                                                    sprintf(
                                                        wp_kses(
                                                            /* translators: %s: Name of current post. Only visible to screen readers */
                                                            __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'limeasyblog' ),
                                                            array(
                                                                'span' => array(
                                                                    'class' => array(),
                                                                ),
                                                            )
                                                        ),
                                                        wp_kses_post( get_the_title() )
                                                    )
                                                );

                                                wp_link_pages(
                                                    array(
                                                        'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'limeasyblog' ),
                                                        'after'  => '</div>',
                                                    )
                                                );
                                                ?>
                                        </div><!-- .entry-content -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="post-ighnkfw2k5s" class="excerpt-section col-sm-12 col-md-12 ">
                            <div class="row">
                                <div class="col-sm-12 section-element-inside ">
                                    <div class="row inside">
                                        <div id="post-pauygfoh43m"
                                            class="excerpt-section col-sm-auto col-md-auto ">
                                            <div class="row">
                                                <div class="col-sm-12 section-element-inside ">
                                                    <div class="row inside">
                                                        <footer class="entry-footer">
                                                            <?php limeasyblog_entry_footer(); ?>
                                                        </footer><!-- .entry-footer -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="post-76s2tu2u8av"
                                            class="excerpt-section col-sm-auto col-md-auto ">
                                            <div class="row">
                                                <div class="col-sm-12 section-element-inside ">
                                                    <div class="row inside"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="post-76s2tu2u8ff"
                            class="excerpt-section col-sm-12 col-md-12">
                            <div class="row">
                                <div class="col-sm-12 section-element-inside ">
                                    <div class="row inside">
                                        <?php
                                                the_post_navigation(
                                                array(
                                                    'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Previous:', 'limeasyblog' ) . '</span> <span class="nav-title">%title</span>',
                                                    'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next:', 'limeasyblog' ) . '</span> <span class="nav-title">%title</span>',
                                                )
                                            );
                                        ?>
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
</article><!-- #post-<?php the_ID(); ?> -->