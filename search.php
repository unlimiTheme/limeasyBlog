<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package limeasyblog
 */

get_header();
?>

<main id="primary" class="site-main">

    <?php if ( has_action('limeasyblog_action_search') === FALSE ): ?>

        <div id="search-0" class="blog-section col-sm-12 col-md-12 blog-wrap ">
            <div class="container ">
                <div class="row">
                    <div class="col-sm-12 section-element-inside ">
                        <div class="row inside">

                            <div id="search-igh3nkfw214" class="blog-section col-sm-12 col-md-9">
                                <div class="col-sm-12 section-element-inside ">
                                    <div id="search-ighn1k2fw2" class="blog-section col-sm-12 col-md-12">
                                        <div class="col-sm-12 section-element-inside ">
                                            <?php if ( have_posts() ) : ?>
                                                <header class="page-header">
                                                    <h1 class="page-title">
                                                        <?php
                                                        /* translators: %s: search query. */
                                                        printf( esc_html__( 'Search Results for: %s', 'limeasyblog' ), '<span>' . get_search_query() . '</span>' );
                                                        ?>
                                                    </h1>
                                                </header><!-- .page-header -->
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div id="search-ig23hnkfw2b" class="blog-section col-sm-12 col-md-12">
                                        <div class="col-sm-12 section-element-inside ">
                                            <?php
                                                if ( have_posts() ) :

                                                    /* Start the Loop */
                                                    while ( have_posts() ) :
                                                        the_post();
                                                        
                                                        /**
                                                         * Run the loop for the search to output the results.
                                                         * If you want to overload this in a child theme then include a file
                                                         * called content-search.php and that will be used instead.
                                                         */
                                                        get_template_part( 'template-parts/content', 'search' );

                                                    endwhile;

                                                else :

                                                    get_template_part( 'template-parts/content', 'none' );

                                                endif;
                                            ?>
                                        </div>
                                    </div>
                                    <div id="search-ighn5kfw27k" class="blog-section col-sm-12 col-md-12">
                                        <div class="col-sm-12 section-element-inside ">
                                            <?php the_posts_navigation(); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="search-ig4hnkf5w2k" class="blog-section col-sm-12 col-md-3">
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

        <?php do_action( 'limeasyblog_action_search' ); ?>

    <?php endif; ?>

</main><!-- #main -->

<?php
get_footer();
