<?php
/**
 * @package KMA
 * @subpackage kstrap
 * @since 1.0
 * @version 1.2
 */
$frontpage = get_option('page_on_front');
$phonenumber = (get_post_meta($frontpage, contact_information_phone_number, true) != '' ? get_post_meta($frontpage, contact_information_phone_number, true) : '');
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> >
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport"
            content="width=device-width, initial-scale=1">
    <link rel="profile"
            href="http://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?> >
<a class="skip-link screen-reader-text" href="#content"><?php _e('Skip to content', 'kstrap'); ?></a>
<div id="app">
<header id="top" class="header navbar-toggleable-lg">
    <div class="collapse navbar-collapse justify-content-center hidden-xl-up" id="mobilemenu">
        <?php wp_nav_menu([
            'theme_location'  => 'mobile-menu',
            'container'       => '',
            'menu_class'      => 'navbar-nav text-center justify-content-center',
            'fallback_cb'     => '',
            'menu_id'         => 'mobile-menu',
            'walker'          => new WP_Bootstrap_Navwalker(),
        ]); ?>
    </div>
    <div class="container-fluid no-gutters hidden-md-up">
        <div class="row justify-content-center align-items-center no-gutters">
            <div class="col-5">
                <a href="tel:<?php echo $phonenumber; ?>" class="btn btn-info btn-block" ><?php echo $phonenumber; ?></a>
            </div>
            <div class="col-5">
                <a href="/quote-request/" class="btn btn-primary btn-block" >GET A QUOTE</a>
            </div>
            <div class="col-2">
                <button class="navbar-toggler btn btn-info btn-block" type="button" data-toggle="collapse" data-target="#mobilemenu" aria-controls="mobilemenu" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="icon-box">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </span>
                </button>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row justify-content-center align-items-center">
            <div class="col col-lg-3 col-xl-2 text-center">
                <a class="navbar-brand" href="/">
                    <img src="<?php echo get_template_directory_uri() . '/img/hannon-logo.svg'; ?>" alt="Hannon Insurance" style="height:64px; max-width: 100%">
                </a>
            </div>
            <div class="col-12 col-xl-8 hidden-lg-down">
                <?php wp_nav_menu([
                        'theme_location' => 'main-menu',
                        'container_class' => 'navbar',
                        'container_id'    => 'navbarMain',
                        'menu_class'      => 'nav justify-content-center',
                        'fallback_cb'     => '',
                        'menu_id'         => 'main-menu',
                        'walker'          => new WP_Bootstrap_Navwalker(),
                    ]); ?>
            </div>

            <div class="col-12 col-md-6 col-lg-8 col-xl-2 text-center hidden-sm-down text-md-right text-lg-right">
                <a class="top-phone" href="tel:<?php echo $phonenumber; ?>"><?php echo $phonenumber; ?></a>
                <a class="btn btn-primary btn-pill" href="/quote-request/">GET QUOTE</a>
            </div>

            <div class="col-12 col-md-2 col-lg-1 hidden-xl-up hidden-sm-down text-right">
                <button class="navbar-toggler btn btn-info btn-block btn-pill" type="button" data-toggle="collapse" data-target="#mobilemenu" aria-controls="mobilemenu" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="icon-box">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </span>
                </button>
            </div>

        </div>
    </div>
</header>
