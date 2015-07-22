<?php require('HeadAndheader.php'); ?>
<hr id="header-horizontal-line"/>
<div id="content">

    <div id="current-path">
        <p>Startsait > Order </p>
    </div>
    <fieldset>
        <legend id="fieldset-title">Order</legend>
        <div class="addresses">
        <?php
        echo form_open('cart/place_order');
        echo form_label('Choose address:', 'address');
        foreach($addresses as $id => $address){
            echo "<div class='addressDiv'>";
            echo form_radio('address', $id );
            echo form_label($address, 'address');
            echo "</div>";
        }
        echo form_submit('submit', 'Order');
        echo form_close();?>
        </div>



        <div class="addAddressDiv">
        <?php
            echo form_open('cart/place_order');
            echo form_label('Full name:', 'full_name');
            echo form_input(array(
                'name' => 'full_name',
                'id' => 'full_name',
                'placeholder' => ' Enter your full name'
            ));

            echo form_label('Address:', 'address');
            echo form_input(array(
                'name' => 'address',
                'id' => 'address_settings',
                'placeholder' => 'Enter your address'
            ));

            echo form_label('City:', 'city');
            echo form_input(array(
                'name' => 'city',
                'id' => 'city',
                'placeholder' => 'Enter your City'
            ));

            echo form_label('State/Province/Region', 'state');
            echo form_input(array(
                'name' => 'state',
                'id' => 'state',
                'placeholder' => ' Enter your state/province/region'
            ));

            echo form_label('ZIP/Postal code', 'zip_code');
            echo form_input(array(
                'name' => 'zip_code',
                'id' => 'zip_code',
                'placeholder' => ' Enter your ZIP/Postal code'
            ));
            echo form_label('Country:', 'country');
            echo country_dropdown('country', 'cont', 'dropdown', 'BG', array('US', 'CA', 'GB'), '');

            echo form_label('Phone', 'phone');
            echo form_input(array(
                'name' => 'phone',
                'id' => 'phone',
                'placeholder' => ' Enter your phone number'
            ));
            echo form_hidden('user_id', $user->id);
            echo form_submit('submit', 'Add address');
            echo form_close();
        ?>
        </div>
    </fieldset>
</div>


<?php require('Footer.php'); ?>
