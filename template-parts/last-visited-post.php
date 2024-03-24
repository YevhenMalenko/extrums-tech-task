<?php
/**
 * Template to show last visited post info
 *
 * @package extrums_dev
 */

$last_visited_post_id = isset($_COOKIE['last_visited_post']) ? $_COOKIE['last_visited_post'] : false;

if ($last_visited_post_id) :
    $last_visited_post = get_post($last_visited_post_id);
    $post_custom_value = get_post_meta($last_visited_post_id, 'post_custom_field', true);

    if ($last_visited_post) : ?>
    <div class="container mt-auto mb-5">
        <div class="row">
            <div class="col-8">
                <div class="card">
                    <h5 class="card-header">Last visited post:</h5>
                    <div class="card-body">
                        <h5 class="card-title"><?php echo get_the_title($last_visited_post); ?></h5>
                        <p class="card-text"><?php echo get_the_excerpt($last_visited_post); ?></p>
                        <?php if ($post_custom_value): ?>
                            <p class="text-muted"><?php echo $post_custom_value; ?></p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php endif;
endif;
