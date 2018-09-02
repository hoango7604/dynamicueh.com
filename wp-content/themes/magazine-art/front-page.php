<?php
/**
 * The front page template file.
 *
 * If the user has selected a static page for their homepage, this is what will
 * appear.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Magazine Art
 * @since Magazine Art 1.0
 */

  		get_header();
  magazineart_slider_style();
   ?>
   <div class="grid-container home-container">
     <div class="grid-x grid-margin-x align-center">
       <?php if ( ! is_active_sidebar( 'home-widgets-fullwidth-magazineart' ) && is_customize_preview()) :?>
         <!-- fullwidth Customizer Preview-->
         <div id="fullwidth-home_top" class="small-24 cell fullwidth-home_buttom panel-placeholder fullwidth">
           <span class="placeholder-panel-title">
             <?php echo esc_html__( 'Fullwidth Widgtes Area', 'magazine-art' ); ?>
           </span>
         </div>
         <!-- fullwidth Customizer Preview end-->
       <?php endif;?>

       <?php if ( is_active_sidebar( 'home-widgets-fullwidth-magazineart' ) ) :?>
         <div id="fullwidth-home_top" class="small-24 cell panel-focus-fullwidth fullwidth-home_buttom">
           <?php dynamic_sidebar( 'home-widgets-fullwidth-magazineart' );?>
         </div>
         <!-- fullwidth-->
       <?php endif;?>

       <?php if ( ! is_active_sidebar( 'home-widgets-magazineart' )  && is_customize_preview()) :?>
         <!-- home main Customizer Preview-->
         <div id="homesiderbar-stick" class="main_widgets large-auto small-24 cell panel-placeholder home">
           <span class="placeholder-panel-title">
             <?php echo esc_html__( 'Widgtes Area with sidebar', 'magazine-art' ); ?>
           </span>
         </div>
         <?php if ( ! is_active_sidebar( 'home-sidebar-magazineart' ) ) :?>
         <div class="homeside_widgets large-7 small-24 cell  panel-placeholder home" >
           <span class="placeholder-panel-title">
             <?php echo esc_html__( 'Sidebar Widgtes Area', 'magazine-art' ); ?>
           </span>
         </div>
       <?php endif;?>
       <!-- home main Customizer Preview end-->
       <?php endif;?>
       <?php if ( is_active_sidebar( 'home-widgets-magazineart' ) ) :?>
         <div id="homesiderbar-stick" class="large-auto small-24 cell panel-focus-main <?php do_action( 'magazineart_withoutsidebar_home_loop' ); ?>">
           <?php dynamic_sidebar( 'home-widgets-magazineart' );?>
         </div>
       <?php endif;?>

       <?php if (  is_customize_preview()) :?>
         <!-- Customizer Preview side-bar-->
         <?php if ( ! is_active_sidebar( 'home-widgets-magazineart' ) ) :?>
         <div id="homesiderbar-stick" class="main_widgets large-auto small-24 cell panel-placeholder home-side">
           <span class=" placeholder-panel-title">
             <?php echo esc_html__( 'Widgtes Area with sidebar', 'magazine-art' ); ?>
           </span>
         </div>
       <?php endif;?>
       <?php if ( ! is_active_sidebar( 'home-sidebar-magazineart' ) ) :?>
         <div class="homeside_widgets large-7 small-24 cell panel-placeholder home-side" >
           <span class="placeholder-panel-title">
             <?php echo esc_html__( 'Sidebar Widgtes Area', 'magazine-art' ); ?>
           </span>
         </div>
       <?php endif;?>
       <!-- side-bar Customizer Preview end-->
       <?php endif;?>

       <?php if ( is_active_sidebar( 'home-sidebar-magazineart' ) ) :?>
         <div class="large-7 small-24 cell" data-sticky-container>
           <div id="home-sidebar" class="sidebar-inner stick sticky" <?php if ( is_active_sidebar( 'home-widgets-magazineart' ) ) :?>
             data-sticky data-anchor="homesiderbar-stick" data-margin-top="4" data-sticky-on="large" <?php endif;?> >
             <div  class="grid-x grid-margin-x ">
               <?php dynamic_sidebar( 'home-sidebar-magazineart' );?>
             </div>
           </div>
         </div>
       <?php endif;?>
     </div>
   </div>
<?php
get_footer();
