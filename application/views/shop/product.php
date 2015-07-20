<?php require('HeadAndHeader.php'); ?>

<hr id="header-horizontal-line"/>
<div id="content">

    <div id="current-path">
        <p id="current-path-paragraph">Startsait > Unsere Produkte > .......</p>
    </div>

    <fieldset>
        <legend id="fieldset-title">Unsere Produkte</legend>
        
        <div class="product-content">
            <div class="left">
                <div class="big-image">
                    <img src="<?php echo $main_photo; ?>" alt="" class="main-photo" />
                </div>
                <ul>
                </ul>
            </div>

            <div class="right">
                <h2 class="title"><?php echo $product->name; ?></h2>
                <?php if($product->price !== $product->new_price):?>
                <h3 class="price old-price" id="old-price-<?php echo $product->id; ?>">EUR <?php echo $product->price ?></h3>
                <?php endif; ?>
                <h3 class="price new-price" id="new-price-<?php echo $product->id; ?>">EUR <?php echo $product->new_price ?></h3>
                <p class="description"><?php echo $product->description; ?></p>
            </div>
        </div>
    </fieldset>
</div>

<?php require('Footer.php'); ?>