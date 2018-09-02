<?php

class MAGAZINEART_MAINMENU_WALKER extends Walker_Nav_Menu
{
	/*
	 * Add vertical menu class and submenu data attribute to sub menus
	 */

	function start_lvl( &$output, $depth = 0, $args = array() ) {
		$indent = str_repeat("\t", $depth);
		$output .= "\n$indent<ul class=\"vertical menu animated fadeIn\" data-submenu>\n";
	}
}
//Optional fallback
function magazineart_mainmenu_fallback($args)
{
	/*
	 * Instantiate new Page Walker class instead of applying a filter to the
	 * "wp_page_menu" function in the event there are multiple active menus in theme.
	 */

	$walker_page = new Walker_Page();
	$fallback = $walker_page->walk(get_pages(), 0);
	$fallback = str_replace("<ul class='children'>", '<ul class="children submenu menu vertical" data-submenu>', $fallback);

	echo '<ul class="dropdown menu " data-dropdown-menu>'.$fallback.'</ul>';
}



//  Menu mobile
function magazineart_off_canvas_mobile() {
	 wp_nav_menu(array(
        'container' => false,                           // Remove nav container
        'menu_class' => 'vertical menu accordion-menu off-canvas-inner',       // Adding custom nav class
        'items_wrap' => '<ul id="%1$s" class="%2$s" data-accordion-menu data-submenu-toggle="true">%3$s</ul>',
        'theme_location' => 'primary',        			// Where it's located in the theme
        'depth' => 5,                                   // Limit the depth of the nav
        'fallback_cb' => false,                         // Fallback function (see below)
        'walker' => new Off_Canvas_Menu_Walker()
    ));
}

class Off_Canvas_Menu_Walker extends Walker_Nav_Menu {
    function start_lvl(&$output, $depth = 0, $args = Array() ) {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<ul class=\"vertical menu nested\">\n";
    }
}


if ( ! function_exists( 'magazineart_breadcrumb' ) ) {
 /**
	* Breadcrumb Trail
	*
	* @since 1.0.0
	*
	* @global array $post global post variable
	* @global array $wp_query global query variable
	*/
 function magazineart_breadcrumb() {

	 // Settings.
	 $separator          = '&gt;';
	 $id         = 'breadcrumbs';
	 $home_title         = esc_html__( 'Home', 'magazine-art' );

	 // Get the query & post information.
	 global $post,$wp_query;

		 $breadcrumbs_class = 'breadcrumbs';

	 // Build the breadcrums.
	 echo '<ul id="' .esc_attr($id). '" class="' . esc_attr( $breadcrumbs_class ) . '">';

	 // Home page.
	 echo '<li class="item-home"><a class="bread-link bread-home" href="' . esc_html( get_home_url() ) . '" title="' . esc_attr( $home_title ) . '"><span>' . esc_attr( $home_title ) . '</span></a></li>';

	 if ( is_archive() && is_tax() && ! is_category() && ! is_tag() ) {

		 // If post is a custom post type.
		 $post_type = get_post_type();

		 $post_type_object       = get_post_type_object( $post_type );
		 $post_type_archive_link = get_post_type_archive_link( $post_type );

		 echo '<li class="item-current"><a class="item-taxonomy" href="' . esc_url( $post_type_archive_link ) . '" title="' . esc_attr( $post_type_object->labels->name ) . '"><span>' . esc_html( $post_type_object->labels->name ) . '</span></a></li>';
		 $custom_taxonomy = get_queried_object()->name;
		 echo '<li class="item-current"><span>' . esc_html( $custom_taxonomy ) . '</span></li>';

	 } elseif ( is_single() ) {

		 // If post is a custom post type.
		 $post_type = get_post_type();

		 $post_type_object = get_post_type_object( $post_type );
		 $post_type_archive_link = get_post_type_archive_link( $post_type );

		 echo '<li class="item-current"><a class="item-custom-post-type" href="' . esc_url( $post_type_archive_link ) . '" title="' . esc_attr( $post_type_object->labels->name ) . '"><span>' . esc_html( $post_type_object->labels->name ) . '</span></a></li>';

		 // Get post category info.
		 $category = get_the_category();

		 if ( ! empty( $category ) ) {

			 // Get last category post is in.
			 $slice_array   = array_slice( $category, -1 );
			 $last_category = array_pop( $slice_array );

			 // Get parent any categories and create array.
			 $get_cat_parents = rtrim( get_category_parents( $last_category->term_id, true, ',' ),',' );
			 $cat_parents     = explode( ',', $get_cat_parents );

			 // Loop through parent categories and store in variable $cat_display.
			 $cat_display = '';
			 foreach ( $cat_parents as $parents ) {
				 $cat_display .= '<li class="item-current item-cat"><span>' . $parents . '</span></li>';
			 }
		 }

		 // Check if the post is in a category.
		 if ( ! empty( $last_category ) ) {
			 echo  $cat_display;
			 echo '<li class="item-current"><span>' . esc_html( get_the_title() ) . '</span></li>';

		 } else {
			 echo '<li class="item-current"><span>' . esc_html( get_the_title() ) . '</span></li>';
		 }
	 } elseif ( is_category() ) {
		 // Category page.
		 echo '<li class="item-current><strong class="bread-current">' . single_cat_title( '', false ) . '</strong></li>';

	 } elseif ( is_page() ) {

		 // Standard page.
		 if ( $post->post_parent ) {
			 // If child page, get parents.
			 $anc = get_post_ancestors( $post->ID );

			 // Get parents in the right order.
			 $anc = array_reverse( $anc );
			 $parents = '';

			 // Parent page loop.
			 foreach ( $anc as $ancestor ) {
				 $parents .= '<li class="item-parent"><a class="bread-parent" href="' . esc_url( get_permalink( $ancestor ) ) . '" title="' . esc_attr( get_the_title( $ancestor ) ) . '"><span>' . esc_html( get_the_title( $ancestor ) ) . '</span></a></li>';
			 }

			 // Display parent pages.
			 echo esc_attr( $parents );

			 // Current page.
			 echo '<li class="current"><span>' . esc_html( get_the_title() ) . '</span></li>';

		 } else {
			 // Just display current page if not parents.
			 echo '<li class="current><span>' . esc_html( get_the_title() ) . '</span></li>';
		 }
	 } elseif ( is_tag() ) {
		 // Tag page.
		 // Get tag information.
		 $term_id        = get_query_var( 'tag_id' );
		 $taxonomy       = 'post_tag';
		 $args           = 'include=' . $term_id;
		 $terms          = get_terms( $taxonomy, $args );
		 $get_term_id    = $terms[0]->term_id;
		 $get_term_slug  = $terms[0]->slug;
		 $get_term_name  = $terms[0]->name;

		 // Display the tag name.
		 echo '<li class="current"><span>' . esc_html( $get_term_name ) . '</span></li>';

	 } elseif ( is_day() ) {

		 // Day archive.
		 // Year link.
		 echo '<li class="item-year"><a class="bread-year" href="' . esc_url( get_year_link( get_the_time( __( 'Y', 'magazine-art' ) ) ) ) . '" title="' . esc_attr( get_the_time( __( 'Y', 'magazine-art' ) ) ) . '"><span>' . esc_html( get_the_time( __( 'Y', 'magazine-art' ) ) ) . '</span></a></li>';

		 // Month link.
		 echo '<li class="item-month"><a class="bread-month" href="' . esc_url( get_month_link( get_the_time( __( 'Y', 'magazine-art' ) ), get_the_time( __( 'M', 'magazine-art' ) ) ) ) . '" title="' . esc_attr( get_the_time( __( 'M', 'magazine-art' ) ) ) . '"><span>' . esc_html( get_the_time( __( 'M', 'magazine-art' ) ) ) . '</span></a></li>';

		 // Day display.
		 echo '<li class="current"><span>' . esc_html( get_the_time( __( 'jS', 'magazine-art' ) ) . get_the_time( __( 'M', 'magazine-art' ) ) ) . '</span></li>';

	 } elseif ( is_month() ) {

		 // Month Archive.
		 // Year link.
		 echo '<li class="item-current"><a class="bread-year" href="' . esc_url( get_year_link( get_the_time( __( 'Y', 'magazine-art' ) ) ) ) . '" title="' . esc_attr( get_the_time( __( 'Y', 'magazine-art' ) ) ) . '"><span>' . esc_html( get_the_time( __( 'Y', 'magazine-art' ) ) ) . '</span></a></li>';

		 // Month link.
		 echo '<li class="item-current"><span>' . esc_html( get_the_time( __( 'M', 'magazine-art' ) ) ) . '</span></li>';

	 } elseif ( is_year() ) {

		 // Display year archive.
		 echo '<li class="item-current"><span>' . esc_html( get_the_time( __( 'Y', 'magazine-art' ) ) ) . '</span></li>';

	 } elseif ( is_author() ) {

		 // Auhor archive.
		 // Get the author information.
		 global $author;
		 $userdata = get_userdata( $author );

		 // Display author name.
		 echo '<li class="item-current"><span>' .  $userdata->display_name . '</span></li>';

	 } elseif ( get_query_var( 'paged' ) ) {
		 // Paginated archives.
		 echo '<li class="item-current"><span>' . esc_html__( 'Page', 'magazine-art' ) . esc_html( get_query_var( 'paged' ) ) . '</span></li>';

	 } elseif ( is_search() ) {
		 // Search results page.
		 echo '<li class="item-current"><span>' . esc_html__( 'Search results for: ', 'magazine-art' ) . esc_html( get_search_query() ) . '</span></li>';

	 } elseif ( is_404() ) {
		 // 404 page.
		 echo '<li class="item-current"><span>' . esc_html__( '404 Error', 'magazine-art' ) . '</span></li>';
	 }

	 echo '</ul>';

 }
}
