<?php get_header(); ?>

<main class="container">
    <div class="not-found">
        <h1>404</h1>
        <p>お探しのページは見つかりませんでした。</p>
        <a href="<?php echo esc_url( home_url() ); ?>">トップページに戻る</a>
    </div>
</main>

<?php get_footer(); ?>