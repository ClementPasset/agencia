<?php
add_filter('next_posts_link_attributes', function (string $attr): string {
    return $attr . ' class="btn"';
});
add_filter('nav_menu_css_class', function (array $classes, WP_Post $item): array {
    if (is_singular('property') || is_archive('property')) {
        $classes = array_filter($classes, function ($class) {
            return $class !== 'current_page_parent';
        });
    }

    if (is_singular('property')) {
        $property = get_queried_object();
        $category = get_field('property_category', $property);
        if ($category === 'buy') {
            $condition = agence_is_buy_url($item->url);
        } elseif ($category === 'rent') {
            $condition = agence_is_rent_url($item->url);
        }
        if ($condition) {
            $classes[] = 'current_page_parent';
        }
    }

    return $classes;
}, 10, 2);
