<?php
defined('ABSPATH') or die();

add_action('template_redirect', function () {
    if (is_post_type_archive('property')) {
        $authorizedValues = ['rent', 'buy'];
        if (isset($_GET['property_category']) && in_array($_GET['property_category'], $authorizedValues)) {
            $filterdParams = [];
            foreach ($_GET as $key => $value) {
                if($key !== 'property_category'){
                    $filteredParams[$key] = $value;
                }
            }
            wp_redirect('/property/' . $_GET['property_category'] . '?' . http_build_query($filteredParams));
            exit();
        }
    }
});
