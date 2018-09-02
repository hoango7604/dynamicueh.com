<?php
/**
 * The template for displaying the footer.
 *
 *
 * @package Risana
 */
?>
        <footer>
			<div class="container">
				<div class="widgets-container column-container">
					<div class="column-4-12">
						<div class="gutter">
							<?php if ( is_active_sidebar('footer-widget-area-1') ) : ?>
								<?php dynamic_sidebar('footer-widget-area-1'); ?>
							<?php endif; ?>
						</div>
					</div>
					<div class="column-4-12">
						<div class="gutter">
							<?php if ( is_active_sidebar('footer-widget-area-2') ) : ?>
								<?php dynamic_sidebar('footer-widget-area-2'); ?>
							<?php endif; ?>
						</div>
					</div>
					<div class="column-4-12">
						<div class="gutter">
							<?php if ( is_active_sidebar('footer-widget-area-3') ) : ?>
								<?php dynamic_sidebar('footer-widget-area-3'); ?>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
		</footer>
		<div class="footer-second">
			<div class="container">
			    <p class="left"><?php echo esc_html(get_theme_mod('copyrights')); ?></p>
				<p class="right"><?php do_action( 'risana_display_credits' ); ?></p>
			</div>
		</div>
	</div>	
<?php wp_footer(); ?>		
</body>
</html>