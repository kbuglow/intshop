<?php require('HeadAndHeader.php'); ?>

    <hr id="header-horizontal-line"/>
    <div id="content">

        <div id="current-path">
            <p id="current-path-paragraph">Startsait > Settings</p>
        </div>

        <fieldset>
            <legend id="fieldset-title">Settings</legend>
            <div style="float: left; width: 33%;">
                <div class="box">
                    <?php echo form_open('settings/change_password'); ?>
                    <?php echo form_label('Old Password:', 'old_password'); ?>
                    <?php echo form_input(array(
                        'name' => 'old_password',
                        'id' => 'old_password',
                        'placeholder' => 'Enter your current password',
                    )); ?>

                    <?php echo form_label('New Password:', 'password'); ?>
                    <?php echo form_input(array(
                        'name' => 'password',
                        'id' => 'password',
                        'placeholder' => 'New password',
                    )); ?>

                    <?php echo form_label('Repeat Password:', 'password_again'); ?>
                    <?php echo form_input(array(
                        'name' => 'password_again',
                        'id' => 'password_again',
                        'placeholder' => 'New password again',
                    )); ?>
                    <?php echo form_hidden('user_id', $user->id);?>
                    <?php echo form_submit('submit', 'Change password'); ?>
                    <?php echo form_close(); ?>
                </div>

                <div class="box">
                    <?php echo form_open('settings/change_email'); ?>
                    <?php echo form_label('Current Email:', 'current_email'); ?>
                    <?php echo form_input(array(
                        'name' => 'current_email',
                        'id' => 'current_email',
                        'value' => $user->email,
                        'disabled' => ''
                    )); ?>

                    <?php echo form_label('New Email:', 'email'); ?>
                    <?php echo form_input(array(
                        'name' => 'email',
                        'id' => 'email',
                        'placeholder' => 'Enter the new email',
                    )); ?>
                    <?php echo form_hidden('user_id', $user->id);?>
                    <?php echo form_submit('submit', 'Change Email'); ?>
                    <?php echo form_close(); ?>
                </div>

            </div>
            <div style="display: inline-block; width: 33%;">
                <div class="box">
                    <?php echo form_open('settings/add_address');
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
                    echo "<br>";
                    echo country_dropdown('country', 'cont', 'dropdown', 'BG', array('US', 'CA', 'GB'), '');
                    echo "<br>";

                    echo form_label('Phone', 'phone');
                    echo form_input(array(
                        'name' => 'phone',
                        'id' => 'phone',
                        'placeholder' => ' Enter your phone number'
                    ));
                    echo form_hidden('user_id', $user->id);
                    echo form_submit('submit' ,'Add address');
                    echo form_close(); ?>

                </div>
                </div>
                <div style="float: right; width: 33%;">
                    <?php if ($addresses): ?>
                        <p>Added shipping addresses:</p>

                        <table class="addresses">
                            <thead>
                            <tr>
                                <th>Full name</th>
                                <th>Address</th>
                                <th>City</th>
                                <th>Country</th>
                                <th>State</th>
                                <th>Zip code</th>
                                <th>Phone</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($addresses as $address): ?>
                                <tr>
                                    <th><?php echo $address->full_name; ?></th>
                                    <th><?php echo $address->address; ?></th>
                                    <th><?php echo $address->city; ?></th>
                                    <th><?php echo $address->country; ?></th>
                                    <th><?php echo $address->state; ?></th>
                                    <th><?php echo $address->zip_code; ?></th>
                                    <th><?php echo $address->phone; ?></th>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    <?php else: ?>
                        <p>No addresses added!</p>
                    <?php endif; ?>
                </div>
            </div>
        </fieldset>
    </div>

<?php require('Footer.php'); ?>