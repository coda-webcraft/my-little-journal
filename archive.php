<?php get_header(); ?>

<div class="page-wrapper">
    <main class="main-content">
        <div class="container">
            <?php my_little_journal_breadcrumb(); ?>
            <a href="<?php echo esc_url( home_url() ); ?>" class="back-link">ホームに戻る</a>

            <div class="section-heading"><span><?php single_cat_title(); ?></span></div>
            <div class="list-posts">
                <?php if ( have_posts() ) : ?>
                    <?php while ( have_posts() ) : the_post(); ?>
                        <a href="<?php the_permalink(); ?>" class="list-item">
                            <div class="list-meta">
                                <div class="list-title"><?php the_title(); ?></div>
                                <div class="list-info">
                                    <span><?php the_date( 'Y.m.d' ); ?></span>
                                </div>
                            </div>
                            <div class="list-arrow">›</div>
                        </a>
                    <?php endwhile; ?>
                <?php else : ?>
                    <p>まだ投稿がありません。</p>
                <?php endif; ?>
            </div>
        </div>
    </main>
    <?php get_sidebar(); ?>
</div>

<?php get_footer(); ?>