<?php 
/**
 * 
 * @package Risana 
 */
?>
<?php if( get_theme_mod('slider_content_1') or get_theme_mod('slider_content_2')) { ?>
<div class="home-header-slider slider-paged" id="home-header-slider">
	<?php 
	if( get_theme_mod('slider_content_1')) { 
	$queryslider = new WP_query('page_id='.get_theme_mod('slider_content_1' ,true)); 
	while( $queryslider->have_posts() ) : $queryslider->the_post();
	?> 
	<div class="slide-item">
		<div class="container">
			<div class="text-box">
				<h3><?php the_title(); ?></h3>
				<p><?php the_excerpt(); ?></p>
				<a href="<?php the_permalink(); ?>" class="button rounded-button"><?php echo esc_html(get_theme_mod('slider_button_color_text1',__( 'view detailes', 'risana' ))); ?></a>
			</div>
		</div>
		<div class="img-container">
			<?php the_post_thumbnail(); ?>
		</div>
	</div>		
	<?php endwhile; wp_reset_postdata(); ?>
	<?php } ?>	
	<?php 
	if( get_theme_mod('slider_content_2')) { 
	$queryslider = new WP_query('page_id='.get_theme_mod('slider_content_2' ,true)); 
	while( $queryslider->have_posts() ) : $queryslider->the_post();
	?> 
	<div class="slide-item">
		<div class="container">
			<div class="text-box">
				<h3><?php the_title(); ?></h3>
				<p><?php the_excerpt(); ?></p>
				<a href="<?php the_permalink(); ?>" class="button rounded-button"><?php echo esc_html(get_theme_mod('slider_button_color_text2',__( 'view detailes', 'risana' ))); ?></a>
			</div>
		</div>
		<div class="img-container">
			<?php the_post_thumbnail(); ?>
		</div>
	</div>		
	<?php endwhile; wp_reset_postdata(); ?>
	<?php } ?>			
</div>
<?php }  ?>
<div class="home-services">
	<div class="container">
		<div class="title-block">
			<h3><?php echo esc_html(get_theme_mod('wut')); ?></h3>
			<p><?php echo esc_html(get_theme_mod('wuc')); ?></p>
			<div class="title-bg">
				<div class="bg"></div>
			</div>
		</div>
		<div class="services-slider column-container" id="services-slider">
			<?php 
			if( get_theme_mod('circles_box_page_1')) { 
			$queryhomebox = new WP_query('page_id='.get_theme_mod('circles_box_page_1' ,true)); 
			while( $queryhomebox->have_posts() ) : $queryhomebox->the_post();
			?> 
			<div class="column-3-12">
				<div class="icon">
					<a href="<?php the_permalink(); ?>"><span class="fa fa-<?php echo sanitize_html_class(get_theme_mod('circles_box_image_1')); ?>"></span></a>					
				</div>
				<a href="<?php the_permalink(); ?>" class="link"><h3><?php the_title(); ?></h3></a>
				<p class="large"><?php the_excerpt(); ?></p>
			</div>				
			<?php endwhile; wp_reset_postdata(); ?>
			<?php } ?>
			<?php 
			if( get_theme_mod('circles_box_page_2')) { 
			$queryhomebox = new WP_query('page_id='.get_theme_mod('circles_box_page_2' ,true)); 
			while( $queryhomebox->have_posts() ) : $queryhomebox->the_post();
			?> 
			<div class="column-3-12">
				<div class="icon">
					<a href="<?php the_permalink(); ?>"><span class="fa fa-<?php echo sanitize_html_class(get_theme_mod('circles_box_image_2')); ?>"></span></a>					
				</div>
				<a href="<?php the_permalink(); ?>" class="link"><h3><?php the_title(); ?></h3></a>
				<p class="large"><?php the_excerpt(); ?></p>
			</div>				
			<?php endwhile; wp_reset_postdata(); ?>
			<?php } ?>				
			<?php 
			if( get_theme_mod('circles_box_page_3')) { 
			$queryhomebox = new WP_query('page_id='.get_theme_mod('circles_box_page_3' ,true)); 
			while( $queryhomebox->have_posts() ) : $queryhomebox->the_post();
			?> 
			<div class="column-3-12">
				<div class="icon">
					<a href="<?php the_permalink(); ?>"><span class="fa fa-<?php echo sanitize_html_class(get_theme_mod('circles_box_image_3')); ?>"></span></a>					
				</div>
				<a href="<?php the_permalink(); ?>" class="link"><h3><?php the_title(); ?></h3></a>
				<p class="large"><?php the_excerpt(); ?></p>
			</div>				
			<?php endwhile; wp_reset_postdata(); ?>
			<?php } ?>
			<?php 
			if( get_theme_mod('circles_box_page_4')) { 
			$queryhomebox = new WP_query('page_id='.get_theme_mod('circles_box_page_4' ,true)); 
			while( $queryhomebox->have_posts() ) : $queryhomebox->the_post();
			?> 
			<div class="column-3-12">
				<div class="icon">
					<a href="<?php the_permalink(); ?>"><span class="fa fa-<?php echo sanitize_html_class(get_theme_mod('circles_box_image_4')); ?>"></span></a>					
				</div>
				<a href="<?php the_permalink(); ?>" class="link"><h3><?php the_title(); ?></h3></a>
				<p class="large"><?php the_excerpt(); ?></p>
			</div>				
			<?php endwhile; wp_reset_postdata(); ?>
			<?php } ?>						
		</div>
	</div>
</div>
<div class="blue-bg">
	<div class="bg"></div>
	<div class="twitter-slider slider-paged container">
		<div class="twitter-item">
			<p><span class="white with-shadow"><?php echo esc_html(get_theme_mod('home_slug_text')); ?></span></p>
		</div>
	</div>
</div>
<?php while (have_posts()) : the_post(); ?>	
<div class="container">
	<div class="column-container">
		<div class="column-12-12">
			<div class="news-single">
				<div class="gutter">
					<div class="news-item-homepage">
						<div class="text">
							<div class="editcontent"><?php the_content(); ?></div>
						</div>
					</div>						
				</div>
			</div>
		</div>
	</div>
</div>		
<?php endwhile; ?>
<div class="news-container">
	<div class="container">
		<h3 class="title blue-border"><?php echo esc_html(get_theme_mod('title_blog_page')); ?></h3>
	</div>
	<div class="news-slider slider-nav-blue container" id="news-slider">
		<?php 
		$risana_get_list_posts = risana_get_list_posts(10);
		while ( $risana_get_list_posts->have_posts() ) {
		$risana_get_list_posts->the_post();
		?>
			<div class="gutter">
				<div class="news-item">
					<div class="meta-container">
						<?php if ( has_post_thumbnail() && ! post_password_required() ) : ?>
						<div class="img-container">
							<a href="<?php the_permalink() ?>" class="link"><?php the_post_thumbnail('risana-photo-news'); ?></a>
							<div class="date-container"><span><?php the_time('d'); ?></span><span><?php the_time('M'); ?></span></div>
						</div>						
						<?php endif; ?>
						<div class="meta"><a href="<?php the_permalink(); ?>" class="title"><?php the_title(); ?></a>
							<p class="user"><i class="fa fa-user"></i><?php the_author(); ?></p>
							<p class="category"><i class="fa fa-folder"></i><?php the_category(', '); ?></p>
						</div>
					</div>
					<div class="text">
						<p><?php the_excerpt(); ?></p><a href="<?php the_permalink(); ?>" class="read-more"><?php _e( 'read more', 'risana' ); ?></a>
					</div>
				</div>
			</div>				
		<?php } ?>			
	</div>
</div>