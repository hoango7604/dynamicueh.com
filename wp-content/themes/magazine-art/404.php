<?php
/**
 * The template for displaying 404 pages (Not Found)
 * @package
 * @subpackage magazineart
 */
get_header(); ?>
	<section class="page-404">
		<div class="grid-container">
			<div class="grid-x align-center ">
				<div class="cell cell text-center ">
					<h1 class="page-title">
						<?php esc_html__( 'Oops! That page can&rsquo;t be found.', 'magazine-art' ); ?>
					</h1>
					<p>
						<?php esc_html__( 'It looks like nothing was found at this location. Maybe try a search?', 'magazine-art' ); ?>
					</p>
					<?php get_search_form(); ?>
				</div>
			</div>
		</div>
	</section>
<?php get_footer(); ?>
