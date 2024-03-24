<?php

/**
 * Register custom field for posts
 */

function extrums_add_metabox() {
	add_meta_box(
		'post_custom_field', 
        esc_html__( 'Post Custom Field', 'extrums_dev' ), 
        'post_custom_field_html', 
        'post', 
        'normal', 
        'high'
    );
}

add_action('add_meta_boxes', 'extrums_add_metabox');


function post_custom_field_html($post) {
	$post_custom_value = get_post_meta($post->ID, 'post_custom_field', true);

	wp_nonce_field( 'extrums_nonce', '_postmetabox' );
	?>
	<p>
		<label for="post_custom_field"><?php esc_html__( 'Post Custom Field', 'extrums_dev' ); ?></label>
		<input type="text" id="post_custom_field" name="post_custom_field" value="<?php echo esc_attr($post_custom_value); ?>" style="width:100%;">
	</p>
	<?php
}

function extrums_save_metabox($post_id, $post) {

	if (!isset($_POST['_postmetabox']) || !wp_verify_nonce( $_POST['_postmetabox'], 'extrums_nonce')) {
		return $post_id;
	}

	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return $post_id;
    }

	if($post->post_type !== 'post') {
		return $post_id;
	}

	$post_type = get_post_type_object( $post->post_type );

	if (!current_user_can($post_type->cap->edit_post, $post_id)) {
		return $post_id;
	}

	if (isset( $_POST['post_custom_field'] )) {
		update_post_meta( $post_id, 'post_custom_field', sanitize_text_field($_POST['post_custom_field']) );
	} else {
		delete_post_meta( $post_id, 'post_custom_field' );
	}

	return $post_id;
}

add_action('save_post', 'extrums_save_metabox', 10, 3);