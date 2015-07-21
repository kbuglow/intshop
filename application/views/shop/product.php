<?php require('HeadAndHeader.php'); ?>

<hr id="header-horizontal-line"/>
<div id="content">

    <div id="current-path">
        <p id="current-path-paragraph">Startsait > Unsere Produkte > <span class="green"><?php echo $product->name; ?></span></p>
    </div>

    <fieldset>
        <legend id="fieldset-title">Unsere Produkte</legend>
        
        <div class="product-content">
            <div class="left">
                <div class="big-image">
                    <img src="<?php echo $main_photo; ?>" alt="" class="main-photo" />
                </div>
                <ul>
                    <?php foreach($photos as $photo): ?>
                    <li><?php echo "<img src=\"{$photo->url}\" alt=\"\" class=\"mini-photo\" />"; ?>
                    <?php endforeach; ?>
                </ul>
            </div>

            <div class="right">
                <h2 class="title"><?php echo $product->name; ?></h2>
                <?php if($product->price !== $product->new_price):?>
                <h3 class="price old-price" id="old-price-<?php echo $product->id; ?>">EUR <?php echo $product->price ?></h3>
                <?php endif; ?>
                <h3 class="price new-price" id="new-price-<?php echo $product->id; ?>">EUR <?php echo $product->new_price ?></h3>
                <div class="description"><p><?php echo $product->description; ?></p></div>
                <br />
                    <?php
                        echo form_open('cart/add', array('name' => 'form-' . $product->id));
                            echo form_input(array(
                                'name' => 'quantity',
                                'type' => 'number',
                                'value' => 1
                            ));

                            echo form_hidden('id', $product->id);
                            echo form_hidden('name',  $product->name);
                            echo form_hidden('price', $product->price);
                            echo form_hidden('photo', $main_photo);

                            echo form_submit(array(
                                'id' => "add-to-card-menu-{$product->id}",
                                'value' => 'Add To Cart'
                            ));
                        echo form_close(); 
                    ?>
                    </div>
            </div>
        </div>
    </fieldset>
</div>

<?php require('Footer.php'); ?>