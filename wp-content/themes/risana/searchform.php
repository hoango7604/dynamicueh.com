<?php
/**
 * The Serach Form for our theme.
 *
 *
 * @package Risana
 */
?>
<form class="search-form" action="<?php echo esc_url(home_url('/')); ?>" method="post">
    <input class="search-field" name="s" type="text" value="<?php the_search_query(); ?>" placeholder="<?php _e( 'Search here', 'risana' );  ?>" />
	 <button></button>
</form>