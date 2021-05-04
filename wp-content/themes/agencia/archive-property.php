<?php get_header() ?>
<div class="container page-properties">
    <div class="search-form">
        <h1 class="search-form__title">Agence immo Montpellier</h1>
        <p>Retrouver tous nos biens sur le secteur de <strong>Montpellier</strong></p>
        <hr>
        <?php get_template_part('template-parts/searchform-property'); ?>
    </div>

    <?php $i = 0;
    while (have_posts()) : the_post(); ?>
        <?php set_query_var('property-large', $i===7) ?>
        <?php get_template_part('template-parts/property') ?>
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