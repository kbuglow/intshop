<?php
$url = base_url("shopping/show_cart");
echo "<a href=\"$url\">Cart</a>";
foreach ($products as $product){
echo "<div style=\"border: 2px solid black\">";
echo $product->name;
echo "<br>";
echo "<img src=\"{$product->main_photo}\" height=\"100\" width=\"100\">";
echo $product->description;
echo $product->price;

echo form_open('shopping/add');
echo form_hidden('id', $product->id);
echo form_hidden('name',  $product->name);
echo form_hidden('price', $product->price);
echo form_hidden('photo', $product->main_photo);
?>

<div id='add_button'>
    <?php
    $btn = array(
        'class' => 'fg-button teal',
        'value' => 'Add to Cart',
        'name' => 'action'
    );

    // Submit Button.
    echo form_submit($btn);
    echo form_close();
    }
    ?>
</div>
