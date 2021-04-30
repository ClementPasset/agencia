<?php
add_filter('next_posts_link_attributes', function (string $attr): string {
    return $attr . ' class="btn"';
});
