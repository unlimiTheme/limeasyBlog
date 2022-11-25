<?php
/**
 * Page
 * 
 * @since 1.0.0
 */

class LimeasyblogsSearch 
{
    /**
     * Section name
     * 
     * @since 1.0.0
     */
    protected $section = 'search';

    /**
     * Theme slug name
     * 
     * @since 1.0.0
     */
    protected $slug = 'limeasyblog';

    /**
     * Action priority
     * 
     * @since 1.0.0
     */
    protected $priority = '10';

    /**
     * Actions list
     * 
     * @since 1.0.0
     */
    protected $actions = [
        'search',
        'search_content',
        'search_sidebars_left',
        'search_sidebars_right',
        'search_posts_navigation',
    ];

    /**
     * Column width
     * 
     * @since 1.0.0
     */
    protected $width = [
        'left' => 0,
        'right' => 1,
        'content' => 9,
    ];

    /**
     * 
     */
    protected $blog;

    /**
     * Constructor
     */
    public function __construct( $blog )
    {
        $this->blog = $blog;

        // customize register
        $this->customizeRegister();

        // register widgets
        $this->widgetInit();

        // get column width
        $this->columnsWidth();

        // add actions
        $this->addActions();
    }

    /**
     * Add actions
     * 
     * @since 1.0.0
     */
    protected function addActions()
    {
        foreach ( $this->actions as $action ) {
            $funcName = 'do' . implode( '', array_map( 'ucfirst', explode( '_', $action ) ) );

            if ( !method_exists( $this, $funcName ) ) {
                continue;
            }

            add_action( "{$this->slug}_action_$action", array( $this, $funcName ), $this->priority );
        }
    }

    /**
     * Widget init
     * 
     * @since 1.0.0
     */
    public function widgetInit()
    {
        add_action( 'widgets_init', array( $this, 'registerWidgets' ));
    }

    /**
     * Register widgets
     * 
     * @since 1.0.0
     */
    public function registerWidgets()
    {
        $sidebars_left = get_theme_mod( 'limeasyblog_search_sidebars_no_left', 0 );
        $sidebars_right = get_theme_mod( 'limeasyblog_search_sidebars_no_right', 0 );

        // left sidebar
        if ( $sidebars_left > 0 ) {

            $columns = range( 1, $sidebars_left );

            foreach ( $columns as $column) {
                register_sidebar(
                    array(
                        'name'          => esc_html__( "Search left", 'limeasyblog' ) . " $column",
                        'id'            => "{$this->section}-left-{$column}",
                        'description'   => esc_html__( 'Add widgets here.', 'limeasyblog' ),
                        'before_widget' => '<section id="%1$s" class="widget %2$s">',
                        'after_widget'  => '</section>',
                        'before_title'  => '<h2 class="widget-title">',
                        'after_title'   => '</h2>',
                    )
                );
            }
        }

        // right sidebar
        if ( $sidebars_right > 0 ) {

            $columns = range( 1, $sidebars_right );

            foreach ( $columns as $column) {
                register_sidebar(
                    array(
                        'name'          => esc_html__( "Search right", 'limeasyblog' ) . " $column",
                        'id'            => "{$this->section}-right-{$column}",
                        'description'   => esc_html__( 'Add widgets here.', 'limeasyblog' ),
                        'before_widget' => '<section id="%1$s" class="widget %2$s">',
                        'after_widget'  => '</section>',
                        'before_title'  => '<h2 class="widget-title">',
                        'after_title'   => '</h2>',
                    )
                );
            }
        }
    }

    /**
     * Page wrapper
     */
    public function doSearch()
    {
        ?>

        <div id="search-0" class="blog-section col-sm-12 col-md-12 blog-wrap ">
            <div class="container ">
                <div class="row">
                    <div class="col-sm-12 section-element-inside ">
                        <div class="row inside">

                            <?php do_action( 'limeasyblog_action_search_sidebars_left' ); ?>

                            <?php do_action( 'limeasyblog_action_search_content' ); ?>

                            <?php do_action( 'limeasyblog_action_search_sidebars_right' ); ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php
    }

    /**
     * Page content
     */
    public function doSearchContent()
    {
        $this->columnsWidth();
        $width = $this->width['content'];
        ?>

        <div id="search-igh3nkfw214" class="blog-section col-sm-12 col-md-<?php echo $width; ?>">
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

        <?php
    }

    /**
     * Sidebars left
     */
    public function doSearchSidebarsLeft()
    {
        $sidebars = get_theme_mod( 'limeasyblog_search_sidebars_no_left', 'inherit' );

        $this->columnsWidth();
        $width = $this->width['left'];

        // no sidebar
        if ( $sidebars === '0' ) {
            return;
        }

        // inherited sidebar
        if ( $sidebars === 'inherit' ) {
            $this->blog->doBlogSidebarsLeft();
            return;
        }

        foreach( range(1, $sidebars) as $column ) { 
            ?>
            <div id="search-ig4hnkf5w2<?php echo $column ?>" class="blog-section col-sm-12 col-md-<?php echo $width ?> blog-widget ">
                <div class="col-sm-12 section-element-inside ">
                    <aside id="secondary" class="widget-area">
                        <?php dynamic_sidebar( "{$this->section}-left-$column" ); ?>
                    </aside>
                </div>
            </div>
            <?php 
        }
    }

    /**
     * Sidebars right
     */
    public function doSearchSidebarsRight()
    {
        $sidebars = get_theme_mod( 'limeasyblog_search_sidebars_no_right', 'inherit' );

        $this->columnsWidth();
        $width = $this->width['right'];

        // no sidebar
        if ( $sidebars === '0' ) {
            return;
        }

        // inherited sidebar
        if ( $sidebars === 'inherit' ) {
            $this->blog->doBlogSidebarsRight();
            return;
        }

        // display custum sidebars
        foreach( range (1, $sidebars ) as $column ) { 

            $sidebarKey = "{$this->section}-right-$column";

            if ( ! is_active_sidebar( $sidebarKey ) ) {
                continue;
            }

            ?>
            <div id="search-ig4hnkf5w23<?php echo $column ?>" class="blog-section col-sm-12 col-md-<?php echo $width ?> blog-widget ">
                <div class="col-sm-12 section-element-inside">
                    <aside id="secondary" class="widget-area">
                        <?php dynamic_sidebar( $sidebarKey ); ?>
                    </aside>
                </div>
            </div>
            <?php 
        }
    }

    /**
     * Posts navigation
     */
    public function doSearchPostsNavigation()
    {
        ?>
        <div id="index-igh7nk9fw2k" class="blog-section col-sm-12 col-md-12">
            <div class="col-sm-12 section-element-inside ">
                <?php the_posts_navigation(); ?>
            </div>
        </div>
        <?php
    }

    /**
     * Get columns width
     */
    public function columnsWidth()
    {
        $sidebars_left = $this->getSidebarsNoLeft();
        $sidebars_right = $this->getSidebarsNoRight();

        $sidebars = $sidebars_left + $sidebars_right;

        $left = $sidebars > 3 ? 1 : 2;
        $right = $sidebars > 3 ? 1 : 2;
        $content = 12 - ($sidebars_left * $left) - ($sidebars_right * $right); 

        $this->width = [
            'left' => $left,
            'right' => $right,
            'content' => $content,
        ];

        return $this->width;
    }

    /**
     * Get left sidebars number
     */
    public function getSidebarsNoLeft()
    {
        $sidebars = get_theme_mod( 'limeasyblog_search_sidebars_no_left', 'inherit' );

        if ( $sidebars === 'inherit' ) {
            $sidebars = $this->blog->getSidebarsNoLeft();
        }

        return $sidebars;
    }

    /**
     * Get left sidebars number
     */
    public function getSidebarsNoRight()
    {
        $sidebars = get_theme_mod( 'limeasyblog_search_sidebars_no_right', 'inherit' );

        if ( $sidebars === 'inherit' ) {
            $sidebars = $this->blog->getSidebarsNoRight();
        }

        return $sidebars;
    }

    /**
     * Customize register
     */
    public function customizeRegister()
    {
        add_action( 'customize_register', array( $this, 'customizeRegisterHelper'), 10 );
    }

    /**
     * Customize register helper
     */
    public function customizeRegisterHelper( $wp_customize )
    {
        // blog settings section
        $wp_customize->add_section(
            'limeasyblog_search_setings_section',
            array(
                'title' => __( 'Search settings', 'limeasyblog' ),
                'priority' => 30,
            )
        );

        // blog left sidebars number
        $wp_customize->add_setting(
            'limeasyblog_search_sidebars_no_left',
            array(
                'capability' => 'edit_theme_options',
                'sanitize_callback' => 'limeasyblog_sanitize_select',
                'default' => 'inherit',
            )
        );

        // blog left sidebars number control
        $wp_customize->add_control(
            'limeasyblog_search_sidebars_no_left',
            array(
                'type' => 'select',
                'section' => 'limeasyblog_search_setings_section',
                'label' => __( 'Left sidebars number', 'limeasyblog' ),
                'description' => __( 'Select the left sidebars number', 'limeasyblog' ),
                'choices' => array(
                    'inherit' => 'Inherit (Blog)',
                    0 => 'None',
                    1 => 1,
                    2 => 2,
                ),
            )
        );

        // blog right sidebars number
        $wp_customize->add_setting(
            'limeasyblog_search_sidebars_no_right',
            array(
                'capability' => 'edit_theme_options',
                'sanitize_callback' => 'limeasyblog_sanitize_select',
                'default' => 'inherit',
            )
        );

        // blog right sidebars number control
        $wp_customize->add_control(
            'limeasyblog_search_sidebars_no_right',
            array(
                'type' => 'select',
                'section' => 'limeasyblog_search_setings_section',
                'label' => __( 'Right sidebars number', 'limeasyblog' ),
                'description' => __( 'Select the right sidebars number', 'limeasyblog' ),
                'choices' => array(
                    'inherit' => 'Inherit (Blog)',
                    0 => 'None',
                    1 => 1,
                    2 => 2,
                ),
            )
        );    
    }
}

new LimeasyblogsSearch( $LimeasyblogBlog );
