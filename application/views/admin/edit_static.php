<h1>Page #<?php echo $page->id; ?></h1>
<a href="<?php echo base_url('admin/static_pages'); ?>">Back to static pages</a>
<hr>
<?php if ($this->session->flashdata('success_msg')): ?>
    <p style="background: green; border-radius: 5px; color: #FFF; padding: 10px 5px; width: 100%;"><?php echo $this->session->flashdata('success_msg'); ?></p>
<?php endif; ?>

<?php if ($this->session->flashdata('error_msg')): ?>
    <div style="background: red; border-radius: 5px; color: #FFF; padding: 10px 5px; width: 100%;"><?php echo $this->session->flashdata('error_msg'); ?></div>
<?php endif; ?>
<?php
echo form_open('admin/static_pages/edit_static');
echo form_label('Title', 'title');
echo form_input(array(
    'id'    => 'title',
    'name'  => 'title',
    'value' => $page->title
)); ?>
<br />

<?php echo form_label('Content: ', 'content'); ?>
<?php echo form_textarea(array(
    'id'    => 'post_content',
    'name'  => 'content',
    'value' => $page->content
));
echo form_hidden('static_id', $page->id);
?>
<br>
<?php
echo form_submit('submit', 'Edit');
echo form_close();
?>

<script src="<?php echo base_url()?>assets/js/tinymce/tinymce.min.js"></script>
<script src="<?php echo base_url()?>assets/js/editor.js" type="text/javascript"></script>