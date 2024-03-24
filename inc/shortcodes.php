<?php

/**
 * Register show_post shortcode
 */

function show_post_shortcode($atts) { 
	extract(shortcode_atts(array(
		'id' => '', 
	 ), $atts));

     $post = get_post($id); 
     $post_custom_value = get_post_meta($id, 'post_custom_field', true);

     if ($id !== ''): ?>
        <div class="card">
            <h5 class="card-header"><?php echo get_the_title($post); ?></h5>
            <div class="card-body">
                <p class="card-text"><?php echo get_the_excerpt($post); ?></p>
                <?php if ($post_custom_value): ?>
                    <p class="text-muted"><?php echo $post_custom_value; ?></p>
                <?php endif; ?>
            </div>
        </div>
    <?php endif;
}

add_shortcode('show_post', 'show_post_shortcode');