<?php require_once('HeadAndHeader.php'); ?>
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
        <?php
            for ($x = 0; $x < 8; $x++) {
                ?>
                <div class="product-containers" id="product-container-<?php echo $product->id; ?>">
                    <div class="productImage" id="productImage<?php echo $product->id; ?>"
                         style="background-image: url('<?php echo $product->main_photo ?>'); ">
                        <?php if ($product->price !== $product->new_price):
                            $discount = ($product->new_price / $product->price) * 100;
                            $discount = round($discount);
                            $discount = 100 - $discount;
                            ?>
                            <div class="product-news" id="product-news<?php echo $product->id; ?>">
                                <p>-<?php echo $discount; ?>%</p>
                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="product-information" id="product-information<?php echo $product->id; ?>">
                        <div class="product-name" id="product-name<?php echo $product->id; ?>">
                            <p class="name" id="name"><?php echo $product->name ?></p>
                        </div>

                        <div class="product-price" id="product-price<?php echo $product->id; ?>">
                            <?php if ($product->price !== $product->new_price): ?>
                                <p class="old-price" id="old-price<?php echo $product->id; ?>">
                                    EUR <?php echo $product->price ?></p>
                            <?php endif; ?>
                            <p class="new-price" id="new-price<?php echo $product->id; ?>">
                                EUR <?php echo $product->new_price ?></p>
                        </div>
                    </div>

                    <div class="add-to-card-menu" id="add-to-card-menu<?php echo $product->id; ?>">
                        <button class="add-to-card-menu-button">ADD TO CART</button>
                    </div>

                </div>
                <?php
            }
        ?>
    </fieldset>
</div>
<?php require('Footer.php'); ?>