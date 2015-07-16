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

    <link href="<?php echo base_url('assets/css'); ?>/ContentStyles.css" rel="stylesheet" />
    <link href="<?php echo base_url('assets/css'); ?>/SliderStyles.css" rel="stylesheet" />
    <link href="<?php echo base_url('assets/css'); ?>/MainInformationStyles.css" rel="stylesheet" />
    <link href="<?php echo base_url('assets/css'); ?>/MainPageProductsContainerStyles.css" rel="stylesheet" />
    <link href="<?php echo base_url('assets/css'); ?>/ProductBox.css" rel="stylesheet" />

    <link href="<?php echo base_url('assets/css'); ?>/FooterStyle.css" rel="stylesheet" />

</head>
<body>
<header>

    <div id="logo">
    </div>

    <div id="product-card">
        <p>3 products</p>
        <img src="<?php echo base_url('assets/img'); ?>/your-card-img.png">
    </div>

    <div id="languages-bar">
        <a href="#" id="deutsch">DE</a>
        <a href="#" id="english">EN</a>
        <a href="#" id="french">FR</a>
    </div>

    <nav id="navigation">

        <ul id="navigation-list">
            <li class="navigation-list-items">
                <a href="#" id="home">Startsaite</a>
            </li>
            <li class="navigation-list-items">
                <a href="#" id="news">Aktuelles</a>
            </li>
            <li class="navigation-list-items">
                <a href="#" id="our-products">Unsere Produkte</a>
            </li>
            <li class="navigation-list-items">
                <a href="#" id="bio-products">BIO Produkte</a>
            </li>
            <li class="navigation-list-items">
                <a href="#" id="partner">Partner</a>
            </li>
            <li class="navigation-list-items">
                <a href="#" id="about-us">Uber uns</a>
            </li>
            <li class="navigation-list-items">
                <a href="#" id="contact">Kontakt</a>
            </li>
        </ul>

    </nav>

</header>
<div id="slider">
        <div id="pagination">
            <a href="#" id="previous">PREV</a>
            <div id="circles">
                <div id="first-image"></div>
                <div id="second-image"></div>
                <div id="third-image"></div>
            </div>
            <a href="#" id="next">NEXT</a>
        </div>
</div>
<div id="content">
<h1>Altimed</h1>
    <h2>Willkommen</h2>
    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing.</p>

    <fieldset id="products">
        <legend>Products</legend>
        <div class="product-container" id="product-container1">


            <div class="productImage" id="productImage1">
                <div class="product-news" id="product-news1">
                    <p>-10%</p>
                </div>
            </div>

            <div class="product-information" id="product-information1">

                <div class="product-name" id="product-name1">
                    <p class="name" id="name">Product 1</p>
                </div>

                <div class="product-price" id="product-price1">
                    <p class="old-price" id="old-price1">EUR 15.00</p>
                    <p class="new-price" id="new-price1">EUR 12.00</p>
                </div>
            </div>

            <div class="add-to-card-menu" id="add-to-card-menu1">
                <p>ADD TO CARD</p>
            </div>

        </div>
    </fieldset>
</div>
</body>

<footer>

    <div id="footer-content">
        <div id="address">
            <p>Address:</p>
            <p>Wien, Österreich</p>
            <p>tel: +43 650 5856228  </p>
            <div id="social-networks-profiles">
                <a href="#" id="facebook"><img/></a>
                <a href="#" id="google-plus"><img/></a>
                <a href="#" id="pinterest"><img/></a>
                <a href="#" id="linked-in"><img/></a>
                <a href="#" id="twitter"><img/></a>
                <a href="#" id="instagram"><img/></a>
            </div>
        </div>

        <div id="contact-us">
            <p>Contact us:</p>

            <div id="send-email">
                <p>Send a mail</p>
            </div>
        </div>

        <table id="more-options">
            <tr>
                <td id="term-of-use">
                    Terms of Use
                </td>
                <td id="delivery">
                    Delivery
                </td>
            </tr>
            <tr>
                <td id="third-row">
                    Payment
                </td>
                <td id="payment">
                    <div id="pay-options">
                        <div id="paypal-logo"></div>
                        <div id="visa-logo"></div>
                        <div id="mastercard-logo"></div>
                        <div id="sofort-logo"></div>
                    </div>
                </td>
            </tr>
        </table>
    </div>

    <hr id="footer-horizontal-line" />

    <div id="copyright"></div>
    <div id="move-to-top"></div>
</footer>
<script src="<?php echo base_url('assets/js'); ?>/ShowAddToCardOption.js"></script>
</html>