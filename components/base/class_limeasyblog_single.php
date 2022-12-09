<?php
/**
 * Page
 * 
 * @since 1.0.0
 */

class LimeasyblogSingle 
{
    /**
     * Section name
     * 
     * @since 1.0.0
     */
    protected $section = 'single';

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
        'single',
        'single_content',
        'single_sidebars_left',
        'single_sidebars_right',
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
        $sidebars_left = get_theme_mod( 'limeasyblog_single_sidebars_no_left', '0' );
        $sidebars_right = get_theme_mod( 'limeasyblog_single_sidebars_no_right', '0' );

        // left sidebar
        if ( $sidebars_left > 0 ) {

            $columns = range( 1, $sidebars_left );

            foreach ( $columns as $column) {
                register_sidebar(
                    array(
                        'name'          => esc_html__( "Single left", 'limeasyblog' ) . " $column",
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
                        'name'          => esc_html__( "Single right", 'limeasyblog' ) . " $column",
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
    public function doSingle()
    {
        ?>

        <div id="single-0" class="page-section col-sm-12 col-md-12 page-wrap ">
            <div class="container ">
                <div class="row">
                    <div class="col-sm-12 section-element-inside ">
                        <div class="row inside">

                            <?php do_action( 'limeasyblog_action_single_sidebars_left' ); ?>

                            <?php do_action( 'limeasyblog_action_single_content' ); ?>

                            <?php do_action( 'limeasyblog_action_single_sidebars_right' ); ?>

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
    public function doSingleContent()
    {
        $this->columnsWidth();
        $width = $this->width['content'];
        ?>

        <div id="single-1rekpvean3a" class="page-section col-sm-12 col-md-<?php echo $width; ?>">
            <div class="col-sm-12 section-element-inside ">
                <?php
                    while ( have_posts() ) :
                        the_post();

                        get_template_part( 'template-parts/content', 'single');

                    endwhile; // End of the loop.
                ?>
            </div>
        </div>

        <?php
    }

    /**
     * Sidebars left
     */
    public function doSingleSidebarsLeft()
    {
        $sidebars = get_theme_mod( 'limeasyblog_single_sidebars_no_left', 'inherit' );

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
            <div id="single-ighnkfw2k5s<?php echo $column ?>" class="page-section col-sm-12 col-md-<?php echo $width ?> blog-widget">
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
    public function doSingleSidebarsRight()
    {
        $sidebars = get_theme_mod( 'limeasyblog_single_sidebars_no_right', 'inherit' );

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
            <div id="single-right-ighnkfw2k5s<?php echo $column ?>" class="page-section col-sm-12 col-md-<?php echo $width ?> blog-widget">
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
    public function doSinglePostsNavigation()
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
        $sidebars = get_theme_mod( 'limeasyblog_single_sidebars_no_left', 'inherit' );

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
        $sidebars = get_theme_mod( 'limeasyblog_single_sidebars_no_right', 'inherit' );

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
            'limeasyblog_single_setings_section',
            array(
                'title' => __( 'Single Post settings', 'limeasyblog' ),
                'priority' => 30,
            )
        );

        // blog left sidebars number
        $wp_customize->add_setting(
            'limeasyblog_single_sidebars_no_left',
            array(
                'capability' => 'edit_theme_options',
                'sanitize_callback' => 'limeasyblog_sanitize_select',
                'default' => 'inherit',
            )
        );

        // blog left sidebars number control
        $wp_customize->add_control(
            'limeasyblog_single_sidebars_no_left',
            array(
                'type' => 'select',
                'section' => 'limeasyblog_single_setings_section',
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
            'limeasyblog_single_sidebars_no_right',
            array(
                'capability' => 'edit_theme_options',
                'sanitize_callback' => 'limeasyblog_sanitize_select',
                'default' => 'inherit',
            )
        );

        // blog right sidebars number control
        $wp_customize->add_control(
            'limeasyblog_single_sidebars_no_right',
            array(
                'type' => 'select',
                'section' => 'limeasyblog_single_setings_section',
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

new LimeasyblogSingle( $LimeasyblogBlog );
