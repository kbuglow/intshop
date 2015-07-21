<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title></title>

    <link href='http://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>

    <link href="<?php echo base_url('assets/css'); ?>/BodyStyles.css" rel="stylesheet" />

    <link href="<?php echo base_url('assets/css'); ?>/HeaderCardStyles.css" rel="stylesheet" />
    <link href="<?php echo base_url('assets/css'); ?>/HeaderLanguagesBarStyles.css" rel="stylesheet" />
    <link href="<?php echo base_url('assets/css'); ?>/HeaderLogoStyles.css" rel="stylesheet" />
    <link href="<?php echo base_url('assets/css'); ?>/HeaderNavigationStyles.css" rel="stylesheet" />
    <link href="<?php echo base_url('assets/css'); ?>/HeaderStyles.css" rel="stylesheet" />
    <link href="<?php echo base_url('assets/css'); ?>/LogInHeaderStyles.css" rel="stylesheet" />
    <link href="<?php echo base_url('assets/css'); ?>/LogInRegisterStyles.css" rel="stylesheet" />

    <link href="<?php echo base_url('assets/css'); ?>/ContentStyles.css" rel="stylesheet" />
    <link href="<?php echo base_url('assets/css'); ?>/ContentFieldsetStyles.css" rel="stylesheet" />
    <link href="<?php echo base_url('assets/css'); ?>/ContentLeftMenuStyles.css" rel="stylesheet" />
    <link href="<?php echo base_url('assets/css'); ?>/ContentPageWhitProductsStyles.css" rel="stylesheet" />
    <link href="<?php echo base_url('assets/css'); ?>/SliderStyles.css" rel="stylesheet" />
    <link href="<?php echo base_url('assets/css'); ?>/MainInformationStyles.css" rel="stylesheet" />
    <link href="<?php echo base_url('assets/css'); ?>/MainPageProductsContainerStyles.css" rel="stylesheet" />
    <link href="<?php echo base_url('assets/css'); ?>/ProductStyle.css" rel="stylesheet" />
    <link href="<?php echo base_url('assets/css'); ?>/ShoppingCartStyle.css" rel="stylesheet" />

    <link href="<?php echo base_url('assets/css'); ?>/FooterStyle.css" rel="stylesheet" />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

</head>
<body>
<header>

    <div id="logo">
    </div>

    <div id="user">
        <?php if (is_logged_in()): ?>
            <p>Hello, <?php echo $user->username; ?> | <a href="<?php echo base_url('logout') ?>">Logout</a> <?php if ($user->role == 1) echo '| <a href="' . base_url('admin') . '">Admin panel</a>'; ?></p>
        <?php else: ?>
            <div id="log-in-container">
            <a href="<?php echo base_url('login_register') ?>" id="log-in">Login / Register </a>
            </div>
        <?php endif; ?>
    </div>

    <a href="<?php echo base_url('cart') ?>" id="product-card">
        <p>0 products</p>
    </a>

    <div id="languages-bar">
        <a href="<?php echo base_url('home');?>" id="deutsch">DE</a>
        <a href="<?php echo base_url('EN');?>" id="english">EN</a>
        <a href="#" id="bulgarian">BG</a>
    </div>

    <nav id="navigation">

        <ul id="navigation-list">
            <li class="navigation-list-items">
                <a href="<?php echo base_url();?>" id="home">Startsaite</a>
            </li>
            <li class="navigation-list-items">
                <a href="<?php echo base_url('products');?>" id="our-products">Unsere Produkte</a>
            </li>
        </ul>

    </nav>

</header>