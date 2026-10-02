<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
        href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400;0,500;1,400&family=Noto+Sans+JP:wght@300;400;500&display=swap"
        rel="stylesheet" />
    <?php wp_head(); ?>
</head>

<nav>
    <?php
    wp_nav_menu(array(
        'theme_location' => 'primary',
        'container' => false,
        'fallback_cb' => false,
    ));
    ?>
</nav>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <header>
        <div class="site-title"><?php bloginfo('name'); ?></div>
        <div class="site-subtitle"><?php bloginfo('description'); ?></div>
        <button class="hamburger" id="hamburger">
            <span></span>
            <span></span>
            <span></span>
        </button>
        <nav>
            <a href="<?php echo home_url(); ?>">ホーム</a>
            <a href="<?php echo home_url(); ?>/category/cafe/">カフェ</a>
            <a href="<?php echo home_url(); ?>/category/nichijo/">日常</a>
            <a href="<?php echo home_url(); ?>/about/">about</a>
        </nav>
    </header>