<?php
/**
 * Footer
 * 
 * @since 1.0.5
 */

class LimeasyblogFooter 
{
    /**
     * Section name
     * 
     * @since 1.0.5
     */
    protected $section = 'footer';

    /**
     * Theme slug name
     * 
     * @since 1.0.5
     */
    protected $slug = 'limeasyblog';

    /**
     * Action priority
     * 
     * @since 1.0.5
     */
    protected $priority = '10';

    /**
     * Actions list
     * 
     * @since 1.0.5
     */
    protected $actions = [
        'footer',
        'footer_widgets',
        'footer_widget',
        'footer_copyright',
    ];

    /**
     * Constructor
     */
    public function __construct()
    {
        // add actions
        $this->addActions();

        // register widgets
        $this->widgetInit();
    }

    /**
     * Add actions
     * 
     * @since 1.0.5
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
     * @since 1.0.5
     */
    public function widgetInit()
    {
        add_action( 'widgets_init', array( $this, 'registerWidgets' ));
    }

    /**
     * Register widgets
     * 
     * @since 1.0.5
     */
    public function registerWidgets()
    {
		$footer_columns = get_theme_mod( 'limeasyblog_theme_footer_columns', LIMEASYBLOG_DEFAULT_FOOTER_COLUMNS );
		$footer_columns = range( 1, $footer_columns );

        $title_prefix = ucfirst( $this->section );

		foreach ( $footer_columns as $column) {
            register_sidebar(
                array(
                    'name'          => esc_html__( "$title_prefix $column", 'limeasyblog' ),
                    'id'            => "{$this->section}-{$column}",
                    'description'   => esc_html__( 'Add widgets here.', 'limeasyblog' ),
                    'before_widget' => '<section id="%1$s" class="widget %2$s">',
                    'after_widget'  => '</section>',
                    'before_title'  => '<h2 class="widget-title">',
                    'after_title'   => '</h2>',
                )
            );
		}
    }

    /**
     * Footer wrapper
     * 
     * @since 1.0.5
     */
    public function doFooter()
    {
        ?>

        <footer id="colophon" class="site-footer">

            <div id="footer-0" class="footer-section col-sm-12 col-md-12 footer-wrap ">
                <div class="container ">
                    <div class="row">
                        <div class="col-sm-12 section-element-inside ">
                            <div class="row inside">
                                
                                <?php do_action( "{$this->slug}_action_footer_widgets" ); ?>

                                <?php do_action( "{$this->slug}_action_footer_copyrights" ); ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </footer><!-- #colophon -->

        <?php
    }

    /**
     * Footer widgets
     * 
     * @since 1.0.5
     */
    public function doFooterWidgets()
    {
        $footer_columns = get_theme_mod( 'limeasyblog_theme_footer_columns', LIMEASYBLOG_DEFAULT_FOOTER_COLUMNS );
        $column_width = get_theme_mod( 'limeasyblog_theme_footer_columns_width', 'auto' );
        $width = $column_width == 'auto' ? ( 12 / $footer_columns ) : $column_width;

        ?>

        <div id="footer-3bds0suaie0"
            class="footer-section col-sm-12 col-md-12 footer-content-wrap ">
            <div class="row">
                <div class="col-sm-12 section-element-inside ">
                    <div class="row inside">
                    
                        <?php foreach( range(1, $footer_columns) as $column ) { ?>
                            <div id="footer-87rh5li58d3<?php echo $column ?>" class="footer-section col-sm-12 col-md-<?php echo $width ?> footer-widget ">
                                <div class="col-sm-12 section-element-inside ">
                                    <?php dynamic_sidebar( "footer-$column" ); ?>
                                </div>
                            </div>
                        <?php } ?>
                        
                    </div>
                </div>
            </div>
        </div>

        <?php
    }

    /**
     * Footer copyright area
     * 
     * @since 1.0.5
     */
    public function doFooterCopyright()
    {
        ?>
        
        <div id="footer-xx6il1zc0cw" class="footer-section col-sm-12 col-md-12 footer-site-info-wrap ">
            <div class="row">
                <div class="col-sm-12 section-element-inside ">
                    <div class="row inside">
                        <div id="footer-2m05kacnwa9"
                            class="footer-section col-sm-12 col-md-12 footer-site-info-text ">
                            <div class="row">
                                <div class="col-sm-12 section-element-inside ">
                                    <div class="site-info">
                                        <a href="<?php echo esc_url( __( 'https://wordpress.org/', 'limeasyblog' ) ); ?>">
                                            <?php
                                                /* translators: %s: CMS name, i.e. WordPress. */
                                                printf( esc_html__( 'Proudly powered by %s', 'limeasyblog' ), 'WordPress' );
                                            ?>
                                        </a>
                                        <span class="sep"> | </span>
                                        <?php
                                            /* translators: 1: Theme name, 2: Theme author. */
                                            printf( esc_html__( 'Theme: %1$s by %2$s.', 'limeasyblog' ), 'limeasyblog', '<a href="https://github.com/unlimiTheme/limeasyblog">limeasyblog</a>' );
                                        ?>
                                    </div><!-- .site-info -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php
    }
}
new LimeasyblogFooter();