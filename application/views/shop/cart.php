<?php require('HeadAndHeader.php'); ?>

    <hr id="header-horizontal-line"/>
    <div id="content">

        <div id="current-path">
            <p id="current-path-paragraph">Startsait > Unsere Produkte > .......</p>
        </div>

        <fieldset>
            <legend id="fieldset-title">Shopping Cart</legend>
            <?php if ($cart): ?>
                <?php echo form_open('cart/update_cart'); ?>
                <table class="cart">
                    <thead>
                    <tr>
                        <th>Product</th>
                        <th>Name</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Options</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($cart as $item): ?>
                        <?php echo form_hidden('rowid[]', $item['rowid']); ?>
                        <tr>
                            <td><?php echo "<img src=\"{$item['photo']}\" height=\"100\" width=\"100\">"; ?></td>
                            <td><?php echo $item['name']; ?></td>
                            <td><?php echo form_input(array(
                                    'type' => 'number',
                                    'name' => 'qty[]',
                                    'value' => $item['qty']
                                )) ?></td>
                            <td><?php echo '$' . $item['price'] * $item['qty']; ?></td>
                            <td><a href="<?php echo base_url('cart/remove') . "/" . $item['rowid']; ?>"><img
                                        src="<?php echo base_url('assets/img/cart_cross.jpg'); ?>" width="40px"
                                        height="40px"></a></td>
                        </tr>
                    <?php endforeach; ?>
                    <tfoot>
                    <tr>
                        <td style="border-top: 1px solid #000;"></td>
                        <td style="border-top: 1px solid #000;"></td>
                        <td style="border-top: 1px solid #000;">TOTAL:</td>
                        <td style="border-top: 1px solid #000;"><?php echo '$' . $total; ?></td>
                        <td style="border-top: 1px solid #000;"></td>
                    </tr>
                    </tfoot>
                    </tbody>
                </table>
                <?php echo form_submit(array('value' => 'Update cart')); ?>
                <div class="cart-buttons">
                    <a href="<?php echo base_url('cart/remove'); ?>">Empty cart</a>
                </div>
                <div class="cart-buttons">
                    <a href="<?php echo base_url('cart/order'); ?>">Place order</a>
                </div>
                <?php echo form_close(); ?>
            <?php else: ?>
                <p> No Products!</p>
            <?php endif; ?>
        </fieldset>
    </div>

<?php require('Footer.php'); ?>