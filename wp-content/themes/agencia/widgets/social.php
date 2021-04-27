<?php
$networks=[
    'twitter'=>'Twitter',
    'facebook'=>'Facebook',
    'instagram'=>'Instagram'
];
?>

<div class="footer__credits"><?= esc_html($instance['credits']) ?></div>
<div class="footer__social">
    <?php foreach($networks as $network => $label): ?>
        <?php if(!empty($instance[$network])): ?>
            <a href="<?= esc_url($instance[$network]) ?>" title="<?= sprintf(esc_attr(__("Follow us on %s" ),'agencia'), $label) ?>">
            <?= agencia_icon($network) ?>
            </a>
        <?php endif ?>
    <?php endforeach ?>
</div>