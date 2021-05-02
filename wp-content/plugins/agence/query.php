<?php

/**
 * This file declares some filters for properties
 */
defined('ABSPATH') or die();

//Filters properties by category : rent or buy
add_filter('query_vars', function (array $params): array {
    $params[] = 'property_category';
    $params[] = 'city';
    $params[] = 'price';
    $params[] = 'property_type';
    $params[] = 'rooms';
    return $params;
});
add_action('pre_get_posts', function (WP_Query $query): void {
    if (is_admin() || !$query->is_main_query() || !is_post_type_archive('property')) {
        return;
    } else {
        $values = ['buy', 'rent'];
        if (in_array(get_query_var('property_category'), $values)) {
            $meta_query = $query->get('meta_query', []);
            $meta_query[] = [
                'key' => 'property_category',
                'value' => get_query_var('property_category')
            ];
            $query->set('meta_query', $meta_query);
        }
        if ($city = get_query_var('city')) {
            $tax_query = $query->get('tax_query', []);
            $tax_query[] = [
                'taxonomy' => 'property_city',
                'field' => 'slug',
                'terms' => $city
            ];
            $query->set('tax_query', $tax_query);
        }
        if ($price = (int)get_query_var('price')) {
            $meta_query = $query->get('meta_query', []);
            $meta_query[] = [
                'key' => 'price',
                'value' => $price,
                'compare' => '<=',
                'type' => 'NUMERIC'
            ];
            $query->set('meta_query', $meta_query);
        }
        if ($type = (int)get_query_var('property_type')) {
            $tax_query = $query->get('tax_query', []);
            $tax_query[] = [
                'taxonomy' => 'property_type',
                'field' => 'slug',
                'terms' => $type
            ];
            $query->set('tax_query', $tax_query);
        }
        if ($rooms = (int)get_query_var('rooms')) {
            $meta_query = $query->get('meta_query', []);
            $meta_query[] = [
                'key' => 'rooms',
                'value' => $rooms,
                'compare' => '>=',
                'type' => 'NUMERIC'
            ];
            $query->set('meta_query', $meta_query);
        }
    }
});

/**
 * URL Rewriting
 */
add_action('init', function () {
    add_rewrite_rule('property/(buy|rent)/?$', 'index.php?post_type=property&property_category=$matches[1]', 'top');
});

function agence_is_rent_url(string $url): bool
{
    return strpos($url, 'property/rent');
}

function agence_is_buy_url(string $url): bool
{
    return strpos($url, 'property/buy');
}
