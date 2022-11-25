<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package limeasyblog
 */

get_header();
?>

<main id="primary" class="site-main">

    <?php if ( has_action('limeasyblog_action_blog') === FALSE ): ?>

        <div id="index-0" class="blog-section col-sm-12 col-md-12 blog-wrap ">
            <div class="container ">
                <div class="row">
                    <div class="col-sm-12 section-element-inside ">
                        <div class="row inside">

                            <div id="index-ighnkfw2aaa" class="blog-section col-sm-12 col-md-9">
                                <div class="col-sm-12 section-element-inside ">
                                    
                                    <div id="index-i1ghn3kfw2a" class="blog-section col-sm-12 col-md-12">
                                        <div class="col-sm-12 section-element-inside ">
                                            <?php if ( is_home() && ! is_front_page() ) : ?>
                                                <header>
                                                    <h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
                                                </header>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div id="index-ig6hnk8fw2b" class="blog-section col-sm-12 col-md-12">
                                        <div class="col-sm-12 section-element-inside ">
                                            <?php
                                                if ( have_posts() ) :

                                                    /* Start the Loop */
                                                    while ( have_posts() ) :
                                                        the_post();
                                                        
                                                        /*
                                                        * Include the Post-Type-specific template for the content.
                                                        * If you want to override this in a child theme, then include a file
                                                        * called content-___.php (where ___ is the Post Type name) and that will be used instead.
                                                        */
                                                        get_template_part( 'template-parts/content', get_post_type() );

                                                    endwhile;

                                                else :

                                                    get_template_part( 'template-parts/content', 'none' );

                                                endif;
                                            ?>
                                        </div>
                                        <div id="index-igh7nk9fw2k" class="blog-section col-sm-12 col-md-12">
                                            <div class="col-sm-12 section-element-inside ">
                                                <?php the_posts_navigation(); ?>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            
                            <div id="index-igh6nk4fw2s" class="blog-section col-sm-12 col-md-3">
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

        <?php do_action( 'limeasyblog_action_blog' ); ?>

    <?php endif; ?>

</main><!-- #main -->

<?php
get_footer();