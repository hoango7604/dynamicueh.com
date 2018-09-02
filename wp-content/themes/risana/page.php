<?php
/**
 * The template for displaying all pages.
 *
 * @package Risana
 */
  get_header(); ?>
 <?php while (have_posts()) : the_post(); ?>
	 <div class="blue-header">
		<div class="img-container about-header-bg" <?php if ( has_post_thumbnail() && ! post_password_required() ) : ?> style="background-image: url('<?php echo esc_url(wp_get_attachment_url( get_post_thumbnail_id(get_the_id()))); ?>')"  <?php  endif; ?>></div>
		<div class="container">
			<h3 class="white with-shadow"><?php the_title(); ?></h3>
			<div class="white with-shadow"><?php the_excerpt(); ?></div>
		</div>
	</div>
	<div class="container">
		<div class="column-container">
			<div class="column-9-12">
				<div class="news-container news-single">
					<div class="gutter">
						<div class="news-item">
							<div class="text">
								<div class="editcontent"><?php the_content(); ?></div>
								<div class="clear"></div>
							</div>
						</div>
						<p><?php posts_nav_link(); ?></p>
						<div class="padinate-page"><?php wp_link_pages(); ?></div> 							
					</div>
					<div class="comments-container">
						<?php comments_template(); ?>
					</div>
				</div>
			</div>
			<div class="column-3-12">
				 <?php  get_sidebar(); ?>
			</div>
		</div>
	</div>
<?php endwhile; ?>	
<?php get_footer(); ?>