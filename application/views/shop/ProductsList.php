﻿<?php require('HeadAndHeader.php'); ?>

<hr id="header-horizontal-line"/>
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
                foreach ($categories as $category):
                    ?>
                    <li class="our-products-categories" id="<?php echo $category->id ?>">
                        <a href="<?php echo base_url("products/cat") . "/".$category->id; ?>" id="<?php echo $category->name ?>">
                            <?php echo $category->name ?></a>

                    </li>
                <?php endforeach; ?>

            </ul>

        </aside>
        <div id="page-with-products">
            <?php
            foreach ($products as $product):
                ?>
                <div class="product-containers" id="product-container-<?php echo $product->id; ?>">
                    <a href="<?php echo base_url("product/{$product->id}") ?>" id="product-information-<?php echo $product->id; ?>">
                        <div class="productImage" id="productImage-<?php echo $product->id; ?>"
                             style="background-image: url('<?php echo $product->main_photo ?>'); ">
                            <?php if($product->price !== $product->new_price):
                                    $discount = ($product->new_price / $product->price) *100;
                                    $discount = round($discount);
                                    $discount = 100 - $discount;
                                ?>
                            <div class="product-news" id="product-news-<?php echo $product->id; ?>">
                                <p>-<?php echo $discount; ?>%</p>
                            </div>
                            <?php endif; ?>
                        </div>
                    </a>

                    <div class="product-information" id="product-information-<?php echo $product->id; ?>">
                        <div class="product-name" id="product-name-<?php echo $product->id; ?>">
                            <a href="<?php echo base_url("product/{$product->id}") ?>" class="name" id="name-<?php echo $product->id; ?>"><?php echo $product->name ?></a>
                        </div>

                        <div class="product-price" id="product-price-<?php echo $product->id; ?>">
                            <?php if($product->price !== $product->new_price):?>
                            <p class="old-price" id="old-price-<?php echo $product->id; ?>">EUR <?php echo $product->price ?></p>
                            <?php endif; ?>
                            <p class="new-price" id="new-price-<?php echo $product->id; ?>">EUR <?php echo $product->new_price ?></p>
                        </div>
                    </div>
                    <?php
                    echo form_open('cart/add', array('name' => 'form-' . $product->id));
                    echo form_hidden('id', $product->id);
                    echo form_hidden('name',  $product->name);
                    echo form_hidden('price', $product->price);
                    echo form_hidden('photo', $product->main_photo);
                    ?>
                    <div class="add-to-card-menu" id="add-to-card-menu-<?php echo $product->id; ?>">
                    </div>
                    <?php echo form_close(); ?>
                </div>
                <?php
            endforeach;
            ?>

            <div id="product-pages">

            </div>

        </div>


    </fieldset>

</div>

<?php require('Footer.php'); ?>
