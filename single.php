<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package limeasyblog
 */

get_header();
?>

<main id="primary" class="site-main">

    <?php if ( has_action('limeasyblog_action_single') === FALSE ): ?>

        <div id="single-0" class="page-section col-sm-12 col-md-12 page-wrap ">
            <div class="container ">
                <div class="row">
                    <div class="col-sm-12 section-element-inside ">
                        <div class="row inside">
                            <div id="single-1rekpvean3a" class="page-section col-sm-12 col-md-9 ">
                                <div class="col-sm-12 section-element-inside ">
                                    <?php
                                        while ( have_posts() ) :
                                            the_post();

                                            get_template_part( 'template-parts/content', 'single');

                                        endwhile; // End of the loop.
                                    ?>
                                </div>
                            </div>
                            <div id="single-ighnkfw2k5s" class="page-section col-sm-12 col-md-3 ">
                                <div class="col-sm-12 section-element-inside ">
                                    <?php get_sidebar(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <?php else: ?>

        <?php do_action( 'limeasyblog_action_single' ); ?>

    <?php endif; ?>

</main><!-- #main -->

<?php
get_footer();