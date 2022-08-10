<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package limeasyblog
 */

get_header();
?>

	<main id="primary" class="site-main">

        <div id="archive-0" class="blog-section col-sm-12 col-md-12 blog-wrap ">
            <div class="container ">
                <div class="row">
                    <div class="col-sm-12 section-element-inside ">
                        <div class="row inside">

                            <div id="archive-ighnkfw2aaa" class="blog-section col-sm-12 col-md-9">
                                <div class="col-sm-12 section-element-inside ">
                                    <div id="archive-ighnkfw2aa2" class="blog-section col-sm-12 col-md-12">
                                        <div class="col-sm-12 section-element-inside ">
                                            <?php if ( have_posts() ) : ?>
                                                <header class="page-header">
                                                    <?php
                                                    the_archive_title( '<h1 class="page-title">', '</h1>' );
                                                    the_archive_description( '<div class="archive-description">', '</div>' );
                                                    ?>
                                                </header><!-- .page-header -->
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div id="archive-ighnkfw2bbb" class="blog-section col-sm-12 col-md-12">
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
                                    </div>
                                    <div id="archive-ighnkfw2k54s" class="blog-section col-sm-12 col-md-12">
                                        <div class="col-sm-12 section-element-inside ">
                                            <?php the_posts_navigation(); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="archive-ighn3kfw2k5s" class="blog-section col-sm-12 col-md-3">
                                <div class="col-sm-12 section-element-inside ">
                                    <?php get_sidebar(); ?>
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
