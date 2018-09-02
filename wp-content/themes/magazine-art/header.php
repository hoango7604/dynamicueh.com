<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="basecon-sticky">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Reve Themes
 * @subpackage magazine-art
 * @since 1.0
 * @version 1.0
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php wp_head();?>
</head>

	<body <?php body_class();?> >
		<?php if ( true == get_theme_mod( 'magazineart_layout_site_box', false ) ) : ?>
			<div class="box-layout">
		<?php endif; ?>
<div id="mainwarp-header">
		<?php
		/**
		* magazineart_before hook
		*/
		do_action( 'magazineart_before' ); ?>
		<!--top header-->
		<?php $social_icons_top = get_theme_mod( 'social_icons_top'); ?>
		<?php if ( true == get_theme_mod( 'topbar_menu_onof', true ) ) : ?>
			<?php if ( has_nav_menu( 'top-menu' ) || !empty( $social_icons_top ) ) : ?>
				<div class="top-header">
					<div class="top-bar">
						<?php if ( has_nav_menu( 'top-menu' ) ) : ?>
							<div class="top-bar-left">
								<?php
								wp_nav_menu(
									array(
										'theme_location' => 'top-menu',
										'container' => false,
										'menu_class' => 'menu',
										'depth' => 1,
									)
								);
								?>
							</div>
						<?php endif; ?>
						<?php if( !empty( $social_icons_top ) && true == get_theme_mod( 'socialicon_topbar', true ) ):?>
							<div class="top-bar-right">
								<ul class="menu social_icon">
									<?php foreach( $social_icons_top as $row ) : ?>
										<a class=" btn btn-round btn-just-icon btn-<?php echo esc_html( $row['social_icon']); ?>" target="_blank" href="<?php echo esc_url($row['social_url']); ?>">
											<i class="fa fa-<?php echo esc_html( $row['social_icon']); ?>"></i>
										</a>
									<?php endforeach; ?>
								</ul>
							</div>
						<?php endif; ?>
					</div>
				</div>
			<?php endif; ?>
		<?php endif; ?>
		<?php get_template_part( 'template-parts/header/header', 'mobile' ); ?>

		<div class="header-wrap" <?php if (  get_header_image() ) : ?> data-interchange="[<?php echo esc_url( header_image());?>, small],[<?php echo esc_url( header_image());?>, large]" <?php endif;?>>
			<div class="grid-container">
				<div class="banner-warp" >
					<?php
					/**
					* magazineart_sitebranding_content_loop hook
					*/
					do_action( 'magazineart_sitebranding_content_loop' ); ?>
					<?php if ( is_active_sidebar( 'sidebar-headeradvertising' ) ) :?>
						<div class="headeradvertising">
							<?php dynamic_sidebar( 'sidebar-headeradvertising' );?>
						</div>
					<?php endif;?>
				</div>
			</div>
		</div>
		<!--Menu START -->
		<div class="menu-outer" <?php if ( true == get_theme_mod( 'sticky_menu_onof', true ) ) : ?> data-sticky="data-sticky" data-options="marginTop:0;"  data-anchor="basecon-sticky" <?php endif; ?>>
			<div class="grid-container ">
				<div class="top-bar">
					<div class="top-bar-left">
						<div class="menu-wrap ">
								<?php
								wp_nav_menu(array(
									'container' => false,
									'menu' => __( 'Main Menu', 'magazine-art' ),
									'menu_class' => 'dropdown menu mainmenu',
									'theme_location' => 'primary',
									'items_wrap'      => '<ul id="%1$s" class="%2$s" data-dropdown-menu>%3$s</ul>',
									'fallback_cb' => 'magazineart_mainmenu_fallback', 
									'walker' => new MAGAZINEART_MAINMENU_WALKER(),

								));	?>

						</div>
					</div>
					<?php if( !empty( $social_icons_top ) && true == get_theme_mod( 'socialicon_menubar', false ) || true == get_theme_mod( 'search_icon_menubar', true ) ):?>
						<div class="top-bar-right">
							<ul class="menu social_icon">
								<?php if( !empty( $social_icons_top ) && true == get_theme_mod( 'socialicon_menubar', false ) ):?>
									<?php foreach( $social_icons_top as $row ) : ?>
										<a class=" btn btn-round btn-just-icon btn-<?php echo esc_html( $row['social_icon']); ?>" target="_blank" href="<?php echo esc_url($row['social_url']); ?>">
											<i class="fa fa-<?php echo esc_html( $row['social_icon']); ?>"></i>
										</a>
									<?php endforeach; ?>
								<?php endif; ?>
								<?php if( true == get_theme_mod( 'search_icon_menubar', true ) ):?>
									<div class="search-holder">
										<button class="search-button" data-toggle="reveal-search"></button>
										<div class="searchform-wrap full reveal" id="reveal-search" data-reveal data-animation-in="wow  fadeIn animated" data-animation-out="wow  fadeOut animated">
											<div class="vc-child h-inherit relative">
												<?php get_search_form(); ?>
											</div>
											<button class="close-search-form close-button" data-close aria-label="Close reveal" type="button">
												<i class="fa fa-times" aria-hidden="true"></i>
											</button>
										</div>
									</div>
								<?php endif; ?>
							</ul>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</div> <!--Menu END -->
</div> <!--main header warp end -->
<div id="basecon-sticky">
	<?php if ( is_front_page() && is_home() ) {

 get_template_part( 'template-parts/post/content', 'font' );
}?>
