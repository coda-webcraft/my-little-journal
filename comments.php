<?php
if ( post_password_required() ) {
    return;
}
?>
<div class="comments-wrap">
    <?php if ( have_comments() ) : ?>
        <div class="section-heading"><span>コメント</span></div>
        <ol class="comment-list">
            <?php wp_list_comments( array(
                'style'      => 'ol',
                'short_ping' => true,
            ) ); ?>
        </ol>
    <?php endif; ?>

    <?php comment_form( array(
        'title_reply'          => 'コメントを書く',
        'label_submit'         => '送信する',
        'comment_notes_before' => '',
    ) ); ?>
</div>