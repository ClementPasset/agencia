<?php
add_action('after_setup_theme', function () {
    //set_post_thumbnail_size(250, 250, true);
    remove_image_size('post_thumbnail');
    add_image_size('post_thumbnail', 250, 250, true);
    add_image_size('property_carousel', 777, 444, true);
    add_image_size('property_thumbnail', 385, 220, true);
    add_image_size('property_thumbnail_large', 802, 220, true);
});
