<?php
/**
 * For Mobile
 */
?>
<div class="mobile-header" >
	<?php if ( is_active_sidebar( 'sidebar-headeradvertising' ) ) :?>
		<div class="headeradvertising">
			<?php dynamic_sidebar( 'sidebar-headeradvertising' );?>
		</div>
	<?php endif;?>
	<div class="title-bar" data-sticky="data-sticky" data-options="marginTop:0;"  data-anchor="basecon-sticky" data-sticky-on="small">
		<div class="title-bar-left">
			<div class="off-canvas-content" data-off-canvas-content>
				<button id="burger" class="offcanvas-trigger" type="button" data-open="offCanvasmobile">
					<span></span>
					<span></span>
					<span></span>
				</button>
			</div>
		</div>
		<!--site-title-->
		<div class="title-bar-right">
			<?php
			/**
			* magazineart_sitebranding_content_loop hook
			*/
			do_action( 'magazineart_sitebranding_content_loop' ); ?>
		</div>
	</div>
	</div>

	<!-- mobile menu content --->
	<div class="off-canvas-wrapper ">
		<div class="multilevel-offcanvas off-canvas position-top" id="offCanvasmobile" data-off-canvas data-transition="overlap">
			<button class="close-button" aria-label="Close menu" type="button" data-close>
				<span aria-hidden="false">&times;</span>
			</button>
			<?php magazineart_off_canvas_mobile(); ?>
		</div>
	</div>
