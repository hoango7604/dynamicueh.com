<?php
/**
 * The main template file.
 *
 * @package Risana
 */
get_header();
if ( 'posts' == get_option( 'show_on_front')) {	
?>
<div class="blue-header">
	<div class="img-container news-header-bg"></div>
	<div class="container">
		<h3 class="white with-shadow"><?php echo esc_html(get_theme_mod('title_blog_page')); ?></h3>
    </div>
</div>
<?php
}
get_template_part( 'content', 'posts' ); 
get_footer(); 
?>