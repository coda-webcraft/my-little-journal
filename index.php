<?php get_header(); ?>

<div class="page-wrapper">
    <main class="main-content">
        <div class="container">

            <!-- 最近の投稿 -->
            <div class="section-heading"><span>最近の投稿</span></div>
            <div class="featured-grid">
                <?php
                $args = array(
                    'post_type' => 'post',
                    'posts_per_page' => 3,
                    'post_status' => 'publish',
                );
                $my_query = new WP_Query($args);
                while ($my_query->have_posts()):
                    $my_query->the_post();
                    ?>
                    <a href="<?php the_permalink(); ?>" class="card">
                        <div class="card-thumb">
                            <?php if (has_post_thumbnail()): ?>
                                <?php the_post_thumbnail('full'); ?>
                            <?php endif; ?>
                        </div>
                        <div class="card-body">
                            <div class="card-tag">
                                <?php
                                $categories = get_the_category();
                                if ($categories) {
                                    echo esc_html(implode(', ', wp_list_pluck($categories, 'name')));
                                }
                                ?>
                            </div>
                            <div class="card-title"><?php the_title(); ?></div>
                            <div class="card-excerpt"><?php the_excerpt(); ?></div>
                            <div class="card-date"><?php echo get_the_time('Y.m.d'); ?></div>
                        </div>
                    </a>
                <?php endwhile;
                wp_reset_postdata(); ?>
            </div>

            <!-- バックナンバー -->
            <div class="section-heading"><span>バックナンバー</span></div>
            <div class="list-posts">
                <?php
                $args = array(
                    'post_type' => 'post',
                    'posts_per_page' => 5,
                    'post_status' => 'publish',
                    'offset' => 3,
                );
                $back_query = new WP_Query($args);
                while ($back_query->have_posts()):
                    $back_query->the_post();
                    ?>
                    <a href="<?php the_permalink(); ?>" class="list-item">
                        <?php
                        $cats = get_the_category();
                        $icons = array(
                            'カフェ' => '☕',
                            '日常' => '🌸',
                            'おやつ' => '🧁',
                            'おでかけ' => '⚓',
                            '暮らし' => '🌱',
                            '読書' => '📚',
                            '旅行' => '✈️',
                        );
                        $icon = isset($icons[$cats[0]->name]) ? $icons[$cats[0]->name] : '📝';
                        ?>
                        <div class="list-icon" style="background: #f0f0f0">
                            <?php echo $icon; ?>
                        </div>
                        <div class="list-meta">
                            <div class="list-title"><?php the_title(); ?></div>
                            <div class="list-info">
                                <span><?php echo esc_html($cats[0]->name); ?></span>
                                <span><?php echo get_the_time('Y.m.d'); ?></span>
                            </div>
                        </div>
                        <div class="list-arrow">›</div>
                    </a>
                <?php endwhile;
                wp_reset_postdata(); ?>
            </div>

            <!-- About -->
            <div class="section-heading"><span>about</span></div>
            <a href="<?php echo esc_url(home_url('/about/')); ?>" class="about-box">
                <div class="avatar">
                    🌿
                </div>
                <div class="about-text">
                    <h3>aotabi</h3>
                    <p>大阪在住。青色と旅行とワクワクすることが好き。カフェめぐり、船旅、関西万博…気になったことはなんでも出かけてみるタイプです。</p>
                </div>
            </a>

        </div>
    </main>

    <?php get_sidebar(); ?>

</div>

<?php get_footer(); ?>