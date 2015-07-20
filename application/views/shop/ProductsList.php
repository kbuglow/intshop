<?php require('HeadAndHeader.php'); ?>

<hr id="header-horizontal-line" />
<div id="content">

    <div id="current-path">
    <p id="current-path-paragraph">Startsait > Unsere Produkte > All products</p>
    </div>

    <fieldset>

        <legend id="fieldset-title">Unsere Produkte</legend>

        <aside id="left-menu">

            <p id="our-products-category-caption">Category:</p>
            <ul id="our-products-categories-list">
<?php
foreach($categories as $category):
 ?>
                <li class="our-products-categories">
                    <a href="#" id="allProducts"><?php echo $category->name?></a>

                </li>
                <?php endforeach;?>

            </ul>

            <div id="bio-products-category">
                <a href="#" id="view-bio-products">VIEW BIO PRODUCTS</a>
            </div>

        </aside>

        <div id="page-with-products">

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
                    <button>ADD TO CARD</button>
                </div>

            </div>

           <!-- <div class="product-container">


                <div class="productImage">
                    <div class="product-news">
                        <p>-10%</p>
                    </div>
                </div>

                <div class="product-information">

                    <div class="product-name">
                        <p class="name">Product 1</p>
                    </div>

                    <div class="product-price">
                        <p class="old-price">EUR 15.00</p>
                        <p class="new-price">EUR 12.00</p>
                    </div>
                </div>

                <div class="add-to-card-menu">
                    <p>ADD TO CARD</p>
                </div>

            </div>
            <div class="product-container">


                <div class="productImage">
                    <div class="product-news">
                        <p>-10%</p>
                    </div>
                </div>

                <div class="product-information">

                    <div class="product-name">
                        <p class="name">Product 1</p>
                    </div>

                    <div class="product-price">
                        <p class="old-price">EUR 15.00</p>
                        <p class="new-price">EUR 12.00</p>
                    </div>
                </div>

                <div class="add-to-card-menu">
                    <p>ADD TO CARD</p>
                </div>

            </div>
            <div class="product-container">


                <div class="productImage">
                    <div class="product-news">
                        <p>-10%</p>
                    </div>
                </div>

                <div class="product-information">

                    <div class="product-name">
                        <p class="name">Product 1</p>
                    </div>

                    <div class="product-price">
                        <p class="old-price">EUR 15.00</p>
                        <p class="new-price">EUR 12.00</p>
                    </div>
                </div>

                <div class="add-to-card-menu">
                    <p>ADD TO CARD</p>
                </div>

            </div>
            <div class="product-container">


                <div class="productImage">
                    <div class="product-news">
                        <p>-10%</p>
                    </div>
                </div>

                <div class="product-information">

                    <div class="product-name">
                        <p class="name">Product 1</p>
                    </div>

                    <div class="product-price">
                        <p class="old-price">EUR 15.00</p>
                        <p class="new-price">EUR 12.00</p>
                    </div>
                </div>

                <div class="add-to-card-menu">
                    <p>ADD TO CARD</p>
                </div>

            </div>
            <div class="product-container">


                <div class="productImage">
                    <div class="product-news">
                        <p>-10%</p>
                    </div>
                </div>

                <div class="product-information">

                    <div class="product-name">
                        <p class="name">Product 1</p>
                    </div>

                    <div class="product-price">
                        <p class="old-price">EUR 15.00</p>
                        <p class="new-price">EUR 12.00</p>
                    </div>
                </div>

                <div class="add-to-card-menu">
                    <p>ADD TO CARD</p>
                </div>

            </div>
            <div class="product-container">


                <div class="productImage">
                    <div class="product-news">
                        <p>-10%</p>
                    </div>
                </div>

                <div class="product-information">

                    <div class="product-name">
                        <p class="name">Product 1</p>
                    </div>

                    <div class="product-price">
                        <p class="old-price">EUR 15.00</p>
                        <p class="new-price">EUR 12.00</p>
                    </div>
                </div>

                <div class="add-to-card-menu">
                    <p>ADD TO CARD</p>
                </div>

            </div>
            <div class="product-container">


                <div class="productImage">
                    <div class="product-news">
                        <p>-10%</p>
                    </div>
                </div>

                <div class="product-information">

                    <div class="product-name">
                        <p class="name">Product 1</p>
                    </div>

                    <div class="product-price">
                        <p class="old-price">EUR 15.00</p>
                        <p class="new-price">EUR 12.00</p>
                    </div>
                </div>

                <div class="add-to-card-menu">
                    <p>ADD TO CARD</p>
                </div>

            </div>
            <div class="product-container">


                <div class="productImage">
                    <div class="product-news">
                        <p>-10%</p>
                    </div>
                </div>

                <div class="product-information">

                    <div class="product-name">
                        <p class="name">Product 1</p>
                    </div>

                    <div class="product-price">
                        <p class="old-price">EUR 15.00</p>
                        <p class="new-price">EUR 12.00</p>
                    </div>
                </div>

                <div class="add-to-card-menu">
                    <p>ADD TO CARD</p>
                </div>

            </div>

-->
        </div>

        <div id="product-pages">

            <a href="#" id="left-arrow"></a>
            <div id="numbers-of-pages"></div>
            <a href="#" id="right-arrow"></a>

            </div>

        </div>


    </fieldset>

</div>

<?php require('Footer.php'); ?>