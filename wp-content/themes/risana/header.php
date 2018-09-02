<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Risana
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php endif; ?>
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	 <div class="main-wrapper">
		<div class="page-content">
			<header>
				<div class="container">
					<div class="column-container">
						<div class="column-2-12">
							<div class="logo-container">
                            <?php 
                            if ( has_custom_logo() ) { risana_the_custom_logo(); } 
                            else {
                            ?>       
                            <a href="<?php echo esc_url(home_url('/')); ?>">
                                <h3 class="logotitle"><?php echo bloginfo('name');?></h3>
                            </a>
                            <span><?php echo get_bloginfo('description');?></span>
                            <?php }?> 
                             </div>
						</div>
						<div class="column-10-12">
						    <a href="#" class="show-search"></a>
				            <?php wp_nav_menu( array('container'=> '', 'theme_location' => 'risana-menu', 'items_wrap'  => '<ul class="header-right-menu">%3$s</ul>', 'fallback_cb' => ''  ) ); ?>						
						</div>
					</div>
					<div class="search-box">
						<?php get_search_form(); ?>
					</div>
				</div>
				<div class="header-mobile"><a href="#" class="show-mobile-menu"><i class="fa fa-bars"></i></a>
					  <?php wp_nav_menu( array('container'=> '', 'theme_location' => 'risana-menu', 'items_wrap'  => '<ul class="header-right-menu">%3$s</ul>', 'fallback_cb' => ''   ) ); ?>			
				</div>
			</header>
		</div>	