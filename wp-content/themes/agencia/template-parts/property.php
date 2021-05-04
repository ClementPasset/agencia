<?php
$large = get_query_var('property-large', false);
?>
<a class="property <?= $large ? 'property--large' : '' ?>" href="<?php the_permalink() ?>" title="<?= esc_attr(get_the_title() . " - " . get_field('surface') . "m²") ?>">
    <div class="property__image">

        <?php the_post_thumbnail($large ? 'property_thumbnail_large' : 'property_thumbnail') ?>

    </div>
    <div class="property__body">
        <div class="property__location"><?php agence_city() ?></div>
        <h3 class="property__title"><?= esc_html(get_the_title() . " - " . get_field('surface') . "m²") ?></h3>
        <div class="property__price">
            <?php if (get_field('property_category') === 'buy') {
                echo sprintf('%s $', number_format(get_field('price'), 0, ',', ' '));
            } else {
                echo sprintf('%s $/month', get_field('price'));
            }
            ?>
        </div>
    </div>
</a>