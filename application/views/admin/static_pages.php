<h1>Contact Form</h1>

<a href="<?php echo base_url('admin'); ?>">Back to admin panel</a><hr />
<?php if ($this->session->flashdata('success_msg')): ?>
    <p style="background: green; border-radius: 5px; color: #FFF; padding: 10px 5px; width: 100%;"><?php echo $this->session->flashdata('success_msg'); ?></p>
<?php endif; ?>

<?php echo validation_errors(); ?>
<?
    echo form_open(current_url()); 
?>

    <table>
    <?php
        echo "<tr>
            <td>" . form_label('Name: ', 'name') . "</td>
            <td>" . form_input('name', set_value('name')) . "</td>
            </tr>";
        echo "<tr>
            <td>" . form_label('Email: ', 'email'). "</td>
            <td>" . form_input('email', set_value('email')) . "</td>
            </tr>";
        echo "<tr>
            <td>".form_label('Message: ', 'message'). "</td>
            <td><textarea name='message'>" . set_value("message") . "</textarea></td>
            </tr>";
        if ($show_spam_protection) {
        echo "<tr>
            <td>" . form_label('Spam protection - : ' . $spam_question, 'spam_protection'). "</td>
            <td>" . form_input('spam_protection', set_value('spam_protection')) . "</td>
            </tr>";
        }
        echo "<tr>
            <td>".form_submit('submit', 'Submit Message') . "</td>
            </tr>";
    ?>
    </table>

<?
    echo form_close();
?>