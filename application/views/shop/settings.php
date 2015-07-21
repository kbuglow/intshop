<?php require('HeadAndHeader.php'); ?>

<hr id="header-horizontal-line"/>
<div id="content">

    <div id="current-path">
        <p id="current-path-paragraph">Startsait > Settings</p>
    </div>

    <fieldset>
        <legend id="fieldset-title">Settings</legend>
        <div class="left">
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

                <?php echo form_submit('submit', 'Change Email'); ?>
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
                <?php echo form_submit('submit', 'Change Email'); ?>
                <?php echo form_close(); ?>
            </div>
            <div class="box">
                <?php echo form_open('settings/add_address'); ?>

                <?php echo form_label('First Name:', 'first_name') ?>
                <?php echo form_input(array(
                    'name' => 'first_name',
                    'id' => 'first_name',
                    'placeholder' => 'Enter your first name'
                )); ?>

                <?php echo form_label('Last Name:', 'last_name') ?>
                <?php echo form_input(array(
                    'name' => 'last_name',
                    'id' => 'last_name',
                    'placeholder' => 'Enter your last name'
                )); ?>

                <?php echo form_label('Address:', 'address') ?>
                <?php echo form_input(array(
                    'name' => 'address',
                    'id' => 'address',
                    'placeholder' => 'Enter your address'
                )); ?>

                <?php echo form_close(); ?>
            </div>
        </div>
        <div class="right">
            <div class="box">
                <p>Added shipping addresses:</p>
                <?php if ($addresses): ?>
                <table class="addresses">
                    <thead>
                        <tr>
                            <th>First name</th>
                            <th>Last name</th>
                            <th>Address</th>
                            <th>City</th>
                            <th>Country</th>
                            <th>State</th>
                            <th>Zip code</th>
                            <th>Phone</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($addresses as $address): ?>
                        <tr>
                            <th><?php echo $address->first_name; ?></th>
                            <th><?php echo $address->last_name; ?></th>
                            <th><?php echo $address->adress; ?></th>
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