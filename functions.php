<?php
function my_little_journal_scripts()
{
    wp_enqueue_style(
        'my-little-journal-google-fonts',
        'https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400;0,500;1,400&family=Noto+Sans+JP:wght@300;400;500&display=swap',
        array(),
        null
    );
    wp_enqueue_style(
        'my-little-journal-style',
        get_stylesheet_uri()
    );
    wp_enqueue_script(
        'my-little-journal-scripts',
        get_template_directory_uri() . '/js/scripts.js',
        array('jquery'), // WordPress標準のjQueryに依存させる
        '1.0',
        true
    );
}
add_action('wp_enqueue_scripts', 'my_little_journal_scripts');

function my_little_journal_setup()
{
    add_theme_support('post-thumbnails');
    add_theme_support('title-tag'); // これを追加
}
add_action('after_setup_theme', 'my_little_journal_setup');

function my_little_journal_widgets_init()
{
    register_sidebar(array(
        'name' => 'サイドバー',
        'id' => 'sidebar-1',
        'before_widget' => '<div class="sidebar-widget">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="sidebar-heading">',
        'after_title' => '</h2>',
    ));
}
add_action('widgets_init', 'my_little_journal_widgets_init');

function my_little_journal_breadcrumb()
{
    echo '<nav class="breadcrumb">';
    echo '<a href="' . esc_url(home_url()) . '">ホーム</a>';

    if (is_category()) {
        echo ' › ' . esc_html(single_cat_title('', false));
    } elseif (is_tag()) {
        echo ' › ' . esc_html(single_tag_title('', false));
    } elseif (is_single()) {
        $cats = get_the_category();
        if ($cats) {
            echo ' › <a href="' . esc_url(get_category_link($cats[0]->term_id)) . '">' . esc_html($cats[0]->name) . '</a>';
        }
        echo ' › ' . esc_html(get_the_title());
    } elseif (is_page()) {
        echo ' › ' . esc_html(get_the_title());
    }

    echo '</nav>';
}

function my_little_journal_menus() {
    register_nav_menus( array(
        'primary' => 'メインメニュー',
    ) );
}
add_action( 'after_setup_theme', 'my_little_journal_menus' );