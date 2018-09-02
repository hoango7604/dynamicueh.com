<?php
/**
* Template part for displaying posts
*
* @link https://codex.wordpress.org/Template_Hierarchy
*
* @package magazineart
*/

?>
						<article class="single-post-warp " id="post-<?php the_ID(); ?> ">
							<?php if (has_post_thumbnail() && true == get_theme_mod('checkbox_featuredimg_box', true)): ?>
								<!-- featured-image -->
								<div class="featured-image">
									<?php $post_id = get_post($post); ?>
									<?php echo get_the_post_thumbnail($post_id, 'magazineart-xlarge'); ?>
								</div>
							<?php endif;?>
							<!-- featured-image END -->
							<div class="top-bar">
									<?php echo magazineart_breadcrumb();?>
							</div>
							<!-- post single content body -->
							<div class="post-single-details-body">
							<div class="single-header-warp">
									<?php $categories = get_the_category();
									if (! empty($categories)) { ?>
								<div class="cat-warp">
									<?php echo magazineart_category_list(); ?>
								</div>
								<?php }?>
								<div class="single-post-title">
									<h1> <?php the_title(); ?></h1>
								</div>
								<div class="post-meta">
									<span class="font-bold clear button secondary meta-author">
										<span><?php echo esc_html__('By', 'magazine-art');?> </span>
										<a class="vcard author" href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>" title="<?php echo esc_attr(get_the_author()); ?>">
											<?php echo get_the_author();?>
										</a>
									</span>
									<i class="fa fa-dot-circle-o" aria-hidden="true"></i>
									<span class="font-bold clear button secondary">
										<?php echo magazineart_time_link(); ?>
									</span>
									<?php if ( have_comments() ) : ?>
									<i class="fa fa-dot-circle-o" aria-hidden="true"></i>
									<span class="font-bold clear button secondary">
										<?php magazineart_meta_comment(); ?>
									</span>
								<?php endif; // Check for have_comments(). ?>
								</div>
							</div>
							<div class="post-single-content-body">
								<?php
								the_content(sprintf(
									/* translators: %s: Name of current post. */
									wp_kses(__('Continue reading %s <span class="meta-nav">&rarr;</span>', 'magazine-art'), array( 'span' => array( 'class' => array() ) )),
									the_title('<span class="screen-reader-text">"', '"</span>', false)
								));
								wp_link_pages(array(
									'before' => '<div class="page-links">' . esc_html__('Pages:', 'magazine-art'),
									'after'  => '</div>',
								));
								?>
								<?php if( has_tag() ) { ?>
								<div class="post-single-tags">
									<?php magazineart_meta_tag();?>
								</div>
							<?php }?>
							</div>
							<?php if ( true == get_theme_mod( 'checkbox_share_boxsingle', true ) ) : ?>
									<div class="share sharesingle">
										<div class="post-social-share">
											<?php echo magazineart_social_share_icons(); ?>
										</div>
									</div>
							<?php endif; ?>

							<!-- post single content body END -->
						<div class="post-pagination-wrap" role="navigation">
							<?php
							the_post_navigation(array(
								'prev_text' => '<span class="screen-reader-text">' . __('Previous Post', 'magazine-art') . '</span><span class="nav-left-icon"><i class="fa fa-angle-left"></i></span><span class="nav-left-link">'. __('Previous Post', 'magazine-art') .'<h4>%title</h4></span>',
								'next_text' => ' <span class="screen-reader-text">' . __('Next Post', 'magazine-art') . '</span><span class="nav-right-link">'. __('Next Post', 'magazine-art') .'</span><span class="nav-right-icon"><i class="fa fa-angle-right"></i><h4>%title</h4></span>',
							));?>
						</div>
					</div>
					</article>
