<h1>Static Pages</h1>
<a href="<?php echo base_url('admin'); ?>">Back to admin panel</a>
<hr/>
<?php if ($this->session->flashdata('success_msg')): ?>
    <p style="background: green; border-radius: 5px; color: #FFF; padding: 10px 5px; width: 100%;"><?php echo $this->session->flashdata('success_msg'); ?></p>
<?php endif; ?>

<?php if ($this->session->flashdata('error_msg')): ?>
    <p style="background: red; border-radius: 5px; color: #FFF; padding: 10px 5px; width: 100%;"><?php echo $this->session->flashdata('error_msg'); ?></p>
<?php endif; ?>

<table border="1">
    <tr>
        <td>Title</td>
        <td>Options</td>
    <tr>
        <?php foreach ($pages as $page): ?>
    <tr>
        <td><?php echo $page->title; ?></td>
        <td>
            <a href="<?php echo base_url("admin/static_pages/edit/{$page->id}"); ?>">Edit</a>
            <a href="<?php echo base_url("admin/static_pages/delete/{$page->id}") ?>">Delete</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
<hr>
<?php
echo form_open('admin/static_pages/add_new');
echo form_label('Title', 'title');
echo form_input(array(
    'id' => 'title',
    'name' => 'title',
)); ?>
<br/>

<?php echo form_label('Content: ', 'content'); ?>
<?php echo form_textarea(array(
    'id' => 'post_content',
    'name' => 'content'
));
?>
<br>
<?php
echo form_submit('submit', 'Add new');
echo form_close();
?>
