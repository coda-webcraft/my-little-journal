<?php get_header(); ?>

<div class="page-wrapper">
    <main class="main-content">
        <div class="container">
            <?php my_little_journal_breadcrumb(); ?>
            <a href="<?php echo esc_url( home_url() ); ?>" class="back-link">ホームに戻る</a>
            <?php
            while (have_posts()):
                the_post();
                ?>
                <?php if (has_post_thumbnail()): ?>
                    <div class="post-hero">
                        <?php the_post_thumbnail('full'); ?>
                    </div>
                <?php endif; ?>
                <div class="post-content">
                    <div class="post-header">
                        <div class="post-title"><?php the_title(); ?></div>
                    </div>
                    <?php the_content(); ?>
                </div>
                <?php /*
                <!-- コメント -->
                <div class="comments-area">
                <?php comments_template(); ?>
                </div>
                */ ?>

            <?php endwhile; ?>

            <!-- 関連記事 -->
            <?php
            $categories = get_the_category();
            if ($categories):
                $cat_id = $categories[0]->term_id;
                $related = new WP_Query(array(
                    'category__in' => array($cat_id),
                    'post__not_in' => array(get_the_ID()),
                    'posts_per_page' => 3,
                ));
                if ($related->have_posts()):
                    ?>
                    <div class="section-heading"><span>関連記事</span></div>
                    <div class="list-posts">
                        <?php while ($related->have_posts()):
                            $related->the_post(); ?>
                            <a href="<?php the_permalink(); ?>" class="list-item">
                                <div class="list-meta">
                                    <div class="list-title"><?php the_title(); ?></div>
                                    <div class="list-info">
                                        <span><?php echo get_the_time('Y.m.d'); ?></span>
                                    </div>
                                </div>
                                <div class="list-arrow">›</div>
                            </a>
                        <?php endwhile;
                        wp_reset_postdata(); ?>
                    </div>
                <?php endif; endif; ?>

            <a href="<?php echo home_url(); ?>" class="back-link">ホームに戻る</a>
        </div>
    </main>
    <?php get_sidebar(); ?>
</div>

<?php get_footer(); ?>