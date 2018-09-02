<?php 
/**
 * 
 * @package Risana 
 */
?>
<div class="container">
	<div class="column-container">
		<div class="column-9-12">
			<div class="news-full-width margin-top-lg">
				<?php while (have_posts()) : the_post(); ?>
				<div class="gutter">
					<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<div class="news-item">
							<?php if ( has_post_thumbnail() && ! post_password_required() ) : ?>
							<div class="img-container">
								<a href="<?php the_permalink() ?>" class="link"><?php the_post_thumbnail('risana-photo-news'); ?></a>
								<div class="date-container"><span><?php the_time('d'); ?></span><span><?php the_time('M'); ?></span></div>
							</div>						
							<?php endif; ?>					
							<div class="meta-container <?php if ( !has_post_thumbnail() && ! post_password_required() ) : ?>fulwidthpost<?php endif; ?>">
								<div class="meta"><a href="<?php the_permalink() ?>" class="title"><?php if(get_the_title(get_the_id())) { the_title(); } else { the_time( get_option( 'date_format' ) ); } ?></a>
									<p class="user"><i class="fa fa-user"></i><?php the_author(); ?></p>
									<p class="category"><i class="fa fa-folder"></i><?php the_category(', '); ?></p>
									<p class="comments"><i class="fa fa-comments"></i><?php comments_popup_link( 'No comments', '1 comment', '% comments', 'comments-link', 'Comments are off'); ?></p>
								</div>
								<div class="text">
									<p><?php the_excerpt(); ?></p><a href="<?php the_permalink() ?>" class="read-more"><?php _e( 'read more', 'risana' ); ?></a>
								</div>
							</div>
						</div>
					</div>
				</div>				
				<?php endwhile; ?>		
			</div>
			<div class="pagination">
			<?php if(function_exists('wp_pagenavi')) { wp_pagenavi(); } else { ?>
					<span class="left button-gray"><?php next_posts_link(__('Previous Posts', 'risana')) ?></span>
					<span class="right button-gray"><?php previous_posts_link(__('Next posts', 'risana')) ?></span>			
			<?php } ?>
			</div>
		</div>
		<div class="column-3-12">
            <?php  get_sidebar(); ?>
		</div>
	</div>
</div>