<h1>News #<?php echo $news->id; ?></h1>
<a href="<?php echo base_url('admin/news'); ?>">Back to news</a>
<hr>
<?php if ($this->session->flashdata('success_msg')): ?>
    <p style="background: green; border-radius: 5px; color: #FFF; padding: 10px 5px; width: 100%;"><?php echo $this->session->flashdata('success_msg'); ?></p>
<?php endif; ?>

<?php if ($this->session->flashdata('error_msg')): ?>
    <div style="background: red; border-radius: 5px; color: #FFF; padding: 10px 5px; width: 100%;"><?php echo $this->session->flashdata('error_msg'); ?></div>
<?php endif; ?>
<?php
echo form_open('admin/news/edit_news');
echo form_label('Title', 'title');
echo form_input(array(
    'id'    => 'title',
    'name'  => 'title',
    'value' => $news->title
)); ?>
<br />
<?php echo form_label('subject: ', 'subject'); ?>
<?php echo form_input(array(
    'id'    => 'subject',
    'name'  => 'subject',
    'value' => $news->subject
)); ?>
<br />

<?php echo form_label('Text: ', 'text'); ?>
<?php echo form_textarea(array(
    'id'    => 'post_content',
    'name'  => 'text',
    'value' => $news->text
));
    echo form_hidden('news_id', $news->id);
?>
<br>
<?php
echo form_submit('submit', 'Edit');
echo form_close();
?>

<script src="<?php echo base_url()?>assets/js/tinymce/tinymce.min.js"></script>
<script src="<?php echo base_url()?>assets/js/editor.js" type="text/javascript"></script>