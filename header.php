<!DOCTYPE html>
<html lang="ru">
<head>
    <html lang="<?php echo get_bloginfo('language'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php wp_title('&#8594;', true, 'right'); echo get_bloginfo('name');?> - <? echo get_bloginfo('description') ?></title>
    <script src="<?php echo get_template_directory_uri(); ?>/app/js/libs.min.js"></script>
    <?php wp_head(); ?>
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/app/css/libs.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/app/css/main.css">


    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body <?php body_class(); ?>>

<div class="super-wrapper">
<div class="super-content">

<!--================================================================================
# HEADER
=================================================================================-->
<div class="container">
<header class="header">
    <div class="row">
        <div class="col-md-2">
            <div class="header__logo">
                <a href="/">
                    <img src="<?php echo get_template_directory_uri(); ?>/app/img/logo.png" alt="" title="" class="header__logo__img">
                </a>
            </div>
        </div>
        <div class="col-md-10">
            <div class="row header__top-flex">
                <div class="header__phone">
                    <img src="<?php echo get_template_directory_uri(); ?>/app/img/phone.png"> 093-000-00-00
                    <p class="desc">Студия-магазин</p>
                </div>
                <div class="header__phone">
                    <img src="<?php echo get_template_directory_uri(); ?>/app/img/phone.png"> 093-000-00-00
                    <p class="desc">Центр красоты</p>
                </div>
                <div class="header__phone">
                    <img src="<?php echo get_template_directory_uri(); ?>/app/img/phone.png"> 093-000-00-00
                    <p class="desc">Учебный центр</p>
                </div>
                <div class="header__button__wrapper">
                    <button class="header__button" data-toggle="modal" data-target="#my-bron">оставить заявку</button>
                </div>
                <div class="header__cart">
                    <span class="header__cart__count">
                        <img src="<?php echo get_template_directory_uri(); ?>/app/img/cart.png" class="header__cart__img"> <?php echo WC()->cart->get_cart_contents_count(); ?>
                    </span>
                    <span class="header__cart__sum"><?php echo WC()->cart->get_cart_total(); ?></span>
                    <a class="header__cart-link" href="<?php echo wc_get_cart_url(); ?>"></a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 padding-0">
                    <div class="top-nav">
                        <?php wp_nav_menu( array( 'theme_location' => 'top-menu') ); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<?php if( !is_front_page() ): ?>
<section class="bread">
    <div class="row">
        <div class="col-md-12">
            <div class="breadcrumbs" typeof="BreadcrumbList" vocab="http://schema.org/">
                <?php if(function_exists('bcn_display')) { bcn_display(); }?>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>