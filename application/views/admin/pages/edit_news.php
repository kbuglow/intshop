<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Edit New #<?php echo $news->id; ?> <a href="<?php echo base_url("admin/news/delete/{$news->id}") ?>" class="btn btn-danger delete">Delete new</a></h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    <?php if ($this->session->flashdata('success_msg')): ?>
        <div class="row">
            <div class="alert alert-success" role="alert">
                <i class="fa fa-check-square"></i>
                <?php echo $this->session->flashdata('success_msg'); ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
        </div><!-- /.row -->
    <?php endif; ?>

    <?php if ($this->session->flashdata('error_msg')): ?>
        <div class="row">
            <div class="alert alert-danger" role="alert">
                <i class="fa fa-times"></i>
                <?php echo $this->session->flashdata('error_msg'); ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
        </div><!-- /.row -->
    <?php endif; ?>

    <div class="row">
        <?php echo form_open('admin/news/edit_submit', array('class' => 'form-horizontal')); ?>
        <div class="form-group">
            <?php echo form_label('Title: ', 'title', array('class' => 'col-sm-2 control-label')); ?>
            <div class="col-sm-10">
                <?php echo form_input(array(
                    'id'          => 'title',
                    'name'        => 'title',
                    'class'       => 'form-control',
                    'value'       => $news->title
                )); ?>
            </div>
        </div>

        <div class="form-group">
            <?php echo form_label('Subject: ', 'subject', array('class' => 'col-sm-2 control-label')); ?>
            <div class="col-sm-10">
                <?php echo form_input(array(
                    'id'    => 'subject',
                    'name'  => 'subject',
                    'class' => 'form-control',
                    'value' => $news->subject
                )); ?>
            </div>
        </div>

        <div class="form-group">
            <?php echo form_label('Text ', 'description', array('class' => 'col-sm-2 control-label')); ?>
            <div class="col-sm-10">
                <?php echo form_textarea(array(
                    'id'    => 'description',
                    'name'  => 'text',
                    'class' => 'form-control',
                    'value' => $news->text
                )); ?>
            </div>
        </div>

        <div class="form-group text-center">
            <?php echo form_hidden('news_id', $news->id); ?>
            <?php echo form_submit('submit', 'Edit New', 'class="btn btn-primary btn-lg"'); ?>
            <?php echo form_close(); ?>
        </div>
    </div>
    <!-- /.row -->
</div>
<!-- /#page-wrapper -->