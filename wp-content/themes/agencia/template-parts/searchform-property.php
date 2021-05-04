<?php
$isRent = get_query_var('property_category', 'buy') === 'rent';
$cities = get_terms([
    'taxonomy' => 'property_city'
]);
$types = get_terms([
    'taxonomy' => 'property_type'
]);
$currentCity = get_query_var('city', null);
$currentPrice = get_query_var('price', null);
$currentType = get_query_var('property_type', null);
$currentRooms = get_query_var('rooms', null);
?>

<form action="<?= get_post_type_archive_link('property') ?>" class="search-form__form">
    <?php if (is_front_page()) : ?>
        <div class="search-form__checkbox">
            <div class="form-check form-check-inline">
                <input class="form-check-input" <?php checked(!$isRent) ?> type="radio" name="property_category" id="buy" value="buy">
                <label class="form-check-label" for="buy">Acheter</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" <?php checked($isRent) ?> type="radio" name="property_category" id="rent" value="rent">
                <label class="form-check-label" for="rent">Louer</label>
            </div>
        </div>
    <?php endif ?>
    <div class="form-group">
        <select name="city" id="city" class="form-control">
            <option value=""><?= __('All cities', 'agencia') ?></option>
            <?php foreach ($cities as $city) : ?>
                <option value="<?= $city->slug ?>" <?= selected($city->slug, $currentCity) ?>><?= $city->name ?></option>
            <?php endforeach ?>
        </select>
        <label for="city">Ville</label>
    </div>
    <div class="form-group">
        <input type="number" class="form-control" id="budget" name="price" placeholder="100 000 €" value="<?= esc_attr($currentPrice) ?>">
        <label for="budget">Prix max</label>
    </div>
    <div class="form-group">
        <select name="property_type" id="property_type" class="form-control">
            <option value=""><?= __('All types', 'agencia') ?></option>
            <?php foreach ($types as $type) : ?>
                <option value="<?= $type->slug ?>" <?= selected($type->slug, $currentType) ?>><?= $type->name ?></option>
            <?php endforeach ?>
        </select>
        <label for="property_type">Type</label>
    </div>
    <div class="form-group">
        <input type="number" class="form-control" id="rooms" name="rooms" placeholder="4" value="<?= esc_attr($currentRooms) ?>">
        <label for="rooms">Pièces</label>
    </div>
    <button type="submit" class="btn btn-filled">Rechercher</button>
</form>