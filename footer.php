<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package limeasyblog
 */

?>

	<footer id="colophon" class="site-footer">

		<div id="footer-0" class="footer-section col-sm-12 col-md-12 footer-wrap ">
			<div class="container ">
				<div class="row">
					<div class="col-sm-12 section-element-inside ">
						<div class="row inside">
							<div id="footer-3bds0suaie0"
								class="footer-section col-sm-12 col-md-12 footer-content-wrap ">
								<div class="row">
									<div class="col-sm-12 section-element-inside ">
										<div class="row inside">
											<div id="footer-87rh5li58d3"
												class="footer-section col-sm-12 col-md-3 footer-widget ">
												<div class="col-sm-12 section-element-inside ">
													<?php dynamic_sidebar( 'footer-1' ); ?>
												</div>
											</div>
											<div id="footer-yi8d3e99qtv"
												class="footer-section col-sm-12 col-md-3 footer-widget ">
												<div class="col-sm-12 section-element-inside ">
													<?php dynamic_sidebar( 'footer-2' ); ?>
												</div>
											</div>
											<div id="footer-kk71lcl3nze"
												class="footer-section col-sm-12 col-md-3 footer-widget ">
												<div class="col-sm-12 section-element-inside ">
													<?php dynamic_sidebar( 'footer-3' ); ?>
												</div>
											</div>
											<div id="footer-kks71lcls3n"
												class="footer-section col-sm-12 col-md-3 footer-widget ">
												<div class="col-sm-12 section-element-inside ">
													<?php dynamic_sidebar( 'footer-4' ); ?>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div id="footer-xx6il1zc0cw"
								class="footer-section col-sm-12 col-md-12 footer-site-info-wrap ">
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
																printf( esc_html__( 'Theme: %1$s by %2$s.', 'limeasyblog' ), 'limeasyblog', '<a href="https://github.com/syntheticThemes/limeasyblog">limeasyblog</a>' );
															?>
														</div><!-- .site-info -->
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

	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>