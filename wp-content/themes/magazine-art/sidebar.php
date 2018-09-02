<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Reve Themes
 * @subpackage magazine-art
 * @since 1.0
 * @version 1.0
 */

if ( ! is_active_sidebar( 'right-sidebar' ) ) {
	return;
}
?>
      <div id="sidebar" class="sidebar-inner" >
        <div  class="grid-x grid-margin-x ">
            <?php dynamic_sidebar( 'right-sidebar' ); ?>
        </div>
      </div>
