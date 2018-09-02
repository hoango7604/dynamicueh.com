<?php
/**
 * The footer for our theme
 *
 * This is the template that displays all of the <footer> section and everything up until <div id="basecon-sticky">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Reve Themes
 * @subpackage magazine-art
 * @since 1.0
 * @version 1.0
 */

?>
<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 */
?>
</div><!-- mian warp -->
  <footer id="footer" class="footer-wrap">
    <!-- Customizer Preview-->
    <?php if ( ! is_active_sidebar( 'magazineart-footer_sidebar' ) && is_customize_preview()) :?>
      <div class="top-footer-wrap panel-placeholder footerwidgets">
        <div class="grid-container">
          <div class="grid-x  ">
            <div class="footer_widgets_warp cell small-24 medium-12 large-8 align-self-top " >
              <span class=" placeholder-panel-title">
                <?php echo esc_html__( ' Widgtes one', 'magazine-art' ); ?>
              </span>
            </div>
            <div class="footer_widgets_warp cell small-24 medium-12 large-8 align-self-top " >
              <span class=" placeholder-panel-title">
                <?php echo esc_html__( 'Widgtes Two', 'magazine-art' ); ?>
              </span>
            </div>
            <div class="footer_widgets_warp cell small-24 medium-12 large-8 align-self-top" >
              <span class=" placeholder-panel-title">
                <?php echo esc_html__( 'Widgtes Three', 'magazine-art' ); ?>
              </span>
            </div>
          </div>
        </div>
      </div>
      <!-- Customizer Preview-->
    <?php endif;?>

    <?php if ( is_active_sidebar( 'magazineart-footer_sidebar' ) ) { ?>
      <!--FOOTER WIDGETS-->
      <div class="top-footer-wrap" >
        <div class="grid-container">
          <div class="grid-x  ">
            <?php if ( is_active_sidebar('dynamic_sidebar') || !dynamic_sidebar('magazineart-footer_sidebar') ) : ?><?php endif; ?>
          </div>
        </div>
      </div>
      <!--FOOTER WIDGETS END-->
    <?php } ?>

    <?php

    /**
     * COPYRIGHT text hook
     */
    do_action( 'magazineart_copyright_content_loop' );

    /**
     * magazineart_after_copyright_loop hook
     */
    do_action( 'magazineart_after_copyright_content_loop' );
    ?>
  </footer>
  <?php if ( true == get_theme_mod( 'magazineart_layout_site_box', false ) ) : ?>
  </div>
  <?php endif; ?>

  <?php wp_footer(); ?>
  </body>
</html>
