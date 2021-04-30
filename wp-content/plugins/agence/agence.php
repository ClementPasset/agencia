<?php

/**
 * Plugin Name: Agence Plugin
 * Description: Plugin to manage the properties of the agency.
 */
add_action('init', function () {
    register_post_type('property', [
        'label' => __('Properties', 'agence'),
        'labels' => [
            'name' => __('Properties', 'agence'),
            'singular_name' => __('Property', 'agence'),
            'edit_item' => __('Edit property', 'agence'),
            'new_item' => __('New property', 'agence'),
            'view_item' => __('View property', 'agence'),
            'view_items' => __('View properties', 'agence'),
            'search_items' => __('Search properties', 'agence'),
            'not_found' => __('No properties found.', 'agence'),
            'not_found_in_trash' => __('No properties found in trash.', 'agence'),
            'all_items' => __('All properties', 'agence'),
            'archives' => __('Property archive', 'agence'),
            'attributes' => __('Property attributes', 'agence'),
            'insert_into_item' => __('Insert into property', 'agence'),
            'uploaded_to_this_item' => __('Uploaded to this property', 'agence'),
            'filter_items_list' => __('Filter properties list', 'agence'),
            'items_list_navigation' => __('Properties list navigation', 'agence'),
            'items_list' => __('Properties list', 'agence'),
            'item_published' => __('Property published', 'agence'),
            'item_published_privately' => __('Property published privately', 'agence'),
            'item_reverted_to_draft' => __('Property reverted to draft', 'agence'),
            'item_scheduled' => __('Property scheduled', 'agence'),
            'item_updated' => __('Property updated', 'agence')
        ],
        'public' => true,
        'hierarchical' => false,
        'exclude_from_search' => false,
        'supports' => ['title', 'editor', 'excerpt', 'thumbnail'],
        'menu_icon' => 'dashicons-admin-multisite',
        'menu_position' => 3,
        'taxonomies' => ['property_type', 'property_city', 'property_option']
    ]);
    register_taxonomy('property_type', 'property', [
        'meta_box_cb' => 'post_categories_meta_box',
        'labels' => [
            'name' => __('Types', 'agence'),
            'singular_name' => __('Type', 'agence'),
            'search_items' => __('Search types', 'agence'),
            'popular_items' => __('Popular types', 'agence'),
            'all_items' => __('All types', 'agence'),
            'edit_item' => __('Edit type', 'agence'),
            'view_item' => __('View type', 'agence'),
            'update_item' => __('Update type', 'agence'),
            'add_new_item' => __('Add new type', 'agence'),
            'new_item_name' => __('New type name', 'agence'),
            'separate_items_with_commas' => __('Seperate types with commas', 'agence'),
            'add_or_remove_items' => __('Add or remove types', 'agence'),
            'choose_from_most_used' => __('Choose from most used types', 'agence'),
            'not_found' => __('No type found.', 'agence'),
            'no_terms' => __('No type', 'agence'),
            'items_list_navigation' => __('Type list navigation', 'agence'),
            'items_list' => __('Type list', 'agence'),
            'back_to_items' => __('&larr; Back to types', 'agence')
        ]
    ]);
    register_taxonomy('property_city', 'property', [
        'meta_box_cb' => 'post_categories_meta_box',
        'labels' => [
            'name' => __('Cities', 'agence'),
            'singular_name' => __('City', 'agence'),
            'search_items' => __('Search Cities', 'agence'),
            'popular_items' => __('Popular Cities', 'agence'),
            'all_items' => __('All Cities', 'agence'),
            'edit_item' => __('Edit City', 'agence'),
            'view_item' => __('View City', 'agence'),
            'update_item' => __('Update City', 'agence'),
            'add_new_item' => __('Add new City', 'agence'),
            'new_item_name' => __('New City name', 'agence'),
            'separate_items_with_commas' => __('Seperate Cities with commas', 'agence'),
            'add_or_remove_items' => __('Add or remove Cities', 'agence'),
            'choose_from_most_used' => __('Choose from most used Cities', 'agence'),
            'not_found' => __('No City found.', 'agence'),
            'no_terms' => __('No City', 'agence'),
            'items_list_navigation' => __('City list navigation', 'agence'),
            'items_list' => __('Type list', 'agence'),
            'most_used' => __('Most used', 'agence'),
            'back_to_items' => __('&larr; Back to Cities', 'agence')
        ]
    ]);
    register_taxonomy('property_option', 'property', [
        'meta_box_cb' => 'post_categories_meta_box',
        'labels' => [
            'name' => __('Options', 'agence'),
            'singular_name' => __('Option', 'agence'),
            'search_items' => __('Search Options', 'agence'),
            'popular_items' => __('Popular Options', 'agence'),
            'all_items' => __('All Options', 'agence'),
            'edit_item' => __('Edit Option', 'agence'),
            'view_item' => __('View Option', 'agence'),
            'update_item' => __('Update Option', 'agence'),
            'add_new_item' => __('Add new Option', 'agence'),
            'new_item_name' => __('New Option name', 'agence'),
            'separate_items_with_commas' => __('Seperate Options with commas', 'agence'),
            'add_or_remove_items' => __('Add or remove Options', 'agence'),
            'choose_from_most_used' => __('Choose from most used Options', 'agence'),
            'not_found' => __('No Option found.', 'agence'),
            'no_terms' => __('No Option', 'agence'),
            'items_list_navigation' => __('Option list navigation', 'agence'),
            'items_list' => __('Type list', 'agence'),
            'most_used' => __('Most used', 'agence'),
            'back_to_items' => __('&larr; Back to Options', 'agence')
        ]
    ]);
});

register_activation_hook(__FILE__, 'flush_rewrite_rules');
register_deactivation_hook(__FILE__, 'flush_rewrite_rules');

/**
 * Method agence_city
 * 
 * Show city and postal_code associated with the property
 *
 * @param WP_Post|int|null $post [explicite description]
 *
 * @return void
 */
function agence_city(?WP_Post $post=null): void
{
    if($post === null){
        $post = get_post();
    }
    $cities = get_the_terms($post, 'property_city');
    if (empty($cities)) {
        return;
    }
    $city = $cities[0];
    echo $city->name;
    $postalCode = get_field('postal_code',$city);
    echo ' (' . $postalCode . ')';
}
