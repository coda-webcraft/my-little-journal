<?php get_header(); ?>

<div class="page-wrapper">
    <main class="main-content">
        <div class="container">
            <?php my_little_journal_breadcrumb(); ?>
            <?php
            while ( have_posts() ) :
                the_post();
            ?>
                <div class="post-content">
                    <h1><?php the_title(); ?></h1>
                    <?php the_content(); ?>
                </div>
            <?php endwhile; ?>
        </div>
    </main>

    <?php get_sidebar(); ?>
</div>

<?php get_footer(); ?>