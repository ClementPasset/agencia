<form action="<?= esc_url(home_url('/')) ?>" class="form-group form-search">
    <input type="search" name="s" placeholder="<?= __('Search post', 'agencia') ?>" value="<?= esc_attr(get_search_query()) ?>">
    <button type="submit">
        <?= agencia_icon('search') ?>
    </button>
</form>