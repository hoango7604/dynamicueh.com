<?php
/**
 * Handles all page layout
 * adding or removing laout to certain page
 * will be controlled from this file
 *
 * @package Reve Themes
 * @subpackage magazine-art
 * @since  1.0.0
 */

 /**
  * Add a pingback url auto-discovery header for singularly identifiable articles.
  */
 function magazineart_pingback_header() {
 	if ( is_singular() && pings_open() ) {
 		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
 	}
 }
 add_action( 'wp_head', 'magazineart_pingback_header' );


/*----------- Add body class -----------*/
add_filter( 'body_class', 'magazineart_body_class' );
function magazineart_body_class( $classes ) {
          $classes[] = 'full grid-container';

    return $classes;
}

/*----------- sidebar layout Blog Page-----------*/
if (! function_exists('magazineart_sidebar_layout')) :
function magazineart_sidebar_layout()
{
    $sidbar_position = get_theme_mod('sidbar_position_gen', 'right');
    if (!is_active_sidebar('right-sidebar') || 'full' == $sidbar_position) {
        $siderbar='large-20';
    } elseif (is_active_sidebar('right-sidebar') || ('right' == $sidbar_position)) {
        $siderbar='large-17';
    } elseif (is_active_sidebar('right-sidebar') || ('left' == $sidbar_position)) {
        $siderbar='large-17 ';
    }
    $siderbars = $siderbar;
    return $siderbars;
}
endif;


/*----------- sidebar layout Blog font Page-----------*/
if (! function_exists('magazineart_sidebar_layout_fontblog')) :
function magazineart_sidebar_layout_fontblog()
{
    $sidbar_position = get_theme_mod('sidbar_position_fontpost', 'right');
    if (!is_active_sidebar('right-sidebar') || 'full' == $sidbar_position) {
        $siderbar='large-20';
    } elseif (is_active_sidebar('right-sidebar') || ('right' == $sidbar_position)) {
        $siderbar='large-17';
    } elseif (is_active_sidebar('right-sidebar') || ('left' == $sidbar_position)) {
        $siderbar='large-17 ';
    }
    $siderbars = $siderbar;
    return $siderbars;
}
endif;

/*----------- Branding -----------*/
/**
 * Before hook for menu
 */
function magazineart_sitebranding_loop() {?>
    <div class="logo-inner">
      <?php the_custom_logo(); ?>
      <div class="site-branding">
        <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
        <?php $description = get_bloginfo( 'description', 'display' );
        if ( $description || is_customize_preview() ) : ?>
        <p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
        <?php endif; ?>
      </div><!-- .site-branding -->
    </div>
    <!--site-title END-->
<?php }
add_action( 'magazineart_sitebranding_content_loop', 'magazineart_sitebranding_loop' );

/*----------- footer -----------*/

function magazineart_copyright_loop() {?>
<!--COPYRIGHT TEXT-->
<div id="footer-copyright" class="footer-copyright-wrap">
	<?php $magazineart_footertext = get_theme_mod ('magazineart_footertext');?>
	<div class="grid-container">
		<div class="top-bar footer-copy">
      <div class="top-bar-left">
			<p class="display-inline"><?php echo esc_html($magazineart_footertext);?></p>
			<a target="_blank" href="<?php echo esc_url( 'https://revethemes.com'); ?>"><?php printf( esc_attr__( 'Theme by %s', 'magazine-art' ), 'Reve Themes' ); ?></a>
      </div>
		</div>
	</div>
</div>
<?php }
add_action( 'magazineart_copyright_content_loop', 'magazineart_copyright_loop' );

function magazineart_after_copyright_loop() {
echo '<a href="#0" class="scroll_to_top" data-smooth-scroll>';
echo '<i class="fa fa-angle-up "></i>';
echo '</a>';
}
add_action( 'magazineart_after_copyright_content_loop', 'magazineart_after_copyright_loop' );

/*----------- Meta box sidebar -----------*/

function magazineart_metasidebar_loop() {

  global $post;
  $layout = get_post_meta( $post->ID, 'magazineart_post_layout', true );
  if ( $layout == 'large-order-1') :
    echo  '<div class="cell small-24 medium-22 large-7 small-order-2 '.esc_attr($layout).'">';
    get_template_part('sidebar');
    echo '</div>';
  elseif($layout == 'layout--no-sidebar'):
        echo '';
  else:
    echo  '<div class="cell small-24 medium-22 large-7 small-order-2 '.esc_attr($layout).'">';
    get_template_part('sidebar');
    echo '</div>';
  endif;
}
add_action( 'magazineart_metasidebar_content_loop', 'magazineart_metasidebar_loop' );


// class for home without sidebard and fullwidth
function magazineart_withoutsidebar_home() {
if ( !is_active_sidebar( 'home-sidebar-magazineart' ) ): echo esc_attr('no-home-sidebar'); endif;
}
add_action( 'magazineart_withoutsidebar_home_loop', 'magazineart_withoutsidebar_home' );
