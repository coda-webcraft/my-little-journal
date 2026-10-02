<?php get_header(); ?>

<div class="page-wrapper">
    <main class="main-content">
        <div class="container">
            <?php my_little_journal_breadcrumb(); ?>
            <a href="<?php echo esc_url( home_url() ); ?>" class="back-link">ホームに戻る</a>

            <div class="page-title">日常</div>
            <div class="page-subtitle"><?php echo esc_html( category_description() ); ?></div>

            <?php if ( have_posts() ) : ?>
                <?php while ( have_posts() ) : the_post(); ?>
                    <a href="<?php the_permalink(); ?>">
                        <div class="post-card">
                            <div class="post-thumb">
                                <?php if ( has_post_thumbnail() ) : ?>
                                    <?php the_post_thumbnail(); ?>
                                <?php endif; ?>
                            </div>
                            <div class="post-body">
                                <?php
                                $categories = get_the_category();
                                if ( $categories ) {
                                    echo '<div class="post-tag">' . esc_html( implode( ', ', wp_list_pluck( $categories, 'name' ) ) ) . '</div>';
                                }
                                ?>
                                <div class="post-title"><?php the_title(); ?></div>
                                <div class="post-excerpt"><?php the_excerpt(); ?></div>
                                <div class="post-date"><?php the_date( 'Y.m.d' ); ?></div>
                            </div>
                        </div>
                    </a>
                <?php endwhile; ?>
            <?php else : ?>
                <p>まだ投稿がありません。</p>
            <?php endif; ?>
        </div>
    </main>
    <?php get_sidebar(); ?>
</div>

<?php get_footer(); ?>