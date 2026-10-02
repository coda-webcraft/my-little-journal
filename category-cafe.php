<?php get_header(); ?>

<div class="page-wrapper">
    <main class="main-content">
        <div class="container">
            <?php my_little_journal_breadcrumb(); ?>
            <a href="<?php echo esc_url( home_url() ); ?>" class="back-link">ホームに戻る</a>

            <div class="page-title">カフェ</div>
            <div class="page-subtitle"><?php echo esc_html( category_description() ); ?></div>

            <?php if ( have_posts() ) : ?>
                <?php while ( have_posts() ) : the_post(); ?>
                    <div class="cafe-card">
                        <a href="<?php the_permalink(); ?>">
                            <div class="cafe-thumb">
                                <?php if ( has_post_thumbnail() ) : ?>
                                    <?php the_post_thumbnail(); ?>
                                <?php endif; ?>
                            </div>
                        </a>
                        <div class="cafe-body">
                            <div class="cafe-name">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </div>
                            <div class="cafe-text"><?php the_excerpt(); ?></div>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php else : ?>
                <p>まだ投稿がありません。</p>
            <?php endif; ?>
        </div>
    </main>
    <?php get_sidebar(); ?>
</div>

<?php get_footer(); ?>