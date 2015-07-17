<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Add New</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    <?php if ($this->session->flashdata('error_msg')): ?>
        <div class="row"><div class="alert alert-danger" role="alert"><?php echo $this->session->flashdata('error_msg'); ?></div><!-- /.row -->
    <?php endif; ?>

    <div class="row">
        <?php echo form_open('admin/news/add_submit', array('class' => 'form-horizontal')); ?>
        <div class="form-group">
            <?php echo form_label('Title: ', 'title', array('class' => 'col-sm-2 control-label')); ?>
            <div class="col-sm-10">
                <?php echo form_input(array(
                    'id'          => 'title',
                    'name'        => 'title',
                    'class'       => 'form-control',
                    'value'       => set_value('title')
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
                    'value' => set_value('subject')
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
                    'value' => set_value('text'),
                )); ?>
            </div>
        </div>

        <div class="form-group text-center">
            <?php echo form_hidden('creator', $logged_user); ?>
            <?php echo form_submit('submit', 'Add New', 'class="btn btn-primary btn-lg"'); ?>
            <?php echo form_close(); ?>
        </div>
    </div>
    <!-- /.row -->
</div>
<!-- /#page-wrapper -->