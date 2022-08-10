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
                                            class="excerpt-section col-sm-auto col-md-auto ">
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
                                                the_excerpt();
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
                    </div>
                </div>
            </div>
        </div>

    </div>
</article><!-- #post-<?php the_ID(); ?> -->