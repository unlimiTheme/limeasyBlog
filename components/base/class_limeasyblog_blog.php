<?php
/**
 * Page
 * 
 * @since 1.0.0
 */

class LimeasyblogBlog 
{
    /**
     * Section name
     * 
     * @since 1.0.0
     */
    protected $section = 'blog';

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
        'blog',
        'blog_content',
        'blog_sidebars_left',
        'blog_sidebars_right',
        'blog_posts_navigation',
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
     * Constructor
     */
    public function __construct()
    {
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
        $sidebars_left = get_theme_mod( 'limeasyblog_blog_sidebars_no_left', 0 );
        $sidebars_right = get_theme_mod( 'limeasyblog_blog_sidebars_no_right', 0 );

        // left sidebar
        if ( $sidebars_left > 0 ) {

            $columns = range( 1, $sidebars_left );

            foreach ( $columns as $column) {
                register_sidebar(
                    array(
                        'name'          => esc_html__( "Blog left", 'limeasyblog' ) . " $column",
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
                        'name'          => esc_html__( "Blog right", 'limeasyblog' ) . " $column",
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
    public function doBlog()
    {
        ?>

        <div id="index-0" class="blog-section col-sm-12 col-md-12 blog-wrap">
            <div class="container ">
                <div class="row">
                    <div class="col-sm-12 section-element-inside ">
                        <div class="row inside">

                            <?php do_action( 'limeasyblog_action_blog_sidebars_left' ); ?>

                            <?php do_action( 'limeasyblog_action_blog_content' ); ?>

                            <?php do_action( 'limeasyblog_action_blog_sidebars_right' ); ?>

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
    public function doBlogContent()
    {
        $this->columnsWidth();
        $width = $this->width['content'];
        ?>

        <div id="index-ighnkfw2aaa" class="blog-section col-sm-12 col-md-<?php echo $width; ?>">
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
                    
                    <?php do_action( 'limeasyblog_action_blog_posts_navigation' ); ?>
                    
                </div>
                
            </div>
        </div>

        <?php
    }

    /**
     * Sidebars left
     */
    public function doBlogSidebarsLeft()
    {
        $sidebars = get_theme_mod( 'limeasyblog_blog_sidebars_no_left', 0 );

        $this->columnsWidth();
        $width = $this->width['left'];

        if ( $sidebars === '0' ) {
            return;
        }

        foreach( range(1, $sidebars) as $column ) { 
            ?>
            <div id="blog-igh6nk4fw2s<?php echo $column ?>" class="blog-section col-sm-12 col-md-<?php echo $width ?> blog-widget ">
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
    public function doBlogSidebarsRight()
    {
        $sidebars = get_theme_mod( 'limeasyblog_blog_sidebars_no_right', 'default' );

        $this->columnsWidth();
        $width = $this->width['right'];

        // no sidebar
        if ( $sidebars === '0' ) {
            return;
        }

        // display default sidebar
        if ( $sidebars === 'default' ) :

            if ( ! is_active_sidebar( 'sidebar-1' ) ) {
                return;
            }

            ?>
            <div id="blog-igh6nk4fw2s<?php echo $column ?>" class="blog-section col-sm-12 col-md-<?php echo $width ?> blog-widget ">
                <div class="col-sm-12 section-element-inside ">
                    <aside id="secondary" class="widget-area">
                        <?php dynamic_sidebar( 'sidebar-1' ); ?>
                    </aside>
                </div>
            </div>
            <?php 

            return;
        endif;

        // display custum sidebars
        foreach( range(1, $sidebars) as $column ) { 

            $sidebarKey = "{$this->section}-right-$column";

            if ( ! is_active_sidebar( $sidebarKey ) ) {
                continue;
            }

            ?>
            <div id="blog-igh6nk4fw2s<?php echo $column ?>" class="blog-section col-sm-12 col-md-<?php echo $width ?> blog-widget ">
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
    public function doBlogPostsNavigation()
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

        $result = [
            'left' => $left,
            'right' => $right,
            'content' => $content,
        ];

        $this->width = $result;

        return $result;
    }

    /**
     * Get left sidebars number
     */
    public function getSidebarsNoLeft()
    {
        // there is not left sidebar by default
        $sidebars = get_theme_mod( 'limeasyblog_blog_sidebars_no_left', 0 );

        return $sidebars;
    }

    /**
     * Get left sidebars number
     */
    public function getSidebarsNoRight()
    {
        // there is one right sidebar by default
        $sidebars = get_theme_mod( 'limeasyblog_blog_sidebars_no_right', 'default' );
        $sidebars = $sidebars == 'default' ? 1 : $sidebars; 

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
            'limeasyblog_blog_setings_section',
            array(
                'title' => __( 'Blog settings', 'limeasyblog' ),
                'priority' => 30,
            )
        );

        // blog left sidebars number
        $wp_customize->add_setting(
            'limeasyblog_blog_sidebars_no_left',
            array(
                'capability' => 'edit_theme_options',
                'sanitize_callback' => 'limeasyblog_sanitize_select',
                'default' => 0,
            )
        );

        // blog left sidebars number control
        $wp_customize->add_control(
            'limeasyblog_blog_sidebars_no_left',
            array(
                'type' => 'select',
                'section' => 'limeasyblog_blog_setings_section',
                'label' => __( 'Left sidebars number', 'limeasyblog' ),
                'description' => __( 'Select the left sidebars number', 'limeasyblog' ),
                'choices' => array(
                    0 => 'None',
                    1 => 1,
                    2 => 2,
                ),
            )
        );

        // blog right sidebars number
        $wp_customize->add_setting(
            'limeasyblog_blog_sidebars_no_right',
            array(
                'capability' => 'edit_theme_options',
                'sanitize_callback' => 'limeasyblog_sanitize_select',
                'default' => 'default',
            )
        );

        // blog right sidebars number control
        $wp_customize->add_control(
            'limeasyblog_blog_sidebars_no_right',
            array(
                'type' => 'select',
                'section' => 'limeasyblog_blog_setings_section',
                'label' => __( 'Right sidebars number', 'limeasyblog' ),
                'description' => __( 'Select the right sidebars number', 'limeasyblog' ),
                'choices' => array(
                    'default' => 'Default',
                    0 => 'None',
                    1 => 1,
                    2 => 2,
                ),
            )
        );    
    }
}

$LimeasyblogBlog = new LimeasyblogBlog();