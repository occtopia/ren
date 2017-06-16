<!doctype html>

<html <?php language_attributes(); ?>>

  <head>

    <!-- Standard Meta -->
    <meta charset="utf-8">
    <title>The page title</title>
    <meta http-equiv="Content-Type" content="text/html">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, initial-scale=1.0">
    <meta name="description" content="The page description.">
    <meta name="keywords" content="keyword1, keyword2 , keyword3">
    <meta name="author" content="Joe Somebody">

    <!-- Open Graph -->
    <meta property="og:title" content="The page title">
    <meta property="og:description" content="The page description.">
    <meta property="og:image" content="">
    <meta property="og:image:url" content="">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="628">

    <!-- Twitter Cards -->
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:site" content="@somebody" />
    <meta name="twitter:title" content="The page title" />
    <meta name="twitter:description" content="The page description." />
    <meta name="twitter:image" content="<?php echo get_template_directory_uri(); ?>/assets/img/cardImg.png" />

    <!-- Standard Favicons -->
    <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/assets/img/icons/favicon.ico" type="image/x-icon">
    <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/assets/img/icons/favicon-16x16.png" sizes="16x16" type="image/png">
    <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/assets/img/icons/favicon-32x32.png" sizes="32x32" type="image/png">
    <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/assets/img/icons/favicon.ico" type="image/x-icon">
    <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/assets/img/icons/favicon.ico">

    <!-- Win 8/10 -->
    <meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri(); ?>/assets/img/icons/mstile-144x144.png">
    <meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri(); ?>/assets/img/icons/mstile-150x150.png">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="application-name" content="">

    <!-- iOS -->
    <link rel="apple-touch-icon-precomposed" href="<?php echo get_template_directory_uri(); ?>/assets/img/icons/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="57x57" href="<?php echo get_template_directory_uri(); ?>/assets/img/icons/apple-touch-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="<?php echo get_template_directory_uri(); ?>/assets/img/icons/apple-touch-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?php echo get_template_directory_uri(); ?>/assets/img/icons/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo get_template_directory_uri(); ?>/assets/img/icons/apple-touch-icon-76x76">
    <link rel="apple-touch-icon" sizes="114x114" href="<?php echo get_template_directory_uri(); ?>/assets/img/icons/apple-touch-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="<?php echo get_template_directory_uri(); ?>/assets/img/icons/apple-touch-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="<?php echo get_template_directory_uri(); ?>/assets/img/icons/apple-touch-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="<?php echo get_template_directory_uri(); ?>/assets/img/icons/apple-touch-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_template_directory_uri(); ?>/assets/img/icons/apple-touch-icon-180x180.png">
    <link rel="mask-icon" href="<?php echo get_template_directory_uri(); ?>/assets/img/icons/safari-pinned-tab.svg">

    <!-- Android/Chrome -->
    <link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/assets/img/icons/android-chrome-192x192.png" sizes="192x192">
    <link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/assets/img/icons/android-chrome-256x256.png" sizes="256x256">
    <meta name="theme-color" content="#ffffff">

    <?php wp_head(); ?>

  </head>

  <body>
