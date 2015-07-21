<?php require('shop/HeadAndHeader.php'); ?>

    <hr id="header-horizontal-line"/>
    <div id="content">

        <div id="current-path">
            <p id="current-path-paragraph">Startsait > Unsere Produkte > .......</p>
        </div>

        <fieldset>
            <legend id="fieldset-title">Shopping Cart</legend>
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
                    <tr>
                        <td><?php echo "<img src=\"{$item['photo']}\" height=\"100\" width=\"100\">"; ?></td>
                        <td><?php echo $item['name']; ?></td>
                        <td><?php echo $item['qty']; ?></td>
                        <td><?php echo $item['price']; ?></td>
                        <td><a href="<?php echo base_url('cart/remove') . "/" . $item['rowid']; ?>">
                                <img src="<?php echo base_url('assets/img/cart_cross.jpg'); ?>" width="40px"
                                     height="40px"></a></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </fieldset>
    </div>

<?php require('shop/Footer.php'); ?>