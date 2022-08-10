<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package limeasyblog
 */

get_header();
?>

<main id="primary" class="site-main">

    <div id="page-0" class="page-section col-sm-12 col-md-12 wrap ">
        <div class="container ">
            <div class="row">
                <div class="col-sm-12 section-element-inside ">
                    <div class="row inside">
                        <div id="page-ighnkfw2k5s" class="page-section col-sm-12 col-md-12 ">
                            <div class="row">
                                <div class="col-sm-12 section-element-inside ">
                                    <div class="row inside">
                                        <?php
                                            while ( have_posts() ) :
                                                the_post();

                                                get_template_part( 'template-parts/content', 'page' );

                                            endwhile; // End of the loop.
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

</main><!-- #main -->

<?php
get_footer();