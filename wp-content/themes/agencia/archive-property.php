<?php get_header() ?>
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
<div class="container page-properties">
    <div class="search-form">
        <h1 class="search-form__title">Agence immo Montpellier</h1>
        <p>Retrouver tous nos biens sur le secteur de <strong>Montpellier</strong></p>
        <hr>
        <form action="" class="search-form__form">
            <div class="form-group">
                <select name="city" id="city" class="form-control">
                    <option value=""><?= __('All cities','agencia') ?></option>
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
    </div>

    <?php $i = 0;
    while (have_posts()) : the_post(); ?>
        <a class="property <?= $i === 7 ? 'property--large' : '' ?>" href="<?php the_permalink() ?>" title="<?= esc_attr(get_the_title() . " - " . get_field('surface') . "m²") ?>">
            <div class="property__image">

                <?php the_post_thumbnail($i === 7 ? 'property_thumbnail_large' : 'property_thumbnail') ?>

            </div>
            <div class="property__body">
                <div class="property__location"><?php agence_city() ?></div>
                <h3 class="property__title"><?= esc_html(get_the_title() . " - " . get_field('surface') . "m²") ?></h3>
                <div class="property__price">
                    <?php if (get_field('property_category') === 'buy') {
                        echo sprintf('%s $', number_format(get_field('price'),2,',',' '));
                    } else {
                        echo sprintf('%s $/month', get_field('price'));
                    }
                    ?>
                </div>
            </div>
        </a>
    <?php $i++;
    endwhile ?>

</div>

<?php if (get_query_var('paged') > 1) : ?>
    <div class="pagination">
        <?= paginate_links([
            'prev_text' => agencia_icon('arrow'),
            'next_text' => agencia_icon('arrow')
        ]); ?>
    </div>
<?php else : ?>
    <div class="pagination">
        <?php next_posts_link(__('More properties +', 'agencia')) ?>
    </div>
<?php endif ?>

<?php get_footer() ?>