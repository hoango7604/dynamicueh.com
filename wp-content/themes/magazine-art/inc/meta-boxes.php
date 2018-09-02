<?php
/**
 * Script to add Meta Boxes
 *
 * @package magazineart
 */

/**
 * Registers metaboxes.
 */
function magazineart_register_metaboxes() {
	add_meta_box( 'magazineart_post_layout', esc_html__( 'Choose Layout', 'magazine-art' ), 'magazineart_layout_cb', array( 'post', 'page' ), 'side' );
}
add_action( 'add_meta_boxes', 'magazineart_register_metaboxes' );

/**
 * Callback for layout option.
 * Shows radio button to choose layout
 *
 * @param array $post current post information.
 */
function magazineart_layout_cb( $post ) {

	// Use nonce for form verification.
	wp_nonce_field( basename( __FILE__ ), 'magazineart_meta_nonce' );

	$layout = get_post_meta( $post->ID, 'magazineart_post_layout', true );

	// Set default value if metabox returns empty.
	if ( empty( $layout ) ) {
		$layout = 'large-order-2';
	}
	?>
		<input type="radio" name="magazineart_post_layout" id="magazineart-post-layout" value="layout--no-sidebar" <?php checked( $layout, 'layout--no-sidebar' ); ?>> <?php esc_html_e( 'Full Width', 'magazine-art' ); ?> <br>
		<input type="radio" name="magazineart_post_layout" id="magazineart-post-layout" value="large-order-1" <?php checked( $layout, 'large-order-1' ); ?>> <?php esc_html_e( 'Left Sidebar', 'magazine-art' ); ?> <br>
		<input type="radio" name="magazineart_post_layout" id="magazineart-post-layout" value="large-order-2" <?php checked( $layout, 'large-order-2' ); ?>> <?php esc_html_e( 'Right Sidebar', 'magazine-art' ); ?> <br>
	<?php
}

/**
 * Saves metaboxes value to database
 *
 * @param int $post_id current post id.
 */
function magazineart_save_metaboxes( $post_id ) {
	global $post;

	// verify nonce.
	$magazineart_meta_nonce = '';
	if ( isset( $_POST['magazineart_meta_nonce'] ) && ! wp_verify_nonce( 'magazineart_meta_nonce', basename( __FILE__ ) ) ) {
		$magazineart_meta_nonce = sanitize_text_field( wp_unslash( $_POST['magazineart_meta_nonce'] ) );
	}
	if ( ! $magazineart_meta_nonce ) {
		return;
	}

	// Stop wp from clearing custom fields on autosave.
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}

	// check user role.
	$magazineart_post_type = '';
	if ( isset( $_POST['post_type'] ) ) {
		$magazineart_post_type = sanitize_text_field( wp_unslash( $_POST['post_type'] ) );
	}

	if ( in_array( $magazineart_post_type, array( 'post', 'pages' ), true ) ) {
		if ( ! current_user_can( 'edit_post', $post_id ) || ! current_user_can( 'edit_page', $post_id ) ) {
			return $post_id;
		}
	}

	$magazineart_post_layout = '';
	if ( isset( $_POST['magazineart_post_layout'] ) ) {
		$magazineart_post_layout = sanitize_text_field( wp_unslash( $_POST['magazineart_post_layout'] ) );
	}

	// Only save to database if the layout is not default.
	if ( $magazineart_post_layout && 'large-order-2' !== $magazineart_post_layout ) {
		$old_value = $magazineart_post_layout;
		$new_value = sanitize_text_field( $old_value );

		if ( $new_value ) {
			update_post_meta( $post_id, 'magazineart_post_layout', $new_value );
		}
	} else {
		delete_post_meta( $post_id, 'magazineart_post_layout' );
	}
}

add_action( 'save_post', 'magazineart_save_metaboxes' );
