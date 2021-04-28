<?php
require_once 'inc/walkers/CommentWalker.php';
$count = absint(get_comments_number());
?>
<div class="comments">
    <div class="comments__title">
        <?php if ($count > 0) : ?>
            <?= sprintf(_n('%d comment', '%d comments', $count, 'agencia'), $count) ?>
        <?php else : ?>
            <?= __('Leave a comment', 'agencia'); ?>
        <?php endif ?>
    </div>

    <div class="comments__list">
        <?php wp_list_comments(['style' => 'div', 'walker' => new AgenciaCommentWalker()]) ?>
    </div>

    <div class="pagination">
        <?= paginate_comments_links(['prev_text' => agencia_icon('arrow'), 'next_text' => agencia_icon('arrow')]) ?>
    </div>
    <?php if (comments_open()) : ?>
        <?php comment_form(['title_reply' => '', 'class_form' => 'form-2column', 'class_submit' => 'btn']); ?>
    <?php endif ?>
</div>