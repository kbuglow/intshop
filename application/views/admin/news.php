<h1>News</h1>
<a href="<?php echo base_url('admin'); ?>">Back to admin panel</a>
<hr/>
<table border="1">
    <tr>
        <td>Creator</td>
        <td>Title</td>
        <td>Date</td>
        <td>Subject</td>
        <td>Options</td>
    <tr>
        <?php foreach ($news as $new): ?>
    <tr>
        <td><?php echo $new->username; ?></td>
        <td><?php echo $new->title; ?></td>
        <td><?php echo $new->date; ?></td>
        <td><?php echo $new->subject; ?></td>
        <td>
            <a href="<?php echo base_url("admin/news/edit/{$new->id}"); ?>">Edit</a>
            <a href="<?php echo base_url("admin/news/delete/{$new->id}") ?>">Delete</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
<hr/>
<?php if ($this->session->flashdata('success_msg')): ?>
    <p style="background: green; border-radius: 5px; color: #FFF; padding: 10px 5px; width: 100%;"><?php echo $this->session->flashdata('success_msg'); ?></p>
<?php endif; ?>

<?php if ($this->session->flashdata('error_msg')): ?>
    <div
        style="background: red; border-radius: 5px; color: #FFF; padding: 10px 5px; width: 100%;"><?php echo $this->session->flashdata('error_msg'); ?></div>
<?php endif; ?>
<?php
echo form_open('admin/news/add_new');
echo form_label('Title', 'title');
echo form_input(array(
    'id' => 'title',
    'name' => 'title',
)); ?>
<br/>
<?php echo form_label('subject: ', 'subject'); ?>
<?php echo form_input(array(
    'id' => 'subject',
    'name' => 'subject'
)); ?>
<br/>

<?php echo form_label('Text: ', 'text'); ?>
<?php echo form_textarea(array(
    'id' => 'post_content',
    'name' => 'text'
));
echo form_hidden('creator', $logged_user);
echo form_hidden('date', $date);
?>
<br>
<?php
echo form_submit('submit', 'Add new');
echo form_close();
?>

<script src="<?php echo base_url() ?>assets/js/tinymce/tinymce.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/editor.js" type="text/javascript"></script>